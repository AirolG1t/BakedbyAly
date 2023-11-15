<?php
include_once("dbcon.php");
    $query = "SELECT * FROM order_db ORDER BY randOid DESC";
    $result = mysqli_query($conn, $query);

    $number = 1;
    $data = '';
        if(mysqli_num_rows($result) > 0 ){
            while ($row = mysqli_fetch_assoc($result))
            {
                $data .= "<tr>
                        <td>".$number."</td>
                        <td>".$row['Oname']."</td>
                        <td>".$row['Odate']."</td>
                        <td>".$row['Osize']."</td>
                        <td>".$row['Ocategory']."</td>
                        <td>".$row['Ostatus']."</td>
                        <td>
                        <button id='orderButton' data-hiddenid=".$row['randOid'].">See all <span class='bx bx-chevron-right'></span></button>
                        </td>
                        </tr>";
                        $number++;
            }
            echo $data;
        }
        else {
            echo "<h6 class ='text-danger text-center mt-5'>No data found</h6>";
        }
        if (isset($_GET['orderId'])) {
            $id = $_GET['orderId'];
            $user_id = $_GET['uid'];
            $date = $_POST['order_date_pickup'];
            $status = $_POST['order_status'];
        
            $query2 = "UPDATE order_db SET Odatepickup = ?, Ostatus = ? WHERE randOid = ?";
            
            // Prepare the statement
            $stmt = mysqli_prepare($conn, $query2);
        
            if ($stmt) {
                // Bind parameters and execute the query
                mysqli_stmt_bind_param($stmt, "ssi", $date, $status, $id);
                if (mysqli_stmt_execute($stmt)) {
                    
                    // start of sending email setup
                    $stmt_user_details = $conn->prepare('SELECT * FROM users WHERE user_id = ?');
                    $stmt_user_details->bind_param('s', $user_id);
                    $stmt_user_details->execute();
                    $result_user_details = $stmt_user_details->get_result();
                    
                    $email = "";
                    if ($result_user_details->num_rows > 0) {
                        $user_details = $result_user_details->fetch_assoc();
                        $email = $user_details['email'];
                        $name = $user_details['fname'] . " " . $user_details['lname'];
                    }

                    $message = "Thank you for ordering at <b><i><a href='https://bakedbyally.com/'>bakedbyally.com</a></i></b>! Below is the status of your order:";
                    
                    // set email to user
                    ini_set( 'display_errors', 1 );
                    error_reporting( E_ALL );

                    // user email
                    $to = $email;

                    // email subject/title
                    $subject = 'BakedByAlly Order Status';    

                    $order_no = $id;

                    // additional message
                    $message .= "<br>____________________________________";
                    $message .= "<br><b>ORDER NO:</b> ".$order_no;
                    $message .= "<br><b>STATUS:</b> ".$status;

                    if ($status == "Complete") {
                        $message .= "<br><b>DATE OF PICKUP:</b> ".date_format(date_create($date),"M d, Y");;
                    }

                    $message .= "<br><br>Track your order status here at <a href='https://bakedbyally.com/assets/orders.php'>Click here.</a>";
                    $message .= "<br><br><br>Sincerely, <br> Baked by Ally Team";

                    // email headers
                    $headers  = "From: no-reply@bakedbyally.com \r\n";
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

                    // check if email is sent or not in console
                    if(mail($to,$subject,$message, $headers)) {
                        echo "<script>console.log('Email Checkout: The email message was sent.')</script>";
                    } else {
                        echo "<script>console.log('Email Checkout: The email message was not sent.')</script>";
                    }

                    // end of sending email setup
                    
                    // header("location: ../order.php");
                    echo "<script>window.location.href = '../order.php'</script>";
                } else {
                    echo "error update order details: " . mysqli_error($conn);
                }
        
                // Close the statement
                mysqli_stmt_close($stmt);
            } else {
                echo "Failed to prepare the statement: " . mysqli_error($conn);
            }
        }
        
?>