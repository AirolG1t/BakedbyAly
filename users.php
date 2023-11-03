<link rel="stylesheet" href="assets/css/chat.css">
<?php include_once './header.php'; include './sidebar.php';?>
<div class="content">
    <div class="product-container">
        <h1>Chats</h1>
    </div>
    <div class="wrapper">
        <section class="users">
            <header>
                <?php
                include_once ("assets/dbcon.php");
                $sql = mysqli_query($conn,"SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}"); 
                if(mysqli_num_rows($sql) > 0 ){
                    $row = mysqli_fetch_assoc($sql);
                }
                ?>
                <div class="profile">
                    <img src="assets/images/<?php echo $row['img'] ?>" alt="">
                    <div class="details">
                        <span><?php echo $row['fname']."". $row['lname'] ?></span>
                        <p><?php echo $row['status']?></p>
                    </div>
                </div>
            </header>
            <div class="chat-search">
                <span class="text"> Select a user to start chat</span>
                <input type="text" placeholder="Search ...">
                <button><i class="fa fa-search"></i></button>
            </div>
            <div class="user-list">
                <!-- Users will be displayed here -->
            </div>
        </section>
        <section class="chat-area">
            <header></header>
                <div class="blank">
                    <img src="assets/images/smileycake-removebg.png" alt="">
                    <div class="message1">
                        <span>Talk to someone...</span>
                    </div>
                </div>
        </section>
    </div>
    
</div>
    <script src="js/users.js"></script>
    <script src="script.js"></script>
</body>
</html>