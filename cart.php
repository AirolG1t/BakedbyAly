<?php include('customerphp/header.php');?>
<link rel="stylesheet" href="customerPanel.css">
<?php include_once('assets/dbcon.php');?>
<?php 
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: main.php");
    }
    $id = $_SESSION['unique_id'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$id}'");
    $row1 = mysqli_fetch_assoc($query);
?>
<body>
<header class="header">
    <div class="logoContent">
        <a href="Customer.php" class="logo"><img src="assets/images/logo-web-removebg-preview.png" alt="">
            <span class="logoName">Baked by Ally</span>
        </a>
    </div>
    <div class="icons">
        <div class="dropdown">
        <a href="assets/cart.php" class="shopping"><i id="cart-btn" class="fas fa-shopping-cart" style="color: #fff;"></i></a>
        </i>
        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" style="margin-left: 35px;" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $row1['fname']; echo $row1['lname'] ?>
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">View Profile</a></li>
            <li><a class="dropdown-item" href="#">Orders</a></li>
            <li><a class="dropdown-item" href="assets/logout.php?logout_id=<?php echo $row1['unique_id'] ?>">Logout</a></li>
        </ul>
        </div>
    </div>
</header>
<section class="products" style="margin-top: 150px;">
<div class="box-container">
<table class="table table-bordered cTable">
  <thead>
    <tr>
      <th scope="col">image</th>
      <th scope="col">name</th>
      <th scope="col">quantity</th>
      <th scope="col">price</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><img src="assets/images/cake1.png" alt="" style="width: 70px;height:70px;"></td>
      <td>ckae1</td>
      <td>₱245</td>
      <td>15</td>
      <td>
      <button class="btn btn-info" style="background: #FF0592; color: #FFF6FB; border-style:hidden;"><i class='bx bx-edit'>checkout</i></button>
    
        <button class="btn btn-danger" style="background: #FFBEE3; color: #FF0592; border-style:hidden;">
            <i class='bx bx-trash'>remove</i>
          </button>
      </td>
    </tr>
  </tbody>
</table>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/account.js"></script>
    <script src="main.js"></script> 
</body>
</html>