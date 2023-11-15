<link rel="stylesheet" href="./chat.css">
<?php include_once ("./header.php"); include_once "./sidebar.php";?>
<body>
<div class="content">
    <div class="product-container">
        <h1>Transactions</h1>
    </div>
    <div class="order-table">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Order no.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Date <i class="fa fa-filter" style="font-size:18px; cursor:pointer;"></i></th>
                    <th scope="col">Amount</th>
                    <th scope="col">Payment Status</th>
                    </tr>
                </thead>
                <tbody id="showData">
                    <?php 
                        $select = mysqli_query($conn,"SELECT * From transactions");
                        $number = 1;
                        while ($row = mysqli_fetch_assoc($select)){
                            $stmt = $conn->prepare('SELECT * FROM users WHERE user_id = ?');
                            $stmt->bind_param('s', $row['user_id']);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            $name = "----";
                            if ($result->num_rows > 0) {
                                $user_result = $result->fetch_assoc();
                                $name = $user_result['fname'] . " " . $user_result['lname'];
                            }

                            echo "<tr>";
                            echo "    <td>".$number."</td>";
                            $number++;
                            echo "    <td>".$row['order_id']."</td>";
                            echo "    <td>".$name."</td>";
                            echo "    <td>".($row['payment_date'] ? $row['payment_date'] : '----')."</td>";
                            echo "    <td>₱ ".$row['payment_amount']."</td>";
                            echo "    <td>".$row['payment_status']."</td>";
                            if ($row['payment_status'] == "NOT YET PAID") {
                                echo "    <input type='text' value='".$row['payment_reference']."' class='inp-payment-ids' hidden readonly>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.all.min.js" ></script>
    <script src="script.js"></script>
    <script>
        const paymentReferences = document.querySelectorAll(".inp-payment-ids")
        var have_updated = false

        if (paymentReferences.length > 0) {
            Swal.fire({
                title: "Loading Transactions...",
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
                                url: 'assets/update-payment.php',
                                method: 'post',
                                data: {
                                    payment_reference: id.value
                                },
                                success: function(response) {
                                    console.log("...")
                                    if (counter == paymentReferences.length){
                                        Swal.close()
                                    }
                                }
                            });
                        }
                        if (counter == paymentReferences.length){
                            Swal.close()
                            if (have_updated){
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