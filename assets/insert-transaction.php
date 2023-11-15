<?php
    session_start();
    include_once("dbcon.php");

    try {
        $user_id = $_SESSION['user_id'];
        $order_id = $_POST['rand_oid'];
        $checkout_id = $_POST['checkout_id'];
        $checkout_url = $_POST['checkout_url'];
        $payment_amount = $_POST['payment_amount'];
        $status = "NOT YET PAID";

        $insert_sql = mysqli_query($conn, "INSERT INTO transactions (payment_reference, payment_url, order_id, user_id, payment_amount, payment_status) VALUES 
        ('$checkout_id', '$checkout_url', '$order_id', '$user_id', '$payment_amount', '$status')");
            
        if($insert_sql){
            $response = array('success' => true);
            echo json_encode($response);
        }else {
            $response = array('success' => false);
            echo json_encode($response);
        }
    }catch(Exception $e){
        $response = array('success' => false);
        echo json_encode($response);
    }
?> 