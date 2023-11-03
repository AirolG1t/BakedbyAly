<link rel="stylesheet" href="assets/css/chat.css">
<?php include_once ("./header.php"); include_once "./sidebar.php";?>
<body>
    <div class="content">
        <div class="product-container">
            <h1>Accounts</h1>
            <div class="search-bar">
                <span class='bx bx-search' ></span>
                <input type="search" class="form-control" id="account-search" placeholder="search..." autocomplete="off">
            </div>
        </div>
        <div class="account-table">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">name</th>
                            <th scope="col">account id#</th>
                            <th scope="col">status</th>
                            <th scope="col">usertype</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody id="accData">
                        <?php 
                        $select = mysqli_query($conn,"SELECT * From users");
                        $number = 1;
                        while ($row = mysqli_fetch_assoc($select))
                        {
                            echo '<tr>';
                            echo '<td>'.$number.'</td>';
                            echo '<td>'.$row['fname'].$row['lname'].'</td>';
                            echo '<td>'.$row['unique_id'].'</td>';
                            echo '<td>'.$row['status'].'</td>';
                            echo '<td><select class="form-select" aria-label="Default select example" name="useroption">
                                        <option selected>'.$row['userType'].'</option>
                                        <option value="customer">customer</option>
                                        <option value="admin">admin</option>
                                    </select>
                                </td>'; 
                            echo '<td>
                                    <button class="accBTN" data-hiddenid="'.$row['unique_id'].'">confirm <span class="bx bx-chevron-right"></span></button>
                                </td>'; 
                            echo '</tr>';
                            $number ++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
    <script src="js/account.js"></script>
</body>
</html>