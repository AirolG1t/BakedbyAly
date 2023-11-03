<?php 
session_start();
if(isset($_SESSION['unique_id'])){
    include_once("./dbcon.php");
    $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);

    $output ="";
    $sql = "SELECT * FROM messages
    LEFT JOIN users ON users.unique_id  =  messages.outgoing_msg_id
    WHERE (incoming_msg_id = {$incoming_id} AND outgoing_msg_id = {$outgoing_id})
            OR (incoming_msg_id = {$outgoing_id } AND outgoing_msg_id = {$incoming_id}) ORDER BY msg_id";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        while ($row=mysqli_fetch_assoc($query)){
            if(!empty($row['msg'])){
                if($row['outgoing_msg_id'] ===  $outgoing_id){//if this is equal then this is the sendier
                    $output .= '
                    <div class="chat outgoing">
                        <div class="details">
                            <p>'. $row['msg'] .'</p>
                        </div>
                    </div>
                    ';
                    if(!empty($row['image'])){
                        $imageNames = explode(',', $row['image']);
                        foreach($imageNames as $imageNames){
                            $output .= '
                            <div class="chat outgoing">
                                <div class="outgoing-img">
                                    <img src="assets/images/'.$imageNames.'" class="gallery-item" alt="">
                                </div>
                            </div>
                        ';
                        }
                    }
                }else { // else this is the receiver
                    $output .= '
                    <div class="chat incoming">
                        <img src="assets/images/'.$row['img'].'" alt="">
                        <div class="details">
                            <p>'. $row['msg'] .'</p>
                        </div>
                    </div>
                    ';
                    if(!empty($row['image'])){
                        $imageNames = explode(',', $row['image']);
                        foreach($imageNames as $imageNames){
                            $output .= '
                            <div class="chat incoming">
                                <img src="assets/images/'.$row['img'].'" alt="">
                                <div class="incoming-img">
                                    <img src="assets/images/'.$imageNames.'" class="gallery-item" alt="">
                                </div>
                            </div>
                        ';
                        }
                    }
                }    
            }
            else {
                if(!empty($row['image'])){
                    if($row['outgoing_msg_id'] ===  $outgoing_id){
                        if(!empty($row['image'])){
                            $imageNames = explode(',', $row['image']);
                            foreach($imageNames as $imageNames){
                                $output .= '
                                <div class="chat outgoing">
                                    <div class = "outgoing-img">
                                        <img src="assets/images/'.$imageNames.'" class="gallery-item" alt="">
                                    </div>
                                </div>
                            ';
                            }
                        }
                    }else{
                        if(!empty($row['image'])){
                            $imageNames = explode(',', $row['image']);
                            foreach($imageNames as $imageNames){
                                $output .= '
                                <div class="chat incoming">
                                    <img src="assets/images/'.$row['img'].'" alt="">
                                    <div class = "incoming-img">
                                        <img src="assets/images/'.$imageNames.'" class="gallery-item" alt="">
                                    </div>
                                </div>
                            ';
                            }
                        }
                    }
                }
            }
        }
        echo $output;
    }
}else {
    header("../homepage.php");
}
?>