<?php
include_once 'header.php';
include './sidebar.php';
include_once 'assets/dbcon.php';?>
<?php
    if ($_SESSION['user_type'] == "customer") {
        header("location: Customer.php");
    }
    else if  ($_SESSION['user_type'] != "admin") {
        header("location: main.php");
    }
?>
    <div class="content1">
            <div class="product-container">
                <h1>Dashboard</h1>
            </div>
            <div class="data">
                <div class="cards">
                    <div class="card-single">
                        <div>
                            <h1>24</h1>
                            <i class="bx bx-body"></i>
                            <span>Customers</span>
                        </div>
                    </div>
                    <div class="card-single">
                        <div>
                            <h1>10</h1>
                            <i class='bx bx-box'></i>
                            <span>Orders</span>
                        </div>
                    </div>
                    <div class="card-single">
                        <div>
                            <h1>12,050 pesos</h1>
                            <i class='bx bx-credit-card-alt' ></i>
                            <span>Income</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid">
                <div class="project">
                    <div class="card">
                        <div class="card-header">
                            <h3>Recents Orders</h3>
                            <a href="./order.php"><button id="orderButton">See all <span class="bx bx-chevron-right"></span></button></a>
                        </div>
        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" style="width:100%;">
                                    <tbody>
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
                                            echo "    <td>".$row['Ocategory']."</td>";
                                            echo "    <td>".$row['Ostatus']."</td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="chats">
                    <div class="card">
                        <header class="card-header">
                            <h3>Chat</h3>
                        </header>
        
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>
            </div>        
    </div>

    <script src="script.js"></script>
    <script src="js/home.js"></script>
</body>
</html>