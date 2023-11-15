<?php
session_start();
include_once("./dbcon.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $_SERVER['domain'] = "http://localhost/BakedbyAly/";
    // $_SERVER['domain'] = "https://bakedbyally.com/";

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (!empty($email) && !empty($password)) {
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $dbPass = $row['password'];
            $status = "Active now";

            if($password == $dbPass){
                    $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = '{$row['unique_id']}'");
                    $_SESSION['unique_id'] = $row['unique_id'];
                    $_SESSION['user_id'] = $row['user_id'];

                    if ($row['userType'] === 'customer') {
                        echo "success";
                        $_SESSION['user_type'] = "customer";
                    } elseif ($row['userType'] === 'admin') {
                        echo "admin";
                        $_SESSION['user_type'] = "admin";
                    } else {
                        echo "unknown_user_type";
                    }
            }else {
                echo 'password is incorrect.';
            }
        } else {
            echo 'Email or password is incorrect.';
        }
    } else {
        echo 'All fields are required.';
    }
} else {
    echo 'Invalid request.';
}
?>
