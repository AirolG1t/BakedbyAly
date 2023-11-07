<?php include('customerphp/header.php');?>
<link rel="stylesheet" href="customerPanel.css">
<?php include_once('assets/dbcon.php');?>
<?php 
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: main.php");
    }
    $id = $_SESSION['unique_id'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$id}'");
    $row1 = mysqli_fetch_assoc($query);
?>
<body>
<header class="header">
    <div class="logoContent">
        <a href="Customer.php" class="logo"><img src="assets/images/logo-web-removebg-preview.png" alt="">
            <span class="logoName">Baked by Ally</span>
        </a>
    </div>
    <div class="icons">
        <div class="dropdown">
        <i id="menu-btn" class="fas fa-bars"></i>
        <i id="search-btn" class="fas fa-search"></i>
        <a href="assets/cart.php" class="shopping"><i id="cart-btn" class="fas fa-shopping-cart" style="color: #fff;"></i></a>
        </i>
        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" style="margin-left: 35px;" data-bs-toggle="dropdown" aria-expanded="false">
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



<section class="home" id="home">
    <div class="slides-container">

        <div class="slide active">
            <div class="content">
                <span>Have a Cake-A-Licious</span>
                <h3>upto 50% off</h3>
                <a href="#" class="btn">Shop Now</a>
            </div>
            <div class="img">
                <img decoding="async" src="img/home-img-1.png" alt="">
            </div>
        </div>

        <div class="slide">
            <div class="content">
                <span>Have a Cake-A-Licious</span>
                <h3>upto 50% off</h3>
                <a href="#" class="btn">Shop Now</a>
            </div>
            <div class="img">
                <img decoding="async" src="img/home-img-2.png" alt="">
            </div>
        </div>

        <div class="slide">
            <div class="content">
                <span>Have a Cake-A-Licious</span>
                <h3>upto 50% off</h3>
                <a href="#" class="btn">Shop Now</a>
            </div>
            <div class="img">
                <img decoding="async" src="img/home-img-3.png" alt="">
            </div>
        </div>

    </div>
    <div id="next-slide" class="fas fa-angle-right" onclick="next()"></div>
    <div id="prev-slide" class="fas fa-angle-left" onclick="prev()"></div>

</section>
<section class="banner-container">

    <div class="banner">
        <img decoding="async" src="img/banner-1.jpg" alt="">
        <div class="content">
        <span>Best Seller</span>
        <h3>Order Now!</h3>
        <a href="#" class="btn">shop now</a>
    </div>
    </div>

    <div class="banner">
        <img decoding="async" src="img/banner-2.jpg" alt="">
        <div class="content">
        <span>Favorites</span>
        <h3>Order Now!</h3>
        <a href="#" class="btn">shop now</a>
    </div>
    </div>

    <div class="banner">
        <img decoding="async" src="img/banner-3.jpg" alt="">
        <div class="content">
        <span>Recommended by Customer</span>
        <h3>Order Now!</h3>
        <a href="#" class="btn">shop now</a>
    </div>
    </div>

</section>




<div class="heading">
    <h1>our shop</h1>
    </div>

<section class="category">

<h1 class="title"> <span>Category</span> </h1>

<div class="box-container">

    <a href="#muffin" class="box">
        <img decoding="async" src="img/cat-1.jpg" alt="">
        <h3>Cupcakes</h3>
    </a>

    <a href="#" class="box">
        <img decoding="async" src="img/cat-8.jpg" alt="">
        <h3>Crinkles</h3>
    </a>

    <a href="#cakes" class="box">
        <img decoding="async" src="img/cat-4.jpg" alt="">
        <h3>Cakes</h3>
    </a>

    <a href="customCake/customize.php" class="box">
        <img decoding="async" src="img/cat-6.jpg" alt="">
        <h3>Custom Cake</h3>
    </a>


</div>

</section>




<section class="products" id="cakes">
    <div id="message"></div>
    <h1 class="title"> <span>Cakes</span> <a href="#">view all >></a> </h1>

    <form class="form-submit">
    <div class="box-container productCon">
        <?php 
            $sql = mysqli_query($conn, "SELECT * FROM products WHERE category = 'cake'");
            
            if(mysqli_num_rows($sql) > 0){
                while ($row = mysqli_fetch_assoc($sql)) {
                    echo '
                    <div class="box">
                            <div class="icons">
                            <button type="submit" name="viewProduct" class="btn2">
                                <i class="bx bx-list-plus">view product</i>
                            </button>
                            </div>
                            <input type="hidden" class="itemId" value="'.$row['pid'].'">
                            <input type="hidden" class="pname" value="'.$row['name'].'">
                            <input type="hidden" class="price" value="'.$row['price'].'">
                            <input type="hidden" class="pimage" value="'.$row['image'].'">
                            <div class="img">
                                <img src="assets/images/'.$row['image'].'" alt="">
                            </div>
                            <div class="content">
                                <h3>'.$row['name'].'</h3>
                                <div class="price">₱'.$row['price'].'</div>
                            </div>
                        </div>
                    ';
                }
            }
        ?>
    </div>
    </form>
</section>

<section class="products" id="muffin">
    <h1 class="title"> <span>Cupcakes</span> <a href="#">view all >></a> </h1>
    <div id="message"></div>
    <div class="box-container cupCakeCon">
        <?php 
            $sql = mysqli_query($conn, "SELECT * FROM products WHERE category = 'themecupcake' OR category = 'numberlettercupcake' OR category = 'muffins'");
            
            if(mysqli_num_rows($sql) > 0){
                while ($row = mysqli_fetch_assoc($sql)) {
                    echo '
                    <div class="box">
                            <div class="icons">
                            <button type="submit" name="viewProduct" class="btn2">
                                <i class="bx bx-list-plus">view product</i>
                            </button>
                            </div>
                            <input type="hidden" class="itemId" value="'.$row['pid'].'">
                            <input type="hidden" class="pname" value="'.$row['name'].'">
                            <input type="hidden" class="price" value="'.$row['price'].'">
                            <input type="hidden" class="pimage" value="'.$row['image'].'">
                            <div class="img">
                                <img src="assets/images/'.$row['image'].'" alt="">
                            </div>
                            <div class="content">
                                <h3>'.$row['name'].'</h3>
                                <div class="price">₱'.$row['price'].'</div>
                            </div>
                        </div>
                    ';
                }
            }
        ?>
    </div>
</section>

<div class="space"></div>


<section class="footer">
    <div class="box-container">
        <div class="box">
            <h3>quick links</h3>
        <a href="#"> <i class="fas fa-arrow-right"></i> Home</a>
        <a href="#"> <i class="fas fa-arrow-right"></i>Shop</a>
        <a href="#"> <i class="fas fa-arrow-right"></i>Contact</a>
        </div>

        <div class="box">
            <h3>follow us</h3>
            <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
            <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
        </div>

    </div>
</section>

<section class="credit">BakedbyAly || all rights reserved</section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/account.js"></script>
    <script src="main.js"></script> 
    <script>
  $(document).ready(function() {  
    // Send product details in the server
    $(".box-container").on("click", "button[type=submit]", function(e) {
        e.preventDefault();
        var $form = $(this).closest(".box");
        var pid = $form.find(".itemId").val();

        $.ajax({
            url: 'productPreview.php',
            method: 'post',
            data: {
                pid: pid
            },
            success: function(response) {
                $("#message").html(response);
                $('#productModal').modal('show');
            }
        });
    });
  });
  </script>
</body>
</html>