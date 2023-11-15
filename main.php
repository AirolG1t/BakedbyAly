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
            <a href="#products">product</a>
            <a href="#review">review</a>
            <a href="#contact">contact</a>
            <!-- <a href="#" onclick="showCartItems()">my cart<sup><span id="cart-counter">0</span></sup></a> -->
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
                <a href="#products" class="btn">Shop Now</a>
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
        <a href="#products" class="btn">shop now</a>
    </div>
    </div>

    <div class="banner">
        <img decoding="async" src="img/banner-2.jpg" alt="">
        <div class="content">
        <span>Favorites</span>
        <h3>Order Now!</h3>
        <a href="#products" class="btn">shop now</a>
    </div>
    </div>

    <div class="banner">
        <img decoding="async" src="img/banner-3.jpg" alt="">
        <div class="content">
        <span>Recommended by Customer</span>
        <h3>Order Now!</h3>
        <a href="#products" class="btn">shop now</a>
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


<div class="heading"  id="products">
    <h1></h1>
</div>


<section class="products">

    <h1 class="title"> our <span>products</span> <a href="#">view all >></a> </h1>

    <div class="box-container">
        <?php 
            include_once 'assets/dbcon.php';

            $select = mysqli_query($conn, "Select * FROM products");
            
            while($row = mysqli_fetch_assoc($select)){
                // echo '
                // <div class="box">
                //     <div class="icons">
                //         <span onclick="addToCart(`'.$row['id'].'`, `assets/images/'.$row['image'].'`, `'.$row['name'].'`, `'.$row['price'].'`)" class="fas fa-shopping-cart" style="font-size: 24px; cursor: pointer;"></span>
                //         <span class="fas fa-heart" style="font-size: 24px; cursor: pointer;"></span>
                //     </div>
                //     <center>
                //         <div class="img">
                //                 <img decoding="async" src="assets/images/'.$row['image'].'" alt="">
                //         </div>
                //     </center>
                //     <div class="content">
                //         <h3>'.$row['name'].'</h3>
                //         <div class="price">₱ '.$row['price'].'</div>
                //         <div class="stars">
                //             <i class="fas fa-star"></i>
                //             <i class="fas fa-star"></i>
                //             <i class="fas fa-star"></i>
                //             <i class="fas fa-star"></i>
                //             <i class="far fa-star"></i>
                //         </div>
                //     </div>
                // </div>';
                echo '
                <div class="box">
                    <div class="icons">
                        <span onclick="showLogin()" class="fas fa-shopping-cart" style="font-size: 24px; cursor: pointer;"></span>
                        <span onclick="showLogin()" class="fas fa-heart" style="font-size: 24px; cursor: pointer;"></span>
                    </div>
                    <center>
                        <div class="img">
                                <img decoding="async" src="assets/images/'.$row['image'].'" alt="">
                        </div>
                    </center>
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
                </div>';
            }
        ?>
        
        <!-- <div class="box">
            <div class="icons">
                <a href="#" class="fas fa-shopping-cart"></a>
                <a href="#" class="fas fa-heart"></a>
            </div>
            <center>
                <div class="img">
                        <img decoding="async" src="img/product-1.jpg" alt="">
                </div>
            </center>
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
        </div> -->

        <!-- <div class="box">
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
        </div> -->

        <!-- <div class="box">
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
        </div> -->
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



