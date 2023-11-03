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
                    <th scope="col">name</th>
                    <th scope="col">date <i class="fa fa-filter" style="font-size:18px; cursor:pointer;"></i></th>
                    <th scope="col">Transaction no.</th>
                    <th scope="col">Amount</th>
                    </tr>
                </thead>
                <tbody id="showData">
                    <?php 
                    $select = mysqli_query($conn,"SELECT * From order_db");
                    $number = 1;
                    while ($row = mysqli_fetch_assoc($select))
                    {
                        
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    <script src="script.js"></script>
</body>
</html>