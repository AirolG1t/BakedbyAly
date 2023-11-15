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

    // get cart order details
    $cart_query = $conn->prepare('SELECT * FROM carttable WHERE id = ?');
    $cart_query->bind_param('s', $_GET['id']);
    $cart_query->execute();
    $result = $cart_query->get_result();

    if ($result->num_rows > 0) {
        $cart = $result->fetch_assoc();
        $product_id = $cart['cartId'];
        $product_name = $cart['cName'];
        $product_price = $cart['cPrice'];
        $product_image = $cart['cImage'];
        $product_flavor = $cart['cFlavor'];
        $product_size = $cart['cSize'];
        $product_category = $cart['cCategory'];
        $product_quantity = $cart['qty'];
        $product_total_price = $cart['totalPrice'];
    }

    // get user details
    $user_query = $conn->prepare('SELECT * FROM users WHERE user_id = ?');
    $user_query->bind_param('s', $_SESSION['user_id']);
    $user_query->execute();
    $user_result = $user_query->get_result();

    if ($user_result->num_rows > 0) {
        $user = $user_result->fetch_assoc();
        $user_name = $user['fname'] . " " . $user['lname'] ;
        $user_email = $user['email'];
        $user_contact = $user['contact'];
    }
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
        <h1>Checkout</h1>
        <hr>
        <h4 style="font-weight: normal;">Please kindly double check the information below.</h4>
        <div style="display: flex; justify-content: space-between;">
            <div style="width: 45%; padding: 2.5%">
                <div style="display: flex; justify-content: space-between; ">
                    <h2>Order Information</h2>
                </div>
                <hr>
                <h3 style="display: flex; justify-content: space-between;">Name: <span id="order-name" style="font-weight: normal; width: 50%;"><?php echo $product_name; ?></span></h3>
                <hr>
                <h3 style="display: flex; justify-content: space-between;">Qty: <span id="order-quantity" style="font-weight: normal; width: 50%;"><?php echo $product_quantity; ?></span></h3>
                <hr>
                <h3 style="display: flex; justify-content: space-between;">Price: <span id="order-price" style="font-weight: normal; width: 50%;"><?php echo $product_price; ?></span></h3>
                <hr>
                <h3 style="display: flex; justify-content: space-between;">Size: <span id="order-size" style="font-weight: normal; width: 50%;"><?php echo $product_size; ?></span></h3>
                <hr>
                <h3 style="display: flex; justify-content: space-between;">Category: <span id="order-category" style="font-weight: normal; width: 50%;"><?php echo $product_category; ?></span></h3>
                <hr>
                <h3>Dedication:</h3>
                <textarea name="" id="order-dedication" placeholder="Enter your cake dedication here" style="width: 100%; border: 1px #000 solid; font-size: 13px; border-radius: 10px; height: 125px; padding: 7px;"></textarea>
            </div>
            <div style="width: 45%; padding: 1.5%; border: 2px #000 solid; border-radius: 10px;">
                <h2>Additional Information</h2>
                <br>
                <h4 style="color: #444;"><span style="color:#ff0000;">*</span>Customer Name:</h4>
                <input type="text" value="<?php echo $user_name; ?>" id="inp-customer-name" style="width: 100%; height: 40px; margin-bottom: 20px; padding: 7px; font-size: 13px; border: 1px #000 solid; border-radius: 7px;" placeholder="Customer Name">
                <h4 style="color: #444;"><span style="color:#ff0000;">*</span>Customer Contact No.:</h4>
                <input type="text" value="<?php echo $user_contact; ?>" id="inp-customer-contact" style="width: 100%; height: 40px; margin-bottom: 20px; padding: 7px; font-size: 13px; border: 1px #000 solid; border-radius: 7px;" placeholder="Contact No.">
                <h4 style="color: #444;"><span style="color:#ff0000;">*</span>Customer Email:</h4>
                <input type="text" value="<?php echo $user_email; ?>" id="inp-customer-email" style="width: 100%; height: 40px; margin-bottom: 20px; padding: 7px; font-size: 13px; border: 1px #000 solid; border-radius: 7px;" placeholder="Email">
                <h4 style="color: #444;"><span style="color:#ff0000;">*</span>Date of Pickup:</h4>
                <input type="date" id="order-pickup" style="width: 100%; height: 40px; margin-bottom: 20px; padding: 7px; font-size: 13px; border: 1px #000 solid; border-radius: 7px;" placeholder="Email">
                
                <div style="text-align: right;">
                    <h5 style="font-weight: normal; color: #ff0000; font-style: italic;">All fields with * are required.</h5>
                </div>
                <div style="text-align: right;">
                    <button class="btn btn-secondary" onclick="proceedToPayment()">Proceed to Payment</button><br><br>
                </div>
            </div>
        </div>
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
        const customerName = document.querySelector("#inp-customer-name")
        const customerContact = document.querySelector("#inp-customer-contact")
        const customerEmail = document.querySelector("#inp-customer-email")
        const orderPickup = document.querySelector("#order-pickup")
        const orderDedication = document.querySelector("#order-dedication")

        if (customerName.value == "" || customerContact.value == "" || customerEmail.value == "" || orderPickup.value == "") {
            Swal.fire({
                icon: "warning",
                title: "Additional Information Error",
                text: "Please fill-up all fields with * provided."
            })
        }
        else {
            Swal.fire({
                icon: "question",
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

                    const currentDate = new Date()
                    var year = currentDate.getFullYear();
                    var month = (currentDate.getMonth() + 1).toString().padStart(2, '0');
                    var day = currentDate.getDate().toString().padStart(2, '0');

                    const dateNow = year + month + day

                    await $.ajax({
                        url: 'insert-order.php',
                        method: 'post',
                        data: {
                            cart_id: '<?php echo $_GET['id']; ?>',
                            product_id: '<?php echo $product_id; ?>',
                            name: document.querySelector("#order-name").textContent,
                            qty: document.querySelector("#order-quantity").textContent,
                            price: document.querySelector("#order-price").textContent,
                            size: document.querySelector("#order-size").textContent,
                            category: document.querySelector("#order-category").textContent,
                            date: dateNow,
                            rand_oid: randOid,
                            dedication: orderDedication.value,
                            date_pickup: orderPickup.value,
                        },
                        success: function(response) {
                            // console.log(response)
                            // console.log("Inserting order.....")
                            result = JSON.parse(response)
                            if (result.success) {
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
                                line_items.push({
                                    "amount": parseFloat(document.querySelector("#order-price").textContent + "00"),
                                    "currency": 'PHP',
                                    "description": "---",
                                    "name": document.querySelector("#order-name").textContent,
                                    "quantity": parseInt(document.querySelector("#order-quantity").textContent)
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
                                        console.log(response)
                                        await $.ajax({
                                            url: 'insert-transaction.php',
                                            method: 'post',
                                            data: {
                                                rand_oid: randOid,
                                                checkout_id: response.data.id,
                                                checkout_url: response.data.attributes.checkout_url,
                                                payment_amount: parseInt(document.querySelector("#order-quantity").textContent) * parseFloat(document.querySelector("#order-price").textContent)
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
                            } else {
                                // There was an error
                                Swal.fire('Proceed to Payment Failed', 'Please try again later.', 'error')
                            }
                        },
                        error: function() {
                            Swal.fire('Proceed to Payment Failed', 'Please try again later.', 'error')
                        }
                    });
                }
            })
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
                        title: 'Deleting Item/s', 
                        text: 'Please wait while deleting item/s...',
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