<div class="heading" id="review">
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

        function showLogin() {
            document.getElementById("loginForm").reset();
            $('#wrapper-modals').modal('show');
            $('#wrapper-modal').modal('hide');
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.all.min.js" ></script>
    <!-- add to cart script -->
    <script>
        var cartItems = []
        var cartItemCount = 0
        async function addToCart(id, image, name, price) {
            let addToCartTemplate = ""

            addToCartTemplate += `
                <div>
                    <img src='${image}' alt="img" height="150">
                    <h3>${name}</h3>
                    <h4>₱ ${price}</h4>

                    <input type="number" id="add-quantity" style="border: 1px #000 solid; border-radius: 7px; padding: 3px;" placeholder="Enter quantity"><br>
                    <small style="color: #ff0000; display: none;" id="add-to-cart-quantity-error">Please provide at least one (1) item quantity.</small>
                    <button id="btn-add-to-cart" value="${id}" class="btn btn-secondary" style="height: 40px; width: 150px; margin-right: 12px; font-size: 14px;">Add to Cart<button>
                    <button onclick="Swal.close()" class="btn btn-secondary" style="height: 40px; width: 120px; font-size: 14px;">Cancel<button>
                </div>
            `

            Swal.fire({
                html: addToCartTemplate,
                confirmButtonText: "Confirm",
                denyButtonText: "Cancel",
                showConfirmButton: false,
                showDenyButton: false,
                showCancelButton: false,
                showCloseButton: true,
                allowOutsideClick: false,
                width: 350,
                didOpen: () => {
                    const btnAddToCart = document.getElementById('btn-add-to-cart')
                    const btnAddQuantity = document.getElementById('add-quantity')

                    btnAddQuantity.addEventListener('input', function(e) {
                        e.preventDefault()
                        if (btnAddQuantity.value <= 0) {
                            document.getElementById('add-to-cart-quantity-error').style.display = "block"
                        }
                        else {
                            document.getElementById('add-to-cart-quantity-error').style.display = "none"
                        }
                    })

                    btnAddToCart.addEventListener('click', function(e) {
                        e.preventDefault()
                        
                        if (btnAddQuantity.value <= 0) {
                            document.getElementById('add-to-cart-quantity-error').style.display = "block"
                        }
                        else {
                            addedItem = new Object()
                            addedItem.id = id
                            addedItem.name = name
                            addedItem.quantity = btnAddQuantity.value
                            addedItem.price = price
                            addedItem.total_price = btnAddQuantity.value * price
                            
                            var is_added = false
                            cartItems.map(item => {
                                if (item.id == addedItem.id){
                                    item.quantity = parseInt(item.quantity) + parseInt(btnAddQuantity.value)
                                    item.total_price += (btnAddQuantity.value * price)
                                    is_added = true
                                }
                            })

                            if (!is_added) {
                                cartItems.push(addedItem)
                                cartItemCount += 1
                                document.getElementById('cart-counter').textContent = cartItemCount
                            }

                            Swal.fire('Added Successfully', 'You have successfully added an item in your cart.', 'success')

                        }
                    })
                }
            })
        }

        function showCartItems() {
            let cartItemsTemplate = ""

            cartItemsTemplate += `
                <div>
                    <table style="width: 100%">
                        <tr style="border-bottom: 1px #777777 solid;">
                            <th style="padding: 5px;">Name</th>
                            <th style="padding: 5px;">Quantity</th>
                            <th style="padding: 5px;">Price</th>
                            <th style="padding: 5px;">Total Price</th>
                        </tr>
            `
            
            if (cartItems.length > 0 ){
                cartItems.map(item => {
                    cartItemsTemplate += `
                        <tr style="border-bottom: 1px #e7e7e7 solid;">
                            <td style="padding: 5px;">${item.name}</td>
                            <td style="padding: 5px;">${item.quantity}</td>
                            <td style="padding: 5px;">${item.price}</td>
                            <td style="padding: 5px;">${item.total_price}</td>
                        </tr>
                    `
                })
            }
            else {
                cartItemsTemplate += `
                    <tr>
                        <td colspan="4" style="padding: 5px;">No item added yet.</td>
                    </tr>
                `
            }

            cartItemsTemplate += `
                    </table>
                </div>
            `

            Swal.fire({
                title: "My Cart",
                html: cartItemsTemplate,
                confirmButtonText: "Checkout",
                denyButtonText: "Close",
                showConfirmButton: true,
                showDenyButton: true,
                showCancelButton: false,
                showCloseButton: true,
                allowOutsideClick: false,
                width: 700,
            }).then((result) => {
                if (result.isConfirmed) {
                    if (cartItems.length >= 1) {

                        payload = new Object()
                        data = new Object()
                        attributes = new Object()

                        attributes.cancel_url = "https://bakedbyally.com/main.php"
                        attributes.billing = {
                                        "address": {
                                            "line1": "Sample Address",
                                            "line2": '',
                                            "city": "Sample City",
                                            "state": "Sample State",
                                            "postal_code": '',
                                            "country": 'PH'
                                        },
                                        "name": "Sample Name",
                                        "email": "sample@email.com",
                                        "phone": "09123456789",
                                    }
                        attributes.description = "Online Payment 1"
                                    
                        // add items in cart
                        var line_items = []
                        cartItems.map(item => {
                            line_items.push({
                                "amount": parseFloat(item.total_price + "00"),
                                "currency": 'PHP',
                                "description": "---",
                                "name": item.name,
                                "quantity": parseInt(item.quantity)
                            })
                        })
                        attributes.line_items = line_items

                        attributes.payment_method_types = ["gcash", "paymaya"]
                        attributes.reference_number = "123"
                        attributes.send_email_receipt = false
                        attributes.show_description = true
                        attributes.show_line_items = true
                        attributes.success_url = "https://bakedbyally.com/main.php"
                        attributes.statement_descriptor = "N/A"

                        data.attributes = attributes
                        payload.data = data

                        const options = {
                        method: 'POST',
                        headers: {
                            accept: 'application/json',
                            'Content-Type': 'application/json',
                            authorization: 'Basic c2tfdGVzdF93bVRjUjlBN1Fic3lZOGRVWjdTNUZnRkY6'
                        },
                        body: JSON.stringify(payload)
                        };

                        Swal.fire({
                            title: "Redirecting to Payment",
                            timerProgressBar: true,
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            },
                            }).then((result) => {
                        });

                        setTimeout(function() {
                            fetch('https://api.paymongo.com/v1/checkout_sessions', options)
                            .then(response => 
                                response.json()
                            )
                            .then((response) => {
                                window.location.href = response.data.attributes.checkout_url
                            })
                            .catch(err => console.error(err));
                        }, 900)
                    }
                    else {
                        Swal.fire('No Item/s Found.', 'Please add atleast one (1) item in your cart.', 'error')
                    }
                }
                else {
                    Swal.fire('Swal is closed', 'Swal is closed daw', 'info')
                }
            })
        }
    </script>
</body>

</html>