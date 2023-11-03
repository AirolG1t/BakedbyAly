 <link rel="stylesheet" href="../customerPanel.css">
  <link rel="stylesheet" href="style.css">
  <?php include('../customerphp/header.php');?>
  <?php include_once('dbcon.php');?>
    <?php 
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: ../main.php");
    }
    $id = $_SESSION['unique_id'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$id}'");
    $row1 = mysqli_fetch_assoc($query);
?>
  <body>
  <header class="header">
    <a href="../Customer.php" class="logo"> <i class="fas fa-shopping-basket"></i> Baked by Aly</a>

    <div class="icons">
        <div class="dropdown">
        <i id="menu-btn" class="fas fa-bars"></i>
        <i id="search-btn" class="fas fa-search"></i>
        <i id="cart-btn" class="fas fa-shopping-cart"></i>
        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo $row1['fname']; echo $row1['lname'] ?>
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">View Profile</a></li>
            <li><a class="dropdown-item" href="#">Orders</a></li>
            <li><a class="dropdown-item" href="assets/logout.php?logout_id=<?php echo $row1['unique_id'] ?>">Logout</a></li>
        </ul>
        </div>
    </div>
</header>
    <section class="category">
    <div class="grid-container box">
        <div class="box-container">
        <div class="left2">
            <i class='bx bx-chevron-left cancelBTN' style="font-size: 45px;"></i>
            <div class="card-body">
                <span>Toppings:</span>
                <div class="top">
                    <div class="sticker">
                        <ul class="topList">
                            <li class="top2"><img src="Removal-94.png" class="draggableTop" id="top1" draggable="true" alt=""></li>
                            <li class="top2"><img src="donut1.jpg" class="draggableTop" id="top2" draggable="true" alt=""></li>
                            <li class="top2"><img src="Removal-311.png" class="draggableTop" id="top3" draggable="true" alt=""></li>
                        </ul>
                    </div>
                </div>
                
                <span>Glazed:</span>
                <div class="top">
                    <div class="sticker">
                        <ul class="middleList">
                            <li class="middle"><img src="Removal-47.png" class="draggableMid" id="mid1" draggable="true" alt=""></li>
                            <li class="middle"><img src="Removal-999.png" class="draggableMid" id="mid2" draggable="true" alt=""></li>
                            <li class="middle"><img src="Removal-311.png" class="draggableMid" id="mid3" draggable="true" alt=""></li>
                            <li class="middle"><img src="Removal-158.png" class="draggableMid" id="mid4" draggable="true" alt=""></li>
                            <li class="middle"><img src="Removal-47.png" class="draggableMid" id="mid5" draggable="true" alt=""></li>
                            <li class="middle"><img src="Removal-47.png" class="draggableMid" id="mid6" draggable="true" alt=""></li>
                            <li class="middle"><img src="Removal-47.png" class="draggableMid" id="mid7" draggable="true" alt=""></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button id="resetSticker">Reset Toppings</button> <!-- Reset button -->
                <button type="button">
                    <span>Confirm</span>
                </button>          
            </div>              
        </div>
        </div>
        <div class="box-container">
        <div class="left">
            <div class="card-header">
                Cake Customization
            </div>
            <div class="card-body">
                <div class="cakSize">
                    <span>Size:</span>
                    <button type="button" class="btn1" onclick="switchImage('redImage', 'Small')" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true">Small</button>
                    <button type="button" class="btn2" onclick="switchImage('blueImage', 'Large')"    data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="active">Large</button>
                </div>
                <div class="flavors">
                    <span>Flavors:</span>
                        <input type="radio" name="select" id="option-1" value="Moist Chocolate" checked>
                        <input type="radio" name="select" id="option-2" value="Moist Vanilla">
                    <label for="option-1" class="option option-1">
                        <div class="dot"></div>
                        <span>Moist Chocolate</span>
                        </label>
                    <label for="option-2" class="option option-2">
                        <div class="dot"></div>
                        <span>Moist Vanilla</span>
                    </label>
                </div>
                <div class="cakeColor">
                    <span>Colors:       <i class='bx bx-question-mark centered-icon' data-bs-toggle="popover" data-bs-title="Instruction" data-bs-content="Drag and Drop the color you want in the cake"></i></span>
                    <ul class="colorList">
                        <li class="draggable-list" draggable="true" style="background-color: #fce537" id="color1" ></li>
                        <li class="draggable-list" draggable="true" style="background-color: #19f53a" id="color2"></li>
                        <li class="draggable-list" draggable="true" style="background-color: #af52a7" id="color3"></li>
                        <li class="draggable-list" draggable="true" style="background-color: #fc6bbb" id="color4"></li>
                        <li class="draggable-list" draggable="true" style="background-color: #fdba4d" id="color5"></li>
                        <li class="draggable-list" draggable="true" style="background-color: #76aaff" id="color6"></li>
                        <li class="draggable-list" draggable="true" style="background-color: #eeeeee" id="color7"></li>
                    </ul>
                </div>
            </div>
            <div class="card-footer">
                <button id="reset" onclick="resetFilter()">Reset Color</button> <!-- Reset button -->
                <button type="button" id="nextButton">
                    <span>Next</span>
                </button>          
            </div>              
        </div>
        </div>
        <div class="box-container">
        <div class="right">
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-inner colorContainer">
                    <div class="carousel-item active">
                        <div class="top-sticker">
                            
                        </div>
                        <div class="middleSticker">

                        </div>
                        <img src="newSize.svg" class="d-flex w-60" id="redImage" alt="Droppable Image" ondragover="allowDrop(event)" ondrop="drop(event)" ondragleave="dragLeave(event)">
                    </div>
                    <div class="carousel-item">
                        <div class="topSticker2">

                        </div>
                        <div class="middleSticker2">

                        </div>
                        <img src="newcake.svg" class="d-flex w-60" id="blueImage" alt="Droppable Image" ondragover="allowDrop(event)" ondrop="drop(event)" ondragleave="dragLeave(event)">
                    </div>

                </div>
            </div>
        </div>
        
    </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
    <script>
        
    </script>
</body>
</html>