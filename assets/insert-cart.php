<?php
    session_start();
    include_once("dbcon.php");

    try {
        $user_id = $_SESSION['user_id'];
        $product_id = $_POST['product_id'];
        $quantity = $_POST['qty'];
        $pFlavor = $_POST['flavor'];
        $pSize = $_POST['size'];
        $pprice = $_POST['price'];

        $stmt_cart = $conn->prepare("SELECT * FROM carttable WHERE cartId = '$product_id' AND cFlavor = '$pFlavor' AND cSize = '$pSize'");
        $stmt_cart->execute();
        $result_cart = $stmt_cart->get_result();

        if ($result_cart->num_rows > 0) {
            $cart = $result_cart->fetch_assoc();
            $cart_id = $cart['id'];
            $qty = $quantity;

            $updatequery = "UPDATE carttable SET qty = '{$qty}' WHERE id = '{$cart_id}'";

            $result2 = mysqli_query($conn, $updatequery);
            
            if($result2){
                $response = array('success' => true, 'id' => $cart['id']);
            }
            else {
                $response = array('success' => false);
            }
        }
        else {
            $stmt = $conn->prepare('SELECT * FROM products WHERE pid = '.$product_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $product = $result->fetch_assoc();
                $pname = $product['name'];
                // $pprice = $product['price'];
                $pimage = $product['image'];
                $pCategory = $product['category'];
                $image_path = 'assets/images/' . $pimage;
            }

            $total_price = $quantity * $pprice;

            $insert_sql = mysqli_query($conn, "INSERT INTO carttable (user_id, cartId, cName, cPrice, cImage, cFlavor, cSize, cCategory, qty, totalPrice) VALUES 
            ('$user_id', '$product_id', '$pname', '$pprice', '$pimage', '$pFlavor', '$pSize', '$pCategory', '$quantity', '$total_price')");
                
            if($insert_sql){
                $response = array('success' => true, 'id' => mysqli_insert_id($conn));
            }else {
                $response = array('success' => false);
            }
        }

        echo json_encode($response);
    }catch(Exception $e){
        $response = array('success' => false);
        echo json_encode($response);
    }
?> 