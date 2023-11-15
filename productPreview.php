<?php 
session_start();
include('assets/dbcon.php');

if (isset($_POST['pid'])) {
    $pid = $_POST['pid'];

    // Fetch the product from the database using the provided pid
    $stmt = $conn->prepare('SELECT * FROM products WHERE pid = ?');
    $stmt->bind_param('s', $pid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        $pname = $product['name'];
        $pprice = $product['price'];
        $pimage = $product['image'];
        $pFlavor = $product['flavor'];
        $pSize = $product['size'];
        $description = $product['description'];
        $category = $product['category'];
        $image_path = 'assets/images/' . $pimage;
        $stock = $product['stock'];
    }
}
?>
<style>
.left2{
    background-image: url('<?php echo $image_path; ?>'); 
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    position: relative;
    border-radius: 10px 0 0 10px;
}
.pModal-header span{
    font-size: 25px;
    font-weight: 500;
}
.input-box{
    position: relative;
    width: 400px;
    box-sizing: border-box;
    padding-left: 0.5rem;
}
.input-box.pModal-header{
    margin: 20px;
    width: 100%;
}
#modal-content {
    span {
        font-size: 17px;
        font-weight: 500;
    }
}
.pMain {
    display: flex;
    width: 100%;
    height: 400px;
    font-size: 20px;
    position: relative;
    flex-direction: column;
    gap: 15px;
    overflow: hidden;
}
.pMain p{
    font-size: medium;
    width: 100%;
    height: 25px;
    padding: 0 1.8rem;
}
.option{
    border: 2px solid #F2BED1;
    height: 30px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    gap: 10px;
    display: inline-block;
    margin: 10px 0;
}
.option2{
    border: 2px solid #F2BED1;
    height: 30px;
    border-radius: 5px;
    cursor: pointer;
    padding-right: 5px;
    gap: 10px;
    font-size: 16px;
    display: inline-block;
}
input[type='radio'] {
    margin-left: 5px;
    padding: 10px;
    background-color: #F0F0F0;
}
.qty {
  display: inline-flex;
  align-items: center;
  gap: 10px;
}
.qty span {
  background-color: #ccc;
  color: #000;
  border: none;
  padding: 2px 8px;
  margin: 5px 0;
  cursor: pointer;
  background-color: #F2BED1;
}

