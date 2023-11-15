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
            <li><a class="dropdown-item" href="#">Orders</a></li>
            <li><a class="dropdown-item" href="../assets/logout.php?logout_id=<?php echo $row1['unique_id'] ?>">Logout</a></li>
        </ul>
        </div>
    </div>
</header>

<div class="space"></div>

<section class="category">

<div class="box-container">

    <div>
        <h1>My Orders</h1>
        <hr>
        <div style="padding-left: 35px;">
            <div style="display: flex; justify-content: space-between; ">
                <h2 style="text-align: center; width: 20%; font-weight: bold;">Order No</h2>
                <h2 style="text-align: center; width: 20%; font-weight: bold;">Name</h2>
                <h2 style="text-align: center; width: 20%; font-weight: bold;">Status</h2>
                <h2 style="text-align: center; width: 20%; font-weight: bold;">Payment</h2>
                <h2 style="text-align: center; width: 20%; font-weight: bold;">Action</h2>
            </div>
            <hr style="">
            <?php 
                $select = mysqli_query($conn, "Select * FROM order_db INNER JOIN transactions ON order_db.randOid=transactions.order_id WHERE order_db.user_id =".$_SESSION['user_id']);
                $counter = 0;
                while($row = mysqli_fetch_assoc($select)) {
                    if ($row['payment_status'] == "NOT YET PAID") {
                        echo '<input type="text" class="inp-payment-ids" value="'.$row['payment_reference'].'" hidden readonly>';
                        echo '
                        <div style="display: flex; justify-content: space-between;" class="cart-item">
                            <h3 style="text-align: center; width: 20%;">'.$row['order_id'].'</h3>
                            <h3 style="text-align: center; width: 20%;">'.$row['Oname'].'</h3>
                            <h3 style="text-align: center; width: 20%;">'.$row['Ostatus'].'</h3>
                            <h3 style="text-align: center; width: 20%; color: #ff0000;">'.$row['payment_status'].'</h3>
                            <h3 style="text-align: center; width: 20%; text-decoration: underline; color: #0000ff; cursor: pointer;" onclick="checkPayment(`'.$row['payment_reference'].'`, `'.$row['payment_url'].'`)">Pay Order</h3>
                        </div>
                        <hr style="">';
                    }
                    else {
                        echo '
                        <div style="display: flex; justify-content: space-between;" class="cart-item">
                            <h3 style="text-align: center; width: 20%;">'.$row['order_id'].'</h3>
                            <h3 style="text-align: center; width: 20%;">'.$row['Oname'].'</h3>
                            <h3 style="text-align: center; width: 20%;">'.$row['Ostatus'].'</h3>
                            <h3 style="text-align: center; width: 20%; color: #228222;">'.$row['payment_status'].'</h3>
                            <h3 style="text-align: center; width: 20%;">----</h3>
                        </div>
                        <hr style="">';
                    }
                    $counter++;
                }
                if ($counter == 0) {
                    echo '
                        <div style="display: flex; justify-content: space-between;" class="cart-item">
                            <h4>Empty Order.</h4>
                        </div>
                    ';
                }
            ?>
        </div>
    </div>

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
        function checkPayment(payment_reference, payment_url) {
            Swal.fire({
                title: "Checking Payment",
                timerProgressBar: true,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                },
                }).then((result) => {
            });

            const options = {
                method: 'GET',
                headers: {
                    accept: 'application/json',
                    'Content-Type': 'application/json',
                    authorization: 'Basic c2tfdGVzdF93bVRjUjlBN1Fic3lZOGRVWjdTNUZnRkY6'
                }
            };

            setTimeout(function() {
                fetch(`https://api.paymongo.com/v1/checkout_sessions/${payment_reference}`, options)
                .then(response => 
                    response.json()
                )
                .then(async (response) => {
                    // console.log("Create transaction....")
                    if (response.data.attributes.payment_intent.attributes.status == "succeeded") {
                        Swal.fire({
                            icon: "info",
                            title: "Order Already Paid",
                            text: "Please wait while we update payment status.",
                            timerProgressBar: true,
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            },
                            }).then((result) => {
                        });
                        setTimeout(async function () {
                            await $.ajax({
                                url: 'update-payment.php',
                                method: 'post',
                                data: {
                                    payment_reference: payment_reference
                                },
                                success: function(response) {
                                    window.location.href = "../assets/orders.php"
                                }
                            });
                        }, 2000)
                    }
                    else {
                        Swal.fire({
                            title: "Redirecting to Payment",
                            timerProgressBar: true,
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            },
                            }).then((result) => {
                        });

                        setTimeout(function () {
                            window.location.href = response.data.attributes.checkout_url
                        }, 1200)
                    }
                })
                .catch(err => console.error(err));
            }, 900)
        }
    </script>

    <script>
        async function proceedToPayment() {
            const cartItemsDiv = document.querySelectorAll('.cart-item')

            var cartItems = []
            await cartItemsDiv.forEach(item => {
                if (item.querySelector('#cart-check-item').checked){
                    cartItems.push({
                        "id": item.querySelector('#cart-item-id').textContent,
                        "name": item.querySelector('#cart-item-name').textContent,
                        "quantity": item.querySelector('#cart-item-qty').textContent,
                        "price": item.querySelector('#cart-item-price').textContent,
                        "total_price": item.querySelector('#cart-item-total-price').textContent,
                        "size": item.querySelector('#cart-item-size').textContent,
                        "category": item.querySelector('#cart-item-category').textContent,
                    })
                }
            })

            if (cartItems.length >= 1) {
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
                            total_amount +=  parseFloat(item.total_price) * parseInt(item.quantity)
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
                                // console.log("Create transaction....")
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
                                            Swal.fire('Proceed to Payment Failed', 'Please try again later.', 'error')
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

                        document.querySelector("#checkout-error").style.display = "none"
                    }
                    
                })

            }
            else {
                document.querySelector("#checkout-error").style.display = "block"
            }
        }
    </script>

    <script>
        const paymentReferences = document.querySelectorAll(".inp-payment-ids")
        var have_updated = false

        if (paymentReferences.length > 0) {
            Swal.fire({
                title: "Loading Orders...",
                timerProgressBar: true,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                },
                }).then((result) => {
            });

            var counter = 0
            paymentReferences.forEach(id => {
                counter++;
                console.log("Checking payments status...")
                const options = {
                    method: 'GET',
                    headers: {
                        accept: 'application/json',
                        'Content-Type': 'application/json',
                        authorization: 'Basic c2tfdGVzdF93bVRjUjlBN1Fic3lZOGRVWjdTNUZnRkY6'
                    }
                };

                setTimeout(function() {
                    fetch("https://api.paymongo.com/v1/checkout_sessions/"+id.value, options)
                    .then(response => 
                        response.json()
                    )
                    .then(async (response) => {
                        // console.log("Create transaction....")
                        if (response.data.attributes.payment_intent.attributes.status == "succeeded") {
                            have_updated = true
                            await $.ajax({
                                url: 'update-payment.php',
                                method: 'post',
                                data: {
                                    payment_reference: id.value
                                },
                                success: function(response) {
                                    console.log(response)
                                    if (counter == paymentReferences.length){
                                        Swal.close()
                                    }
                                }
                            });
                        }
                        if (counter == paymentReferences.length){
                            Swal.close()
                            if (have_updated) {
                                location.reload()
                            }
                        }
                    })
                    .catch(err => console.error(err));
                }, 900)
            })
        }
    </script>
</body>
</html>