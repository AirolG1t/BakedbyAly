<?php
    session_start();
    include_once("dbcon.php");

    $message = "";
    try {
        $payment_reference = $_POST['payment_reference'];

        $update_sql = mysqli_query($conn, "UPDATE transactions SET payment_status='PAID' WHERE payment_reference='$payment_reference'");
            
        if($update_sql){
            $stmt = $conn->prepare('SELECT * FROM transactions WHERE payment_reference = ?');
            $stmt->bind_param('s', $payment_reference);
            $stmt->execute();
            $result = $stmt->get_result();

            $order_id = "";
            if ($result->num_rows > 0) {
                $transaction_result = $result->fetch_assoc();
                $order_id = $transaction_result['order_id'];
            }
            // update product stock
            $sql_transaction_orders = mysqli_query($conn, "SELECT * FROM order_db WHERE randOid='$order_id'");
            if(mysqli_num_rows($sql_transaction_orders) > 0){
                while ($row_transaction = mysqli_fetch_assoc($sql_transaction_orders)) {
                    $order_quantity = $row_transaction['Oqty'];
                    $product_id = $row_transaction['Opid'];

                    // get product -> retrieve stock to update
                    $stmt_product = $conn->prepare('SELECT * FROM products WHERE pid = ?');
                    $stmt_product->bind_param('s', $product_id);
                    $stmt_product->execute();
                    $result_product = $stmt_product->get_result();
                    
                    if ($result_product->num_rows > 0) {
                        $product = $result_product->fetch_assoc();
                        $stock = $product['stock'];
                    }

                    // compute new stock
                    $new_stock = $stock - $order_quantity;

                    $update_sql_product = mysqli_query($conn, "UPDATE products SET stock='$new_stock' WHERE pid='$product_id'");
                    if ($update_sql_product){
                        $response = array('success' => true);
                    }else {
                        $message .= "1";
                        $response = array('success' => false, 'error_in_update' => $message);
                    }
                }
            }

            $response = array('success' => true);
        }else {
            $message .= "2";
            $response = array('success' => false, 'error_in_update' => $message);
        }

        echo json_encode($response);
    }catch(Exception $e){
        $message .= $e;
        $response = array('success' => false, 'error_in_update' => $message);
        echo json_encode($response);
    }
?> 