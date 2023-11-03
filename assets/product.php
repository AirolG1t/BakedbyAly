<?php
include_once 'dbcon.php';
if(isset($_POST['product_add'])){

    $pname = mysqli_real_escape_string($conn, $_POST['product_name']);
    $price = mysqli_real_escape_string($conn, $_POST['product_price']);
    $stock = mysqli_real_escape_string($conn, $_POST['product_stock']);
    $category = mysqli_real_escape_string($conn, $_POST['product_category']);
    $desc = mysqli_real_escape_string($conn, $_POST['description']);
    $random_id = rand(10000, 99999);

    if (!empty($pname) && !empty($price) && !empty( $_FILES['productImage'])) {
        $size = implode(', ', $_POST['size']);
        $flavor = implode(', ', $_POST['flavor']);
        if(isset($_FILES['productImage'])){
            $img_name = $_FILES['productImage']['name'];  //getting image name
            $img_type =$_FILES['productImage']['type'];  // getting image type exp. (jpg, png, jprg)
            $tmp_name = $_FILES['productImage']['tmp_name']; //this is the temporary name to saved/move in our folder
            
            //explode the image and get the last extension like png or jpg.
            $img_explode = explode('.', $img_name);
            $img_ext = end($img_explode); //getting extension of users uploaded image file

            $extension = ['png','jpg','jpeg'];
            if(in_array($img_ext, $extension) === true){ //check if the uploaded image ext matched with array extension
                $time = time(); // this will retuen the current time                
                $new_img_name = $time.$img_name;
                if(move_uploaded_file($tmp_name, "images/".$new_img_name)){ // if user upload image and move in the image folder successfully
                    $sql2 = mysqli_query($conn, "INSERT INTO products (name, `pid`, price, image, size, flavor, stock, category, description) VALUES ('$pname', '$random_id', '$price', '{$new_img_name}', '$size', '$flavor','{$stock}','{$category}','{$desc}')");
                    if($sql2){
                        header(
                            "location: ../product.php"
                        );
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
};
if(isset($_POST['product_update'])){
    $updateid = $_GET['updateid'];
    $updatename = $_POST['update_name'];
    $updateprize = $_POST['update_price'];
    $category = $_POST['update_category'];
    $stock = $_POST['update_stock'];
    $updatedescription = $_POST['updateDesc'];

    if(!empty($updatename) && !empty($updateprize)){
        $sizes = implode(', ', $_POST['Usize']);
        $flavors = implode(', ', $_POST['Uflavor']);
        $updatequery = "UPDATE products SET name = '{$updatename}', price = '{$updateprize}', size = '{$sizes}', flavor = '{$flavors}', stock = '{$stock}', category = '{$category}',  description= '{$updatedescription}'
                        WHERE pid = '{$updateid}'";

        $result2 = mysqli_query($conn, $updatequery);
        
        if($result2){
            header("location: ../product.php");
            exit; // Make sure to exit to prevent further script execution
        } else {
            echo 'Error on query';
        }
    }
};
?>
