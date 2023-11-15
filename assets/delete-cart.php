<?php
    session_start();
    include_once("dbcon.php");

    try {
        $cart_id = $_POST['cart_id'];
        
        $delete_cart_item = mysqli_query($conn, "DELETE FROM carttable WHERE id = $cart_id");

        if($delete_cart_item) {
            $response = array('success' => true);
        }
        else {
            $response = array('success' => false);
        }

        echo json_encode($response);
    }catch(Exception $e){
        $response = array('success' => false);
        echo json_encode($response);
    }
?> 