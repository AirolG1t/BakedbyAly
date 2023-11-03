<?php
include_once("dbcon.php");
    $query = "SELECT * FROM order_db ORDER BY randOid DESC";
    $result = mysqli_query($conn, $query);

    $number = 1;
    $data = '';
        if(mysqli_num_rows($result) > 0 ){
            while ($row = mysqli_fetch_assoc($result))
            {
                $data .= "<tr>
                        <td>".$number."</td>
                        <td>".$row['Oname']."</td>
                        <td>".$row['Odate']."</td>
                        <td>".$row['Osize']."</td>
                        <td>".$row['Ocategory']."</td>
                        <td>".$row['Ostatus']."</td>
                        <td>
                        <button id='orderButton' data-hiddenid=".$row['randOid'].">See all <span class='bx bx-chevron-right'></span></button>
                        </td>
                        </tr>";
                        $number++;
            }
            echo $data;
        }
        else {
            echo "<h6 class ='text-danger text-center mt-5'>No data found</h6>";
        }
        if (isset($_GET['orderId'])) {
            $id = $_GET['orderId'];
            $date = $_POST['order_date'];
            $status = $_POST['order_status'];
        
            $query2 = "UPDATE order_db SET Odate = ?, Ostatus = ? WHERE randOid = ?";
            
            // Prepare the statement
            $stmt = mysqli_prepare($conn, $query2);
        
            if ($stmt) {
                // Bind parameters and execute the query
                mysqli_stmt_bind_param($stmt, "ssi", $date, $status, $id);
                if (mysqli_stmt_execute($stmt)) {
                    header("location: ../order.php");
                    echo "success";
                } else {
                    echo "error update order details: " . mysqli_error($conn);
                }
        
                // Close the statement
                mysqli_stmt_close($stmt);
            } else {
                echo "Failed to prepare the statement: " . mysqli_error($conn);
            }
        }
        
?>