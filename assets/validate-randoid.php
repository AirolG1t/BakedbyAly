<?php
    session_start();
    include_once("dbcon.php");

    try {
        $rand_oid = $_POST['rand_oid'];

        $stmt = $conn->prepare("SELECT * FROM order_db WHERE randOid = '$rand_oid'");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
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