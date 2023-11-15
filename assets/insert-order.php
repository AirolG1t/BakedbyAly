<?php
    session_start();
    include_once("dbcon.php");

    try {
        $user_id = $_SESSION['user_id'];
        $cart_id = $_POST['cart_id'];
        $product_id = $_POST['product_id'];
        $name = $_POST['name'];
        $date = $_POST['date'];
        $order_id = $_POST['rand_oid'];
        $qty = $_POST['qty'];
        $price = $_POST['price'];
        $size = strtolower($_POST['size']);
        $category = strtolower($_POST['category']);

        $dedication = "";
        if (isset($_POST['dedication'])){
            $dedication = $_POST['dedication'];
        }
        $date_pickup = "";
        if (isset($_POST['date_pickup'])){
            $date_pickup = $_POST['date_pickup'];
        }

        $insert_sql = mysqli_query($conn, "INSERT INTO order_db (user_id, Opid, Oname, Odate, randOid, Oqty, Oprice, Osize, Ocategory, Ostatus, Odedication, Odatepickup) VALUES 
        ('$user_id', '$product_id', '$name', '$date', '$order_id', '$qty', '$price', '$size', '$category', 'Pending', '$dedication', '$date_pickup')");
            
        if($insert_sql){
            // delete order items from cart 
            $delete_cart_item = mysqli_query($conn, "DELETE FROM carttable WHERE id = $cart_id");
    
            if($delete_cart_item) {
                $response = array('success' => true);
            }
            else {
                $response = array('success' => false);
            }
        }else {
            $response = array('success' => false);
        }

        echo json_encode($response);
    }catch(Exception $e){
        $response = array('success' => false);
        echo json_encode($response);
    }
?> 