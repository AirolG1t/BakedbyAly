<?php include 'header.php';
include './sidebar.php';?>
<?php include 'assets/pDelete.php';
  include 'assets/product.php';
?>
<!-####################################################--Add Product--####################################################--!>
<div class="modal fade bd-example-modal-lg" id="addproductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Add Product</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="assets/product.php" method="post" class="input-product" id="product-form" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="p-details">
            <div class="p-container">
              <div class="p-label">
                <label for="pName">Name:</label>
              </div>
              <input type="text" id="pName" placeholder="Enter name" name="product_name" class="box" required>
            </div>
            <div class="p-container">
              <div class="p-label">
                  <label for="pPrice">Price:</label>
              </div>
                <input type="number" id="pPrice" placeholder="Enter price" name="product_price" class="box" required>
            </div>
            <div class="p-container">
                <div class="p-label">
                    <label for="stock">Stock:</label>
                </div>
                <input type="number" id="stock" placeholder="Enter in-stock" name="product_stock" class="box" required>
            </div>
          </div>
          <div class="p-details">
           <div class="p-container">
              <div class="p-label">
                <label for="size">Size:</label>
              </div>
              <input type="checkbox" class="tags size" name="size[]" id="large" value="large"><span onclick="checkCheckbox('large')">Large</span>
              <input type="checkbox" class="tags size" name="size[]" id="medium" value="medium"><span onclick="checkCheckbox('medium')">Medium</span>
              <input type="checkbox" class="tags size" name="size[]" id="small" value="small"><span onclick="checkCheckbox('small')">Small</span>
            </div>
            <div class="p-container">
              <div class="p-label">
                <label for="flavors">Flavor:</label>
              </div>
              <input type="checkbox" class="tags flavor" name="flavor[]" id="chocolate" value="Chocolate"><span onclick="checkCheckbox('chocolate')">Chocolate</span>
              <input type="checkbox" class="tags flavor" name="flavor[]" id="moistChocolate" value="Moist Chocolate"><span onclick="checkCheckbox('moistChocolate')">Moist Chocolate</span>
              <input type="checkbox" class="tags flavor" name="flavor[]" id="velvet" value="Velvet"><span onclick="checkCheckbox('velvet')">Velvet</span>
              <input type="checkbox" class="tags flavor" name="flavor[]" id="vanilla" value="Vanilla"><span onclick="checkCheckbox('vanilla')">Vanilla</span>
              <input type="checkbox" class="tags flavor" name="flavor[]" id="moistVanilla" value="Moist Vanilla"><span onclick="checkCheckbox('moistVanilla')">Moist Vanilla</span>
              <input type="checkbox" class="tags flavor" name="flavor[]" id="caramel" value="Caramel"><span onclick="checkCheckbox('caramel')">Caramel</span>
            </div>
          </div>
          <div class="p-container">
              <div class="p-label">
                <label for="category">Category:</label>
              </div>
                <select id="category" name="product_category" class="box" required>
                  <option selected>Choose...</option>
                  <option value="muffins">Muffins</option>
                  <option value="themecupcake">Themed Cupcake</option>
                  <option value="numberlettercupcake">Number/Letter Cupcake</option>
                  <option value="cake">Cake</option>
                </select>
          </div>
          <div class="form-group">
            <label for="desc-text" class="col-form-label">Description:</label>
            <textarea class="form-control" id="desc-text" name="description"></textarea>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Upload</span>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="inputGroupFile01" name="productImage">
              <label class="custom-file-label" for="inputGroupFile01">Choose image</label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary" name="product_add">Add Product</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-####################################################--Edit Product--####################################################--!>
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="modal-content">
      
    </div>
  </div>
</div>
<!-##########################################################################################################--!>
            <div class="content">
                    <div class="product-container">
                            <h1>Product</h1>
                    </div>
                    <div class="add-item">
                          <button type="button" class="btn btn-primary float-end" id="addBtn">
                          <span class='bx bx-plus-circle'></span>Add product</button>
                    </div>
                            <?php 
                                $select = mysqli_query($conn, "Select * FROM products");
                            ?>
                    <div class="product-table">
                      <div class="table-responsive">
                         <table class="table">
                            <thead>
                                    <th scope="col">#</th>
                                    <th scope="col">Product Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Flavor</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Action</th>
                            </thead>
                            <?php
                                $number = 1;
                                while($row = mysqli_fetch_assoc($select)){
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $number?></td>
                                    <td><img src="assets/images/<?php echo $row['image']; ?>" height="100px" alt=""></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo  $row['flavor'];?></td>
                                    <td><?php echo  $row['size'];?></td>
                                    <td><?php echo  $row['stock'];?></td>
                                    <td><?php echo $row['price']; ?></td>
                                    <td>
                                        <button class="btn btn-info openModalButton" data-hiddenid="<?php echo $row['pid']; ?>" style="background: #FF0592; color: #FFF6FB; border-style:hidden;"><i class='bx bx-edit'>Edit</i></button>
                                        <a href="./product.php?delete=<?php echo $row['pid']; ?>" class="text-light">
                                          <button class="btn btn-danger" style="background: #FFBEE3; color: #FF0592; border-style:hidden;">
                                            <i class='bx bx-trash'>Delete</i>
                                          </button>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                            <?php $number++; };?>
                        </table>
                      </div>
                    </div>
            </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="script.js"></script>
        <script src="js/product.js"></script>
</body>
</html>