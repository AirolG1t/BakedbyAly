<?php 
while($row = mysqli_fetch_assoc($sql)){
    $slq2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
            OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id}
            OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
    $query2 = mysqli_query($conn, $slq2);
    $row2 = mysqli_fetch_assoc($query2);
    if(mysqli_num_rows($query2) > 0){
        // Check if $row2['outgoing_msg_id'] exists before using it
        ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        $result = $row2['msg'];
    }else {
        $result = "No message available";
    }

    // Check if $row['status'] exists before using it
    ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";

    $msg = (strlen($result) > 20) ? substr($result, 0, 20) . '...' : $result;

    $output .= '<a href="chat.php?user_id='.$row['unique_id'].'">
    <div class="profile">
    <img src="assets/images/'.$row['img'].'" alt="">
        <div class="details">
            <span>'. $row['fname'] . " ". $row['lname'] .'</span>
            <p>'. $you . $msg .'</p>
        </div>
    </div>
    <div class="status-dot '. $offline .'"><i class="fa fa-circle"></i></div>
    </a>';
}
?>