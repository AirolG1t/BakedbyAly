<?php
include_once("dbcon.php");
if (isset($_GET['accountId']) && isset($_GET['userOption'])) {
    $orderid = $_GET['accountId'];
    $userselect = mysqli_real_escape_string($conn, $_GET['userOption']);
    
    $query = "UPDATE users SET usertype = '{$userselect}' WHERE unique_id = '{$orderid}'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo 'success';
    } else {
        echo 'Error query: ' . mysqli_error($conn);
    }
}
if(isset($_POST['remail'])){
    $email = mysqli_real_escape_string($conn,$_POST['remail']);
    $pass = mysqli_real_escape_string($conn,$_POST['rpassword']);
    $pass2 = mysqli_real_escape_string($conn,$_POST['confirmpassword']);

    $query = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");

    if(mysqli_num_rows($query) > 0){
        if($pass === $pass2){
            $query2 = mysqli_query($conn, "UPDATE users SET password = '{$pass}' WHERE email = '{$email}'");
        }else {
            echo 'Password are not matched.';
        }
    }else {
        echo 'Email is incorrect.';
    }
}
?>
