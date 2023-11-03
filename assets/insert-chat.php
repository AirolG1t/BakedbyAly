<?php 
session_start();
if(isset($_SESSION['unique_id'])){
    include_once("./dbcon.php");
    $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $fileCount = count($_FILES['images']['name']);
    for($i = 0; $i < $fileCount; $i++){
        $fileName[] = $_FILES['images']['tmp_name'][$i];
        $file_temp_name = $_FILES['images']['tmp_name'][$i];
    } 

    if(!empty($message)){
        $random_id = rand(time(), 10000);
        $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg, random_msg_id)
            VALUES ('{$incoming_id}', '{$outgoing_id}', '{$message}', '$random_id')") or die(); 
        if(!empty($_FILES['images'])){
            $images = implode(',',$_FILES['images']['name']);
            $query = mysqli_query($conn, "UPDATE messages SET image = '$images' WHERE random_msg_id = '$random_id'");
            // Move the uploaded files
            foreach ($_FILES['images']['tmp_name'] as $key => $file_temp_name) {
                $file_path = "images/" . $_FILES['images']['name'][$key];
                move_uploaded_file($file_temp_name, $file_path);
            }
        }    
    }
    elseif(empty($message)){
        if(!empty($_FILES['images'])){
            $random_id = rand(time(), 10000);
            $images = implode(',',$_FILES['images']['name']);
            $query = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, random_msg_id, image)
                VALUES ('{$incoming_id}', '{$outgoing_id}', '$random_id', '$images')") or die();
            
            // Move the uploaded files
            foreach ($_FILES['images']['tmp_name'] as $key => $file_temp_name) {
                $file_path = "images/" . $_FILES['images']['name'][$key];
                move_uploaded_file($file_temp_name, $file_path);
            }
        }
    }
}else {
    header("../login.php");
}
?>