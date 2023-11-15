<?php include('../customerphp/header.php');?>
<link rel="stylesheet" href="../customerPanel.css">
<?php include_once('../assets/dbcon.php');?>
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
    <div class="logoContent">
        <a href="../Customer.php" class="logo"><img src="../assets/images/logo-web-removebg-preview.png" alt="">
            <span class="logoName">Baked by Ally</span>
        </a>
    </div>
    <div class="icons">
        <div class="dropdown">
        <i id="menu-btn" class="fas fa-bars"></i>
        <i id="search-btn" class="fas fa-search"></i>
        <a href="../assets/cart.php" class="shopping"><i id="cart-btn" class="fas fa-shopping-cart" style="color: #fff;"></i></a>
        </i>
        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" style="margin-left: 35px;" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $row1['fname']; echo $row1['lname'] ?>
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">View Profile</a></li>
            <li><a class="dropdown-item" href="orders.php">Orders</a></li>
            <li><a class="dropdown-item" href="../assets/logout.php?logout_id=<?php echo $row1['unique_id'] ?>">Logout</a></li>
        </ul>
        </div>
    </div>
</header>

<div class="space"></div>

<section class="category">

<div class="box-container">

    <div>
        <h1>My Cart</h1>
        <hr>
        <div style="padding-left: 35px;">
            <div style="display: flex; justify-content: space-between; ">
                <h2 style="width: 30%;">Item Name</h2>
                <h2 style="width: 14%; text-align: center;">Flavor</h2>
                <h2 style="width: 14%; text-align: center;">Size</h2>
                <h2 style="width: 14%; text-align: center;">Quantity</h2>
                <h2 style="width: 14%; text-align: center;">Price</h2>
                <h2 style="width: 14%; text-align: center;">Total Price</h2>
            </div>
            <hr style="">
            <?php 
                $user_id = $_SESSION['user_id'];
                $select = mysqli_query($conn, "Select *, carttable.id AS cart_id FROM carttable INNER JOIN products ON carttable.cartId=products.pid WHERE carttable.user_id = '$user_id'");
                $counter = 0;
                while($row = mysqli_fetch_assoc($select)){
                    echo '
                    <div style="display: flex; justify-content: space-between;" class="cart-item">
                        <h3 style="display: flex; width: 30%;"><input type="checkbox" class="check-cart-item" id="cart-check-item" style="height: 20px; width: 20px; margin-right: 10px;"> <span id="cart-item-name">'.$row['cName'].'</span></h3>
                        <h3 id="cart-item-flavor" style="text-align: center; width: 14%;">'.$row['cFlavor'].'</h3>
                        <h3 id="cart-item-size" style="text-align: center; width: 14%;">'.$row['cSize'].'</h3>
                        <h3 id="cart-item-qty" style="text-align: center; width: 14%;">'.$row['qty'].'</h3>
                        <h3 id="cart-item-price" style="text-align: center; width: 14%;">'.$row['cPrice'].'</h3>
                        <h3 id="cart-item-total-price" style="text-align: center; width: 14%;">'.$row['totalPrice'].'</h3>
                        <h6 id="cart-item-id" style="display: none;">'.$row['cart_id'].'<h6>
                        <h6 id="cart-item-product-id" style="display: none;">'.$row['cartId'].'<h6>
                        <h6 id="cart-item-size" style="display: none;">'.$row['cSize'].'<h6>
                        <h6 id="cart-item-category" style="display: none">'.$row['cCategory'].'<h6>
                        <h6 id="cart-item-product-stock" style="display: none">'.$row['stock'].'<h6>
                    </div>
                    <hr style="">';
                    $counter++;
                }
                if ($counter == 0) {
                    echo '
                        <div style="display: flex; justify-content: space-between;" class="cart-item">
                            <h4>Empty Cart.</h4>
                        </div>
                    ';
                }
            ?>
            <!-- <div style="display: flex; justify-content: space-between; ">
                <h3>> Item 1</h3>
                <h3>1</h3>
                <h3>₱ 100</h3>
                <h3>₱ 100</h3>
            </div>
            <div style="display: flex; justify-content: space-between; ">
                <h3>> Item 2</h3>
                <h3>2</h3>
                <h3>₱ 100</h3>
                <h3>₱ 200</h3>
            </div>
            <div style="display: flex; justify-content: space-between; ">
                <h3>> Item 3</h3>
                <h3>3</h3>
                <h3>₱ 100</h3>
                <h3>₱ 300</h3>
            </div>
            <hr style="">
            <div style="display: flex; justify-content: space-between; ">
                <h3>Total Amount:</h3>
                <h3>₱ 600</h3>
            </div> -->
        </div>
    </div>

</div>

<div style="display: flex; justify-content: space-between;">
    <div>
        <button class="btn btn-danger" onclick="deleteCartItem()" style="background: #dc3545;">Remove Item</button><br><br>
        <h4 style="color: #ff0000; display: none;" id="delete-error">Please select at least one (1) item to delete.</h4>
    </div>
    <div style="text-align: right;">
        <button class="btn btn-secondary" onclick="proceedToPayment()">Proceed to Payment</button><br><br>
        <h4 style="color: #ff0000; display: none;" id="checkout-error">Please select at least one (1) item for checkout.</h4>
    </div>
