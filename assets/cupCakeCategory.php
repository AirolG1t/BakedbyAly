<?php
session_start();
include_once("./dbcon.php");

$sql = mysqli_query($conn, "SELECT * FROM products WHERE category = 'themecupcake' OR category = 'numberlettercupcake' OR category = 'muffins'");
$output = '';

if(mysqli_num_rows($sql) > 0){
    while ($row = mysqli_fetch_assoc($sql)) {
        $output .= '
        <div class="box">
            <div class="icons">
                <a href="#" class="fas fa-shopping-cart cart"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="bx bx-list-ul"></a>
            </div>
                <div class="img">
                    <img src="assets/images/'.$row['image'].'" alt="">
                </div>
                <div class="content">
                    <h3>'.$row['name'].'</h3>
                    <div class="price">₱ '.$row['price'].'</div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
            </div>
        ';
    }
    echo $output;
}else {
    echo 'There is no more cake on stock.';
}
?>