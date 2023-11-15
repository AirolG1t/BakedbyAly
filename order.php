<?php
include_once 'header.php';
include './sidebar.php';
include_once 'assets/dbcon.php';?>
<body>
<div class="content">
    <div class="product-container">
        <h1>Orders</h1>
        <div class="search-bar">
            <span class='bx bx-search' ></span>
            <input type="search" class="form-control" id="live-search" placeholder="search...">
        </div>
    </div>
    <div class="orderModal">
        <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" id="modal-content">
                    
                </div>
            </div>
        </div>
    </div>
<div class="order-table">
    <div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Date <button class="filter"><i class="fa fa-filter"></i></button></th>
            <th scope="col">Size</th>
            <th scope="col">Category</th>
            <th scope="col">Payment Status</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="showData">
            <?php 
                $select = mysqli_query($conn,"SELECT *, order_db.id AS order_id From order_db INNER JOIN transactions ON order_db.randOid=transactions.order_id");
                $number = 1;
                while ($row = mysqli_fetch_assoc($select)){
                    echo "<tr>";
                    // echo "    <td>".$number."</td>";
                    // $number++;
                    if ($row['payment_status'] == "NOT YET PAID") {
                        echo "    <input type='text' class='inp-payment-ids' value='".$row['payment_reference']."' hidden readonly>";
                    }
                    echo "    <td>".$row['randOid']."</td>";
                    echo "    <td>".$row['Oname']."</td>";
                    echo "    <td>".$row['Odate']."</td>";
                    echo "    <td>".$row['Osize']."</td>";
                    echo "    <td>".$row['Ocategory']."</td>";
                    echo "    <td>".$row['payment_status']."</td>";
                    echo "    <td>".$row['Ostatus']."</td>";
                    echo "    <td>
                                <button class='orderButton' data-hiddenid=".$row['order_id'].">See all <span class='bx bx-chevron-right'></span></button>
                            </td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
        </table>
    </div>
</div>
</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <script src="js/order.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.all.min.js" ></script>
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