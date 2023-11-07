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
            <th scope="col">name</th>
            <th scope="col">date <button class="filter"><i class="fa fa-filter"></i></button></th>
            <th scope="col">size</th>
            <th scope="col">category</th>
            <th>quantity</th>
            <th scope="col">status</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="showData">
            <?php 
            $select = mysqli_query($conn,"SELECT * From order_db");
            $number = 1;
            while ($row = mysqli_fetch_assoc($select))
            {
                echo "<tr>";
                echo "    <td>".$number."</td>";
                $number++;
                echo "    <td>".$row['Oname']."</td>";
                echo "    <td>".$row['Odate']."</td>";
                echo "    <td>".$row['Osize']."</td>";
                echo "    <td>".$row['Oqty']."</td>";
                echo "    <td>".$row['Ocategory']."</td>";
                echo "    <td>".$row['Ostatus']."</td>";
                echo "    <td>
                            <button class='orderButton' data-hiddenid=".$row['randOid'].">See all <span class='bx bx-chevron-right'></span></button>
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
</body>
</html>