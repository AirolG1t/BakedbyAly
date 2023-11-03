<?php
include_once("dbcon.php");

    if(isset($_POST['input'])){
        $input = $_POST['input'];
        $select = mysqli_query($conn,"SELECT * From order_db WHERE Oname LIKE '$input%' OR Ocategory LIKE '$input%' OR Odate LIKE '$input%' OR 
                Osize LIKE '$input%' OR Ostatus LIKE '$input%'");
        $data = '';
        $number = 1;
        if(mysqli_num_rows($select) >0 ){
            while ($row = mysqli_fetch_assoc($select))
            {
                $data .= "<tr><td>".$number."</td><td>".$row['Oname']."</td><td>".$row['Odate']."</td><td>".$row['Osize']."</td><td>".$row['Ocategory']."</td><td>".$row['Ostatus']."</td>
                <td>
                    <button id='orderButton' data-hiddenid=".$row['randOid'].">>See all <span class='bx bx-chevron-right'></span></button>
                </td></tr>";
            }
            $number++;
            echo $data;
        }
        else {
            echo "<h6 class ='text-danger text-center mt-5'>No data found</h6>";
        }
    }

    if(isset($_POST['accS'])){
        $accSearch = $_POST['accS'];
        $select = mysqli_query($conn,"SELECT * From users WHERE fname LIKE '$accSearch%' OR lname LIKE '$accSearch%' OR unique_id LIKE '$accSearch%' OR 
                userType LIKE '$accSearch%' OR status LIKE '$accSearch%'");
        $data = '';
        $number = 1;
        if(mysqli_num_rows($select) > 0 ){
            while ($row = mysqli_fetch_assoc($select))
            {
                $data .= "<tr><td>".$number."</td><td>".$row['fname'].$row['lname']."</td><td>".$row['unique_id']."</td><td>".$row['status']."</td>
                        <td><select class='form-select' aria-label='Default select example' name='useroption'>
                                <option selected>".$row['userType']."</option>
                                <option value='customer'>customer</option>
                                <option value='admin'>admin</option>
                            </select>
                        </td>
                <td>
                    <button class='accBTN' data-hiddenid=".$row['unique_id'].">confirm <span class='bx bx-chevron-right'></span></button>
                </td></tr>";
            }
            $number++;
            echo $data;
        }
        else {
            echo "<h6 class ='text-danger text-center mt-5'>No data found</h6>";
        }
    }

    if(isset($_GET['hiddenid'])){
        $orderid = $_GET['hiddenid'];
        
        $query = "SELECT * FROM `order_db` WHERE randOid = '{$orderid}'";
        $result = mysqli_query($conn, $query);
        $output = '';

        while($row = mysqli_fetch_assoc($result)){
            $output .= '
            <form method="POST" action="assets/filter.php?orderId='.$row['randOid'].'">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="'.$row['Oname'].'" disabled>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Size:</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="'.$row['Osize'].'" disabled>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Date:</label>
                    <input type="date" class="form-control" id="exampleInputPassword1" name="order_date" value ="'.$row['Odate'].'">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Category:</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="'.$row['Ocategory'].'" disabled>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Status:</label>
                    <select class="form-control" name="order_status" id="exampleInputPassword1">
                        <option selected>'.$row['Ostatus'].'</option>
                        <option value="Ongoing">Ongoing</option>
                        <option value="Complete">Complete</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
            ';
        } echo $output;
    }
?>