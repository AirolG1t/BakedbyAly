<?php
session_start();
include_once("dbcon.php");

if(isset($_SESSION['unique_id'])){
    $id = $_SESSION['unique_id'];
    $query = "SELECT * FROM users WHERE NOT unique_id = '{$id}'";
    $results = mysqli_query($conn, $query);
    $output = "";

    if(mysqli_num_rows($results) == 0){
        $output .= "No chat availoable.";
    }else {
        while($row = mysqli_fetch_assoc($results)){
            $sql2 = "SELECT * FROM messages 
                WHERE (incoming_msg_id = {$row['unique_id']}
                OR outgoing_msg_id = {$row['unique_id']})
                AND (outgoing_msg_id = {$id} OR incoming_msg_id = {$id})
                ORDER BY msg_id DESC LIMIT 1";
            $query3 = mysqli_query($conn, $sql2); // Fix variable name
            $row2 = mysqli_fetch_assoc($query3);
            if(mysqli_num_rows($query3) > 0){
                // Check if $row2['outgoing_msg_id'] exists before using it
                ($id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
                $result = $row2['msg'];
            }else {
                $result2 = "No message available";
            }
        
            // Check if $row['status'] exists before using it
            ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
        
            $msg = (strlen($result) > 20) ? substr($result, 0, 20) . '...' : $result;

            $output .= '
                <a href="./chat.php?user_id='.$row['unique_id'].'">
                <div class="info">
                    <img src="assets/images/'.$row['img'].'">
                    <div class="chats-details">
                        <span>'.$row['fname']." ".$row['lname'].'</span>
                        <p>'.$you.$msg.'</p>
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fa fa-circle"></i></div>
                </div>
                </a>
            ';
        }
    }
} echo $output;
?>
