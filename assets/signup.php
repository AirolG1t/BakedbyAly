<?php 
session_start();
    include_once("./dbcon.php");
    $fname = mysqli_escape_string($conn, $_POST['fname']);
    $lname = mysqli_escape_string($conn, $_POST['lname']);
    $email = mysqli_escape_string($conn, $_POST['email']);
    $password = mysqli_escape_string($conn, $_POST['password']);


    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            //check email already exist or not
            $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){
                echo "$email - This email already exist.";
            }else {
                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];  //getting image name
                    $img_type =$_FILES['image']['type'];  // getting image type exp. (jpg, png, jprg)
                    $tmp_name = $_FILES['image']['tmp_name']; //this is the temporary name to saved/move in our folder
                    
                    //explode the image and get the last extension like png or jpg.
                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode); //getting extension of users uploaded image file

                    $extension = ['png','jpg','jpeg'];
                    if(in_array($img_ext, $extension) === true){ //check if the uploaded image ext matched with array extension
                        $time = time(); // this will retuen the current time
                        
                        $new_img_name = $time.$img_name;
                        if(move_uploaded_file($tmp_name, "images/".$new_img_name)){ // if user upload image and move in the image folder successfully
                            $status = "active now"; // this will active when signup
                            $random_id = rand(time(), 10000000);
                            $usertype = "customer";
                            $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status, userType) VALUES ('{$random_id}', '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}', '{$usertype}')");
                            if($sql2){
                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                if(mysqli_num_rows($sql3) > 0){
                                    $row = mysqli_fetch_assoc(($sql3));
                                    $_SESSION['unique_id'] = $row['unique_id']; // using session we can pass this id
                                    echo "success";
                                }
                            }else {
                                echo 'insert error';
                            }
                        }
                    }else {
                        echo 'Please select an image file - png, jpg, jpeg';
                    }
                }else {
                    echo 'Please select an Image file.';
                }
            }
        }else {
            echo "$email - this is not valid email.";
        }
    }else {
        echo 'All input field are required.';
    }
?>