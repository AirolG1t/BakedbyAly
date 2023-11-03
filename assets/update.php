<?php
if (isset($_GET['hiddenid'])) {
    include_once("dbcon.php");

    $hiddenid = $_GET['hiddenid'];

    $sql = mysqli_query($conn, "SELECT * FROM products WHERE pid = '$hiddenid'");
    $output = '';

    while ($row = mysqli_fetch_array($sql)) {
        $size = explode(',', $row['size']);
        $flavor = explode(',', $row['flavor']);

        $output .= '<div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Update Product</h3>
        <button type="button" class="close" id="closedbtn" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form id="updateForm" action="assets/product.php?updateid='.$row['pid'].'" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="p-details">
                    <div class="p-container">
                        <div class="p-label">
                            <label for="pName">Name:</label>
                        </div>
                        <input type="text" id="pName" placeholder="Enter name" name="update_name" value="'.$row['name'].'" class="box" required aria-autocomplete="none">
                    </div>
                    <div class="p-container">
                        <div class="p-label">
                            <label for="pPrice">Price:</label>
                        </div>
                        <input type="number" id="pPrice" placeholder="Enter price" name="update_price" value="'.$row['price'].'" class="box" required>
                    </div>
                </div>
                <div class="p-details">
                    <div class="p-container">
                        <div class="p-label">
                            <label for="size">Size:</label>
                        </div>
                        <input type="checkbox" class="tags size" name="Usize[]" id="size_large" value="large" ' . (in_array('large', $size) ? 'checked' : '') . '>
                        <span class="clickable-span" data-size="large" onclick="checkCheckbox(\'size_large\')">Large</span>
                        <input type="checkbox" class="tags size" name="Usize[]" id="size_medium" value="medium" ' . (in_array('medium', $size) ? 'checked' : '') . '>
                        <span class="clickable-span" data-size="medium" onclick="checkCheckbox(\'size_medium\')">Medium</span>
                        <input type="checkbox" class="tags size" name="Usize[]" id="size_small" value="small" ' . (in_array('small', $size) ? 'checked' : '') . '>
                        <span class="clickable-span" data-size="small" onclick="checkCheckbox(\'size_small\')">Small</span>
                    </div>
                    <div class="p-container">
                        <div class="p-label">
                            <label for="flavors">Flavor:</label>
                        </div>
                        <input type="checkbox" class="tags flavor" name="Uflavor[]" id="flavor_chocolate" value="Chocolate" ' . (in_array('Chocolate', $flavor) ? 'checked' : '') . '>
                        <span class="clickable-span" data-flavor="Chocolate" onclick="checkCheckbox(\'flavor_chocolate\')">Chocolate</span>
                        <input type="checkbox" class="tags flavor" name="Uflavor[]" id="flavor_moistChocolate" value="Moist Chocolate" ' . (in_array('Moist Chocolate', $flavor) ? 'checked' : '') . '>
                        <span class="clickable-span" data-flavor="moistChocolate" onclick="checkCheckbox(\'flavor_moistChocolate\')">Moist Chocolate</span>
                        <input type="checkbox" class="tags flavor" name="Uflavor[]" id="flavor_velvet" value="Velvet" ' . (in_array('Velvet', $flavor) ? 'checked' : '') . '>
                        <span class="clickable-span" data-flavor="Velvet" onclick="checkCheckbox(\'flavor_velvet\')">Velvet</span>
                        <input type="checkbox" class="tags flavor" name="Uflavor[]" id="flavor_vanilla" value="Moist Vanilla" ' . (in_array('Moist Vanilla', $flavor) ? 'checked' : '') . '>
                        <span class="clickable-span" data-flavor="moistVanilla" onclick="checkCheckbox(\'flavor_vanilla\')">Vanilla</span>
                        <input type="checkbox" class="tags flavor" name="Uflavor[]" id="flavor_moistVanilla" value="Vanilla" ' . (in_array('Vanilla', $flavor) ? 'checked' : '') . '>
                        <span class="clickable-span" data-flavor="Vanilla" onclick="checkCheckbox(\'flavor_moistVanilla\')">Moist Vanilla</span>
                        <input type="checkbox" class="tags flavor" name="Uflavor[]" id="flavor_caramel" value="Caramel" ' . (in_array('Caramel', $flavor) ? 'checked' : '') . '>
                        <span class="clickable-span" data-flavor="Caramel" onclick="checkCheckbox(\'flavor_caramel\')">Caramel</span>
                    </div>
                </div>
                <div class="p-details">
                    <div class="p-container">
                        <div class="p-label">
                        <label for="category">Category:</label>
                        </div>
                        <select id="category" name="update_category" class="box" required>
                            <option selected>'.$row['category'].'</option>
                            <option value="muffins">Muffins</option>
                            <option value="themecupcake">Themed Cupcake</option>
                            <option value="numberlettercupcake">Number/Letter Cupcake</option>
                            <option value="cake">Cake</option>
                        </select>
                    </div>
                    <div class="p-container">
                        <div class="p-label">
                            <label for="stock">Stock:</label>
                        </div>
                        <input type="number" id="stock" placeholder="Enter in-stock" name="update_stock" value="'.$row['stock'].'" class="box" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="update-desc-text" class="col-form-label">Description:</label>
                    <textarea class="form-control" id="update-desc-text" name ="updateDesc">'.$row['description'].'</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="product_update">Update</button>
            </div>
        </form>';
    }
    echo $output;
}
?>