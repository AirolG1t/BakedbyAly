<?php

    $conn = mysqli_connect('localhost','root','','cake_db');
    if(!$conn){
        echo 'Connection failed:' . mysqli_connect_error();
    }
?>