.count {
  background-color: #f0f0f0;
  padding: 0 8px;
  border-radius: 5px;
  color: #F2BED1;
}
.pMain .review{
    display: flex;
    width: 100%;
    flex-direction: column;
    height: 200px;
}
.review .feedback-container {
    width: 100%;
    align-items: center;
    justify-content: center;
    overflow-y: scroll;
}
.feedback-container .user-message{
    padding: 0 0.5rem;
    border-radius: 5px;
    margin-bottom: 1rem;
    box-shadow: 0 0.2rem 0.5rem rgba(0, 0, 0, 0.5);
    border: 1px solid rgba(0, 0, 0, 0.5);
}
footer {
    width: 100%;
    height: 60px;
    display: flex;
    position: relative;
    justify-content: flex-end;
}
footer button {
    height: 40px;
    font-size: 20px;
    border-radius: 15px;
    background-color: #F2BED1;
    color: #F0F0F0;
    margin: 1rem;
    padding: 0.5rem 1.5rem;
}
footer button:hover {
    color: #F2BED1;
    background-color: #F0F0F0;
}
</style>
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container main">
                    <div class="row">
                        <div class="col-md-6 left2">
                            
                        </div>
                        <div class="col-md-6 righ2" style="background: #ffffff; border-bottom-right-radius: 10px; border-top-right-radius: 10px;">
                            <form action="" class="cartformsubmit">
                                <div class="input-box">
                                <header class="pModal-header">
                                    <span><?php echo $pname?></span>
                                    <h2 style="color: #777777;">₱ <span id="item-price"><?php echo $pprice?></span></h2>
                                    <span id="item-base-price" style="display: none;"><?php echo $pprice?></span>
                                </header>
                                <hr>
                                <input type="hidden" class="newId" value="<?php echo $pid;?>">
                                <input type="hidden" class="newName" value="<?php echo $pname;?>">
                                <input type="hidden" class="newPrice" value="<?php echo $pprice;?>">
                                <input type="hidden" class="newImage" value="<?php echo $pimage;?>">
                                <input type="hidden" class="newStock" value="<?php echo $stock;?>">
                                <input type="hidden" class="newCategory" id="newCategoryValue" value="<?php echo $category;?>">
                                <main class="pMain" style="overflow-y: scroll;">
                                    <p><?php echo $description?></p>
                                    <hr>
                                    <!-- flavors section -->
                                    <div class="Flavor">
                                        <span id="add-flavor-error" style="display: none;"><small style="color: #ff0000; font-size: 13px;">Please select your preferred flavor.</small></span>
                                        <span>Flavor: </span>
                                        <?php
                                        if (!empty($pFlavor)) {
                                            // Split the $pFlavor variable into an array based on some delimiter (e.g., comma)
                                            $flavors = explode(',', $pFlavor);
                                            // Iterate through the flavors and create checkboxes
                                            foreach ($flavors as $flavor) {
                                                $flavor = trim($flavor); // Remove leading/trailing spaces
                                                echo '
                                                <div class="option">
                                                    <input type="radio" onclick="clearFlavorError(this)" class="flavor" id="flavor_' . $flavor . '" name="flavor[]" value="'.$flavor.'">
                                                    <label for="flavor_' . $flavor . '">' . $flavor . '</label>
                                                </div>
                                                ';
                                            }
                                        }
                                        ?>
                                    </div>
                                    <!-- sizes section -->
                                    <div class="Sizes">
                                        <span id="add-size-error" style="display: none;"><small style="color: #ff0000; font-size: 13px;">Please select your preferred size.</small></span>
                                        <span>Size: </span>
                                        <?php
                                        if(!empty($pSize)){
                                            $size = explode(',', $pSize);
                                            foreach($size as $size){
                                                echo '
                                                <div class="option2">
                                                    <input type="radio" onclick="clearSizeError(`'.$size.'`)" class="size" id="size_'.$size.'" name="size[]" value = "'.$size.'">
                                                    <label for="size_'.$size.'">'.$size.'</label>
                                                </div>
                                                ';
                                            }
                                        }
                                        ?>
                                    </div>
                                    <!-- quantity section -->
                                    <div class="Quantity">
                                        <span id="add-quantity-error" style="display: none;"><small style="color: #ff0000; font-size: 11px;">Quantity can't be greater than remaining stock.</small></span>
                                        <span>Qty: </span>
                                        <div class="qty">
                                            <span class="decrement" onclick="decrementCount()"><i class='bx bx-minus'></i></span>
                                            <div class="count" style="color: #000000;">1</div>
                                            <span class="increment" onclick="incrementCount()"><i class='bx bx-plus' ></i></span>
                                            <input type="number" id="inputValue" class="quanty" name="qty" value="<?php echo $stock > 0 ? 1 : 0; ?>" hidden>
                                        </div>
                                    </div>
                                    <!-- stock section -->
                                    <div class="Quantity">
                                        <span>Stock: </span>
                                        <div class="qty">
                                            <div id="div-stock"><?php echo $stock; ?></div>
                                        </div>
                                    </div>
                                    <!-- review section -->
                                    <div class="review">
                                        <span>Review:</span>
                                        <div  style="border: 1px #777777 solid; padding: 5px; height: 200px; overflow-y: scroll;">
                                            <div class="user-message">
                                                <h4>myName</h4><h6>chcoo: vanilla</h6>
                                                <p>ihfaeihfae ihfaeihfae ihfaeihfae ihfaeihfae ihfaeihfae ihfaeihfae ihfaeihfae ihfaeihfae ihfaeihfae ihfaeihfae ihfaeihfae ihfaeihfae ihfaeihfae ihfaeihfae ihfaeihfae ihfaeihfae ihfaeihfae ihfaeihfae ihfaeihfae ihfaeihfae ihfaeihfae ihfaeihfae ihfaeihfae ihfaeihfae ihfaeihfae ihfaeihfae ihfaeihfae ihfaeihfae </p>
                                            </div>
                                        </div>                                   
                                    </div>
                                </main>
                                <hr>
                                <footer>
                                    <button type="button" name="add-to-cart" id="btn-add-to-cart" onclick="addToCart()" value="<?php echo $pid?>" class="fas fa-shopping-cart cartBtn">Add Cart</button>
                                    <button type="button" name="buy-now" id="btn-buy-now" onclick="buyNow()" value="<?php echo $pid?>" class="fas fa-cart-arrow-down cartBtn">Buy Now</button>
                                </footer>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.all.min.js" ></script>
