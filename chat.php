<link rel="stylesheet" href="assets/css/chat.css">
<?php include_once ("header.php"); include_once "sidebar.php";?>
<body> 
<div class="content">
<div class="modal fade" id="gallery-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <!--<h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>-->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="#" class="modal-img" alt="" style="width: 100%; height: 460px;">
      </div>
    </div>
  </div>
</div>
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
                <header>
                <?php
                    include_once("assets/dbcon.php"); 
                    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                    $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$user_id}'");
                    if(mysqli_num_rows($sql) > 0){
                        $row = mysqli_fetch_assoc($sql);
                    }
                    ?>
                    <a href="users.php" class="back-icon"><i class="fa fa-arrow-left"></i></a>
                    <img src="assets/images/<?php echo $row['img'];?>" alt="">
                        <div class="details">
                            <span><?php echo $row['fname'] . " ". $row['lname'] ?></span>
                            <p><?php echo $row['status']?></p>
                        </div>
                </header>
                <div class="chat-box">
                    <!--------------mesasages---------->
                </div>
                <div class="img-container">
                    <div class="showImagebox">
                        <div class="image">
                            
                        </div>
                        <div class="clear">
                            <span>&#215;</span>
                        </div>
                    </div>
                </div>
                <form action="#" class="typing-area" autocomplete="off">
                    <input type="file" class="image-field" id="image-field" name="images[]" accept="image/png, image/jpeg, image/jpg" id="image-field" multiple hidden>
                    <label for="image-field" class="file-label">
                        <i class='bx bx-folder-open'></i>
                    </label>
                    <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
                    <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                    <input type="text" name="message" class="input-field" placeholder="type a message here..">
                    <button class="chat-btn"><i class='bx bx-send'></i></i></button>
                </form>
            </section>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="js/chat.js"></script>
    <script src="script.js"></script>
    <script src="js/users.js"></script>
</body>
</html>