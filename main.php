<?php include('customerphp/header.php');?>
<link rel="stylesheet" href="customerPanel.css">
<?php include('assets/loginModal.php');?>
<?php include('assets/signupModal.php');?>
<?php include('assets/forgotPass.php');?>
<body>

<header class="header">
        <div class="logoContent">
            <a href="#" class="logo"><img src="assets/images/logo-web-removebg-preview.png" alt=""></a>
            <h1 class="logoName">Baked by Ally</h1>
        </div>

        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#product">product</a>
            <a href="#review">review</a>
            <a href="#contact">contact</a>
        </nav>

        <div class="icon">
            <i class="fas fa-search" id="search"></i>
        </div>

        <div class="search">
            <input type="search" placeholder="search...">
        </div>
        <div class="singupBtn" id="loginButton">
            <span id="signup_button">Login</span>
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
    <div id="prev-slide" class="fas fa-angle-left" onclick="next()"></div>

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

<h1 class="title"> our <span>category</span> </h1>

<div class="box-container">

    <a href="#" class="box">
        <img decoding="async" src="img/cat-1.jpg" alt="">
        <h3>Cupcakes</h3>
    </a>

    <a href="#" class="box">
        <img decoding="async" src="img/cat-8.jpg" alt="">
        <h3>Crinkles</h3>
    </a>

    <a href="#" class="box">
        <img decoding="async" src="img/cat-4.jpg" alt="">
        <h3>Cakes</h3>
    </a>

    <a href="#" class="box">
        <img decoding="async" src="img/cat-6.jpg" alt="">
        <h3>Customized Cake</h3>
    </a>


</div>

</section>




<section class="products">

    <h1 class="title"> our <span>products</span> <a href="#">view all >></a> </h1>

    <div class="box-container">

        <div class="box">
            <div class="icons">
                <a href="#" class="fas fa-shopping-cart"></a>
                <a href="#" class="fas fa-heart"></a>
            </div>
            <div class="img">
                <img decoding="async" src="img/product-1.jpg" alt="">
            </div>
            <div class="content">
                <h3>berries citrus fruits cake</h3>
                <div class="price">$19.99</div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="icons">
                <a href="#" class="fas fa-shopping-cart"></a>
                <a href="#" class="fas fa-heart"></a>
            </div>
            <div class="img">
                <img decoding="async" src="img/product-2.jpg" alt="">
            </div>
            <div class="content">
                <h3>resh mellow sp color cake</h3>
                <div class="price">$19.99</div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="icons">
                <a href="#" class="fas fa-shopping-cart"></a>
                <a href="#" class="fas fa-heart"></a>
            </div>
            <div class="img">
                <img decoding="async" src="img/product-3.jpg" alt="">
            </div>
            <div class="content">
                <h3>Rose color sparkel cake</h3>
                <div class="price">$19.99</div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="icons">
                <a href="#" class="fas fa-shopping-cart"></a>
                <a href="#" class="fas fa-heart"></a>
            </div>
            <div class="img">
                <img decoding="async" src="img/product-4.jpg" alt="">
            </div>
            <div class="content">
                <h3>strawberry nutella cake</h3>
                <div class="price">$19.99</div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="icons">
                <a href="#" class="fas fa-shopping-cart"></a>
                <a href="#" class="fas fa-heart"></a>
            </div>
            <div class="img">
                <img decoding="async" src="img/product-5.jpg" alt="">
            </div>
            <div class="content">
                <h3>green bread spar cake</h3>
                <div class="price">$19.99</div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="icons">
                <a href="#" class="fas fa-shopping-cart"></a>
                <a href="#" class="fas fa-heart"></a>
            </div>
            <div class="img">
                <img decoding="async" src="img/product-6.jpg" alt="">
            </div>
            <div class="content">
                <h3>red berries chocolate cake</h3>
                <div class="price">$19.99</div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="icons">
                <a href="#" class="fas fa-shopping-cart"></a>
                <a href="#" class="fas fa-heart"></a>
            </div>
            <div class="img">
                <img decoding="async" src="img/product-7.jpg" alt="">
            </div>
            <div class="content">
                <h3>strawberry red spar cake</h3>
                <div class="price">$19.99</div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="icons">
                <a href="#" class="fas fa-shopping-cart"></a>
                <a href="#" class="fas fa-heart"></a>
            </div>
            <div class="img">
                <img decoding="async" src="img/product-8.jpg" alt="">
            </div>
            <div class="content">
                <h3>dark chocolate nutella cake</h3>
                <div class="price">$19.99</div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
            </div>
        </div>