</div>

</section>

<div class="space"></div>

<section class="footer">
    <div class="box-container">
        <div class="box">
            <h3>quick links</h3>
        <a href="../Customer.php"> <i class="fas fa-arrow-right"></i> Home</a>
        <a href="../Customer.php"> <i class="fas fa-arrow-right"></i>Shop</a>
        <a href="../Customer.php"> <i class="fas fa-arrow-right"></i>Contact</a>
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
    <script src="../js/account.js"></script>
    <script src="../main.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.all.min.js" ></script>
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

  <script>
    const cartChecks = document.querySelectorAll(".check-cart-item")
    cartChecks.forEach(check => {
        check.addEventListener('click', function (e) {
            if (check.checked){
                document.querySelector("#checkout-error").style.display = "none"
                document.querySelector("#delete-error").style.display = "none"
            }
        })
    })

    async function proceedToPayment() {
        const cartItemsDiv = document.querySelectorAll('.cart-item')
        var not_empty_cart = true
        var items_not_out_of_stock = true

        var cartItems = []
        await cartItemsDiv.forEach(item => {
            if (item.querySelector("h4") && item.querySelector("h4").textContent == "Empty Cart.") {
                not_empty_cart = false
            }
            else if (items_not_out_of_stock) {
                if (item.querySelector('#cart-check-item').checked){
                    console.log(item.querySelector('#cart-item-product-stock').textContent)
                    if (parseInt(item.querySelector('#cart-item-product-stock').textContent) <= 0){
                        Swal.fire({
                            icon: "warning",
                            title: "Item Out of Stock",
                            html: `<b>${item.querySelector('#cart-item-name').textContent}</b> is currently out of stock.`,
                        })
                        items_not_out_of_stock = false
                    }
                    cartItems.push({
                        "id": item.querySelector('#cart-item-id').textContent,
                        "product_id": item.querySelector('#cart-item-product-id').textContent,
                        "name": item.querySelector('#cart-item-name').textContent,
                        "quantity": item.querySelector('#cart-item-qty').textContent,
                        "price": item.querySelector('#cart-item-price').textContent,
                        "total_price": item.querySelector('#cart-item-total-price').textContent,
                        "size": item.querySelector('#cart-item-size').textContent,
                        "category": item.querySelector('#cart-item-category').textContent,
                    })
                }
            }
        })
        
        if (cartItems.length >= 1 && not_empty_cart && items_not_out_of_stock) {
            document.querySelector("#checkout-error").style.display = "none"
            Swal.fire({
                icon: "info",
                title: "Proceed to Payment",
                text: "Please continue to proceed in payment.",
                allowOutsideClick: true,
                showConfirmButton: true,
                showDenyButton: false,
                showCancelButton: true,
                showCloseButton: true,
                confirmButtonText: "Continue",
            }).then(async (result) => {
                if (result.isConfirmed) {
                    var continuePost = false
                    var generateRandoid = true

                    // generate random order id first
                    var min = 1000000;
                    var max = 9999999;

                    const randOid = Math.floor(Math.random() * (max - min + 1)) + min;
                    // const randOid = 5122575;
                    while(generateRandoid) {
                        await $.ajax({
                            url: 'validate-randoid.php',
                            method: 'post',
                            data: {
                                rand_oid: randOid,
                            },
                            success: function(response) {
                                // console.log("generating randoid....")
                                // console.log(response)
                                result = JSON.parse(response)
                                if (result.success) {
                                    console.log("EXISTS")
                                } else {
                                    generateRandoid = false
                                }
                            },
                            error: function() {
                                Swal.fire('Proceed to Payment Failed', 'Please try again later.', 'error')
                            }
                        });
                    }
                    
                    console.log(randOid)

                    var counter = 0
                    cartItems.map(async (item) => {
                        const currentDate = new Date()
                        var year = currentDate.getFullYear();
                        var month = (currentDate.getMonth() + 1).toString().padStart(2, '0');
                        var day = currentDate.getDate().toString().padStart(2, '0');

                        const dateNow = year + month + day

                        await $.ajax({
                            url: 'insert-order.php',
                            method: 'post',
                            data: {
                                cart_id: item.id,
                                product_id: item.product_id,
                                name: item.name,
                                qty: item.quantity,
                                price: item.price,
                                size: item.size,
                                category: item.category,
                                date: dateNow,
                                rand_oid: randOid
                            },
                            success: function(response) {
                                // console.log(response)
                                // console.log("Inserting order.....")
                                result = JSON.parse(response)
                                if (result.success) {
                                    // Insertion was successful
                                    continuePost = true
                                    counter++;
                                } else {
                                    // There was an error
                                    Swal.fire('Proceed to Payment Failed', 'Please try again later.', 'error')
                                }
                            },
                            error: function() {
                                Swal.fire('Proceed to Payment Failed', 'Please try again later.', 'error')
                            }
                        });
                        
                        if (counter == cartItems.length){
                            console.log("Create online payment....")
                            payload = new Object()
                            data = new Object()
                            attributes = new Object()

                            attributes.cancel_url = "https://bakedbyally.com/assets/orders.php"
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
                            attributes.description = "Baked By Ally Order"
                                        
                            // add items in cart
                            var line_items = []
                            var total_amount = 0
                            cartItems.map(item => {
                                line_items.push({
                                    "amount": parseFloat(item.total_price + "00"),
                                    "currency": 'PHP',
                                    "description": "---",
                                    "name": item.name,
                                    "quantity": parseInt(item.quantity)
                                })
                                total_amount += parseFloat(item.total_price) * parseInt(item.quantity)
                            })
                            attributes.line_items = line_items

                            attributes.payment_method_types = ["gcash", "paymaya"]
                            attributes.reference_number = "123"
                            attributes.send_email_receipt = false
                            attributes.show_description = true
                            attributes.show_line_items = true
                            attributes.success_url = "https://bakedbyally.com/assets/orders.php"
                            attributes.statement_descriptor = "N/A"

                            data.attributes = attributes
                            payload.data = data

                            console.log(payload)

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
                                .then(async (response) => {
                                    console.log("Create transaction....")
                                    await $.ajax({
                                        url: 'insert-transaction.php',
                                        method: 'post',
                                        data: {
                                            rand_oid: randOid,
                                            checkout_id: response.data.id,
                                            checkout_url: response.data.attributes.checkout_url,
                                            payment_amount: total_amount,
                                        },
                                        success: function(response) {
                                            console.log(response)
                                            result = JSON.parse(response)
                                            if (result.success) {
                                                console.log("SUCCESS")
                                            } else {
                                                Swal.fire('Proceed to Payment Failed.', 'Please try again later.', 'error')
                                            }
                                        },
                                        error: function() {
                                            Swal.fire('Proceed to Payment Failed', 'Please try again later.', 'error')
                                        }
                                    });

                                    // console.log(response.data)
                                    window.location.href = response.data.attributes.checkout_url
                                })
                                .catch(err => console.error(err));
                            }, 900)

                        }
                        
                    })
                }
            })
        }
        else if (!not_empty_cart && !items_not_out_of_stock) {
            document.querySelector("#checkout-error").innerHTML = "You cart is empty. <a href='../Customer.php'>Click here & shop now!</a>"
            document.querySelector("#checkout-error").style.display = "block"
        }
        else if (items_not_out_of_stock){
            document.querySelector("#checkout-error").innerHTML = "Please Select At Least One (1) Item For Checkout."
            document.querySelector("#checkout-error").style.display = "block"
        }
    }

    async function deleteCartItem() {
        const cartItemsDiv = document.querySelectorAll('.cart-item')
        var toDeleteItems = []
        var not_empty_cart = true

        await cartItemsDiv.forEach(item => {
            if (item.querySelector("h4") && item.querySelector("h4").textContent != "Empty Cart.") {
                not_empty_cart = false
            }
            else {
                if (item.querySelector('#cart-check-item').checked){
                    toDeleteItems.push(item.querySelector('#cart-item-id').textContent)
                }
            }
        })

        if (!not_empty_cart) {
            document.querySelector("#delete-error").innerHTML = "You cart is empty. <a href='../Customer.php'>Click here & shop now!</a>"
            document.querySelector("#delete-error").style.display = "block"
        }
        else if (toDeleteItems.length <= 0) {
            document.querySelector("#delete-error").style.display = "block"
        }
        else if (not_empty_cart){

            Swal.fire({
                icon: "question",
                title: "Delete Item/s",
                text: "Please continue to delete selected item/s.",
                showConfirmButton: false,
                showDenyButton: true,
                showCancelButton: true,
                showCloseButton: true,
                allowOutsideClick: false,
                denyButtonText: "Continue"
            }).then((result) => {
                if (result.isDenied) {
                    var counter = 0
                    Swal.fire({
                        title: 'Deleting Item', 
                        text: 'Please wait while deleting selected item...',
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        showCancelButton: false,
                    })

                    setTimeout(function () {
                        toDeleteItems.map(async (item) => {
                            await $.ajax({
                                url: 'delete-cart.php',
                                method: 'post',
                                data: {
                                    cart_id: item,
                                },
                                success: function(response) {
                                    console.log(response)
                                    result = JSON.parse(response)
                                    if (result.success) {
                                        console.log("SUCCESS")
                                        counter++
                                    } else {
                                        Swal.fire('Delete Item Failed', 'Please try again later.', 'error')
                                    }
                                },
                                error: function() {
                                    Swal.fire('Delete Item Failed', 'Please try again later.', 'error')
                                }
                            });

                            if (counter == toDeleteItems.length) {
                                window.location.href = "../assets/cart.php"
                            }
                        })
                    }, 1200)
                }
            })
            
            document.querySelector("#delete-error").style.display = "none"
        }
    }
  </script>
</body>
</html>