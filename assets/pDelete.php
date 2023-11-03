<?php
include_once('dbcon.php');

// Delete button in product
if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = mysqli_query($conn, "DELETE FROM products WHERE `pid` = $id");
    
    if($query) {
        header('location: product.php');
        exit; // Optional, but recommended to prevent further code execution
    }
}
?>