</div>
</section>



<div class="heading">
    <h1>About us</h1>
    </div>

<section class="about">
    <div class="img">
         <img decoding="async" src="img/about-img.jpg" alt="">
    </div>

    <div class="content">
        <span>welcome to our products</span>
        <h3>BakedbyAly products</h3>
        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
        incididunt ut labore et dolore farhan aliqua. Ut enim ad minim veniam, quis nostrud exercitation
        ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
        in voluptate </p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
         farhan aliqua. Ut enim ad minim veniam, quis</p>
        <a href="#" class="btn">read more</a>
    </div>
</section>



<section class="gallery">
    <h1 class="title"> our <span>gallery</span> <a href="#">view all >></a> </h1>
    <div class="box-container">

        <div class="box">
            <img decoding="async" src="img/gallery-img-1.jpg" alt="">
            <div class="icons">
                <a href="#" class="fas fa-eye"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share-alt"></a>
            </div>
        </div>

        <div class="box">
            <img decoding="async" src="img/gallery-img-2.jpg" alt="">
            <div class="icons">
                <a href="#" class="fas fa-eye"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share-alt"></a>
            </div>
        </div>

        <div class="box">
            <img decoding="async" src="img/gallery-img-3.jpg" alt="">
            <div class="icons">
                <a href="#" class="fas fa-eye"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share-alt"></a>
            </div>
        </div>

        <div class="box">
            <img decoding="async" src="img/gallery-img-4.jpg" alt="">
            <div class="icons">
                <a href="#" class="fas fa-eye"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share-alt"></a>
            </div>
        </div>

        <div class="box">
            <img decoding="async" src="img/gallery-img-5.jpg" alt="">
            <div class="icons">
                <a href="#" class="fas fa-eye"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share-alt"></a>
            </div>
        </div>

        <div class="box">
            <img decoding="async" src="img/gallery-img-6.jpg" alt="">
            <div class="icons">
                <a href="#" class="fas fa-eye"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share-alt"></a>
            </div>
        </div>
    </div>
</section>



<div class="heading">
    <h1>client's review</h1>
</div>

<section class="info-container">

    <div class="info">
        <img decoding="async" src="img/icons-1.png" alt="">
        <div class="content">
            <h3>fast delivery</h3>
            <span>within 30 minutes</span>
        </div>
    </div>

    <div class="info">
        <img decoding="async" src="img/icons-2.png" alt="">
        <div class="content">
            <h3>24 / 7 available</h3>
            <span>call us anytime</span>
        </div>
    </div>

    <div class="info">
        <img decoding="async" src="img/icons-3.png" alt="">
        <div class="content">
            <h3>easy payments</h3>
            <span>cash or credit</span>
        </div>
    </div>

</section>