<script>

    function decrementCount() {
        const countElement = document.querySelector(".count");
        let currentCount = parseInt(countElement.innerText, 10);
        if (currentCount > 1) {
            currentCount--;
            countElement.innerText = currentCount;
            updateInputValue(currentCount);
        }
        if (currentCount > parseFloat(document.getElementById('div-stock').textContent)) {
            document.getElementById('add-quantity-error').style.display = "block"
        }
        else {
            document.getElementById('add-quantity-error').style.display = "none"
            countElement.innerText = currentCount;
            updateInputValue(currentCount);
        }
    }

    function incrementCount() {
        const countElement = document.querySelector(".count");
        let currentCount = parseInt(countElement.innerText, 10);
        currentCount++;
        if (currentCount > parseFloat(document.getElementById('div-stock').textContent)) {
            document.getElementById('add-quantity-error').style.display = "block"
        }
        else {
            document.getElementById('add-quantity-error').style.display = "none"
            countElement.innerText = currentCount;
            updateInputValue(currentCount);
        }
    }

    function updateInputValue(count) {
        const inputValue = document.getElementById('inputValue');
        if (count < 1) {
            count = 1;
        }

        // Update the input value
        inputValue.value = count;
    }

    function addToCart() {
        var flavor = ""
        var size = ""

        if (parseInt(document.querySelector("#div-stock").textContent) <= 0){
            Swal.fire({
                icon: "warning",
                title: "Out of Stock",
                text: "Please try again once we have added stock for this item."
            })
        }
        else {
            document.querySelectorAll(".flavor").forEach(item => {
                if (item.checked) {
                    flavor = item.value
                }
            })
            
            document.querySelectorAll(".size").forEach(item => {
                if (item.checked) {
                    size = item.value
                }
            })

            if (flavor == ""){
                document.getElementById('add-flavor-error').style.display = "block"
            }
            if (size == ""){
                document.getElementById('add-size-error').style.display = "block"
            }

            if (flavor != "" && size != "") {
                $.ajax({
                    url: 'assets/insert-cart.php',
                    method: 'post',
                    data: {
                        product_id: "<?php echo $pid; ?>",
                        size: size,
                        flavor: flavor,
                        qty: document.querySelector("#inputValue").value,
                        price: document.querySelector("#item-price").textContent
                    },
                    success: function(response) {
                        console.log(response)
                        result = JSON.parse(response)
                        if (result.success) {
                            Swal.fire({
                                title: 'Item Added', 
                                text: 'You have successfully added this item in your cart', 
                                icon: 'success'
                            }).then((result) => {
                                window.location.href = "Customer.php#categories"
                            })
                        }
                        else {
                            Swal.fire('Adding Failed', 'Please try adding item in your cart again.', 'error')
                        }
                    }
                });
            }
        }
    }

    function buyNow() {
        var flavor = ""
        var size = ""

        if (parseInt(document.querySelector("#div-stock").textContent) <= 0){
            Swal.fire({
                icon: "warning",
                title: "Out of Stock",
                text: "Please try again once we have added stock for this item."
            })
        }
        else {

            document.querySelectorAll(".flavor").forEach(item => {
                if (item.checked) {
                    flavor = item.value
                }
            })
            
            document.querySelectorAll(".size").forEach(item => {
                if (item.checked) {
                    size = item.value
                }
            })

            if (flavor == ""){
                document.getElementById('add-flavor-error').style.display = "block"
            }
            if (size == ""){
                document.getElementById('add-size-error').style.display = "block"
            }

            if (flavor != "" && size != "") {
                Swal.fire({
                    title: "Loading Checkout Page",
                    text: "Please wait while we process your order...",
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    showCancelButton: false,
                    showCloseButton: false,
                    showDenyButton: false,
                })
                setTimeout(function () {
                    $.ajax({
                        url: 'assets/insert-cart.php',
                        method: 'post',
                        data: {
                            product_id: "<?php echo $pid; ?>",
                            size: size,
                            flavor: flavor,
                            qty: document.querySelector("#inputValue").value,
                            price: document.querySelector("#item-price").textContent
                        },
                        success: function(response) {
                            // console.log(response)
                            result = JSON.parse(response)
                            if (result.success) {
                                window.location.href = "assets/buy-now.php?id="+result.id
                            }
                            else {
                                Swal.fire('Adding Failed', 'Please try adding item in your cart again.', 'error')
                            }
                        }
                    });
                }, 2000)
            }
        }
    }

    function clearFlavorError(inp){
        document.getElementById('add-flavor-error').style.display = "none"
    }

    function clearSizeError(size){
        document.getElementById('add-size-error').style.display = "none"
        const sizeChecks = document.querySelectorAll(".size")
        const itemPrice = document.querySelector("#item-price")
        const itemBasePrice = document.querySelector("#item-base-price")

        var haveSmall = false
        var haveMedium = false
        var haveLarge = false

        sizeChecks.forEach(size => {
            if (size.value.trim() == "small") {
                haveSmall = true
            }
            if (size.value.trim() == "medium") {
                haveMedium = true
            }
            if (size.value.trim() == "large") {
                haveLarge = true
            }
        })

        if (sizeChecks && sizeChecks.length > 1) {
            if (size.trim() == "small") {
                itemPrice.textContent = itemBasePrice.textContent
            }
            else if (size.trim() == "medium") {
                if (haveSmall) {
                    itemPrice.textContent = parseFloat(itemBasePrice.textContent) + 250
                }
                else {
                    itemPrice.textContent = itemBasePrice.textContent
                }
            }
            else if (size.trim() == "large") {
                if ((haveSmall && haveMedium) || haveSmall) {
                    itemPrice.textContent = parseFloat(itemBasePrice.textContent) + 500
                }
                else if (haveMedium) {
                    itemPrice.textContent = parseFloat(itemBasePrice.textContent) + 250
                }
            }
        }
    }
</script>