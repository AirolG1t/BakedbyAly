<?php 
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: main.php");
    }
?>
<link rel="stylesheet" href="assets/css/style.css">
<input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="top">
            <div class="logo">
                <i class="bx bxs-cake"></i>
                <span>Baked by Aly</span>
            </div>
            <i class="bx bx-menu" id="btn"></i>
        </div>
        <ul>
            <li>
                <a href="index.php">
                    <i class="bx bxs-grid-alt"></i>
                    <span class="nav-item">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="product.php">
                    <i class="bx bxs-shopping-bag"></i>
                    <span class="nav-item">Products</span>
                </a>
                <span class="tooltip">Products</span>
            </li>
            <li>
                <a href="order.php">
                    <i class="bx bxs-food-menu"></i>
                    <span class="nav-item">Orders</span>
                </a>
                <span class="tooltip">Orders</span>
            </li>
            <li>
                <a href="users.php">
                    <i class='bx bx-conversation'></i>
                    <span class="nav-item">Chat</span>
                </a>
                <span class="tooltip">Chat</span>
            </li>
            <li>
                <a href="transaction.php">
                <i class='bx bx-transfer-alt'></i>
                <span class="nav-item">Transaction</span>
                </a>
                <span class="tooltip">Transaction</span>
            </li>
            <li>
                <?php 
                include_once ("assets/dbcon.php");
                $sql = mysqli_query($conn,"SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}"); 
                if(mysqli_num_rows($sql) > 0 ){
                    $row = mysqli_fetch_assoc($sql);
                }
                ?>
                <a href="account.php">
                    <i class='bx bxs-user-account'></i>
                    <span class="nav-item">Accounts</span>
                </a>
                <span class="tooltip">Account</span>
            </li>
            <li>
                <div class="user-profile">
                    <div class="user">
                        <img src="assets/images/<?php echo $row['img'];?>" class="user-img">
                        <div>
                            <p class="bold"><?php echo $row['fname']. ' ' . $row['lname'];?></p>
                        </div>
                    </div>
                    <a href="assets/logout.php?logout_id=<?php echo $row['unique_id']  ?>" class="logout">
                        <i class="bx bx-log-out"></i>
                    </a>
                </div>
            </li>
        </ul>
    </div>