<section class="review">

    <div class="box">
        <div class="user">
            <img decoding="async" src="img/pic-1.png" alt="">
            <div class="info">
                <h3>edward bey</h3>
                <span>happ client</span>
            </div>
        </div>
        <p>Lorem ipsum dolor sit amet, farhan aliqua. Ut enim ad minim veniam, quis</p>
    </div>

    <div class="box">
        <div class="user">
            <img decoding="async" src="img/pic-2.png" alt="">
            <div class="info">
                <h3>jenna bey</h3>
                <span>happ client</span>
            </div>
        </div>
        <p>Lorem ipsum dolor sit amet, farhan aliqua. Ut enim ad minim veniam, quis</p>
    </div>

    <div class="box">
        <div class="user">
            <img decoding="async" src="img/pic-3.png" alt="">
            <div class="info">
                <h3>edward bey</h3>
                <span>happ client</span>
            </div>
        </div>
        <p>Lorem ipsum dolor sit amet, farhan aliqua. Ut enim ad minim veniam, quis</p>
    </div>

    <div class="box">
        <div class="user">
            <img decoding="async" src="img/pic-4.png" alt="">
            <div class="info">
                <h3>lisa bey</h3>
                <span>happ client</span>
            </div>
        </div>
        <p>Lorem ipsum dolor sit amet, farhan aliqua. Ut enim ad minim veniam, quis</p>
    </div>

    <div class="box">
        <div class="user">
            <img decoding="async" src="img/pic-5.png" alt="">
            <div class="info">
                <h3>edward bey</h3>
                <span>happ client</span>
            </div>
        </div>
        <p>Lorem ipsum dolor sit amet, farhan aliqua. Ut enim ad minim veniam, quis</p>
    </div>

    <div class="box">
        <div class="user">
            <img decoding="async" src="img/pic-6.png" alt="">
            <div class="info">
                <h3>lalisa bey</h3>
                <span>happ client</span>
            </div>
        </div>
        <p>Lorem ipsum dolor sit amet, farhan aliqua. Ut enim ad minim veniam, quis</p>
    </div>

</section>


<div class="heading">
    <h1>Contact us</h1>
</div>

<section class="contact">
    <div class="icons-container">

        <div class="icons">
            <i class="fas fa-phone"></i>
            <h3>our number</h3>
            <p>+111-222-3333</p>
            <p>+456-786-7890</p>
        </div>

        <div class="icons">
            <i class="fas fa-envelope"></i>
            <h3>our email</h3>
            <p>shaikhfarhan@gmail.com</p>
            <p>xyzemail@gmail.com</p>
        </div>

        <div class="icons">
            <i class="fas fa-map-marker-alt"></i>
            <h3>our address</h3>
            <p>Bulakan, Philippines - 401203</p>
        </div>

    </div>

     <div class="row">
         <form action="">
             <h3>get in touch</h3>
             <div class="inputBox">
             <input type="text" placeholder="enter your name" class="box">
             <input type="text" placeholder="enter your email" class="box">
            </div>
            <div class="inputBox">
                <input type="number" placeholder="enter your number" class="box">
                <input type="text" placeholder="enter your subject" class="box">
               </div>
               <textarea placeholder=" your message" cols="30" rows="10"></textarea>
               <input type="submit" value="send message" class="btn">
         </form>
         <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d462560.3011806427!2d54.947543798608436!3d25.076381472700536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f43496ad9c645%3A0xbde66e5084295162!2sDubai%20-%20United%20Arab%20Emirates!5e0!3m2!1sen!2sin!4v1642496355732!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
     </div>

</section>

<div class="space"></div>



<section class="footer">
    <div class="box-container">
        <div class="box">
            <h3>quick links</h3>
        <a href="#"> <i class="fas fa-arrow-right"></i> Home</a>
        <a href="#"> <i class="fas fa-arrow-right"></i>Shop</a>
        <a href="#"> <i class="fas fa-arrow-right"></i>About</a>
        <a href="#"> <i class="fas fa-arrow-right"></i> Review</a>
        <a href="#"> <i class="fas fa-arrow-right"></i>Contact</a>
        </div>

        <div class="box">
            <h3>extra links</h3>
            <a href="#"> <i class="fas fa-arrow-right"></i>  my order </a>
            <a href="#"> <i class="fas fa-arrow-right"></i>  my account </a>
            <a href="#"> <i class="fas fa-arrow-right"></i>  terms or use </a>
        </div>

        <div class="box">
            <h3>follow us</h3>
            <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
            <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
        </div>
</section>

<section class="credit">BakedbyAly || all rights reserved</section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
     <script src="main.js"></script> 
     <script src="js/account.js"></script>
    <script src="js/pass-show-hide.js"></script>
    <script>
        const fileInput = document.getElementById("fileInput");
        const imagePreview = document.getElementById("preview");

        fileInput.addEventListener("change", function () {
            const file = fileInput.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = "project1/images/user3.png"; 
            }
        });
    </script>
</body>

</html>