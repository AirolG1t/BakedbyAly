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
        $image_path = 'assets/images/' . $pimage;
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
span {
    font-size: 17px;
    font-weight: 500;
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
                        <div class="col-md-6 righ2">
                            <form action="" class="cartformsubmit">
                                <div class="input-box">
                                <header class="pModal-header">
                                    <span><?php echo $pname?></span>
                                </header>
                                <hr>
                                <input type="hidden" class="newId" value="<?php echo $pid?>">
                                <input type="hidden" class="newName" value="<?php echo $pname?>">
                                <input type="hidden" class="newPrice" value="<?php echo $pprice?>">
                                <input type="hidden" class="newImage" value="<?php echo $pimage?>">
                                <main class="pMain">
                                    <p><?php echo $description?></p>
                                    <hr>
                                    <div class="Flavor">
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
                                                <input type="radio" class="flavor" id="flavor_' . $flavor . '" name="flavor[]" value="' . $flavor . '">
                                                <label for="flavor_' . $flavor . '">' . $flavor . '</label>
                                            </div>
                                            ';
                                        }
                                    }
                                    ?>
                                    <br>
                                    <span>Size: </span>
                                    <?php
                                    if(!empty($pSize)){
                                        $size = explode(',', $pSize);
                                        foreach($size as $size){
                                            echo '
                                            <div class="option2">
                                                <input type="radio" class="size" id="size_'.$size.'" name="size[]" value='.$size.'>
                                                <label for="size_'.$size.'">'.$size.'</label>
                                            </div>
                                            ';
                                        }
                                    }
                                    ?>
                                    <br>
                                    <span>Qty: </span>
                                    <div class="qty">
                                        <span class="decrement" onclick="decrementCount()"><i class='bx bx-minus'></i></span>
                                        <div class="count">1</div>
                                        <span class="increment" onclick="incrementCount()"><i class='bx bx-plus' ></i></span>
                                        <input type="number" id="inputValue" class="quanty" name="qty" hidden>
                                    </div>
                                </div>
                                    <div class="review">
                                        <span>Review</span>
                                        <hr>
                                        <div class="feedback-container">
                                            <div class="user-message">
                                                <h4>myName</h4><h6>chcoo: vanilla</h6>
                                                <p>ihfaeihfae</p>
                                            </div>
                                        </div>                                   
                                    </div>
                                </main>
                                <hr>
                                <footer>
                                    <button type="submit" class="fas fa-shopping-cart cartBtn">Add Cart</button>
                                    <button class="fas fa-heart">Favorite</button>
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
<script>
    let priceIncrement = 0;

    function decrementCount() {
        const countElement = document.querySelector(".count");
        let currentCount = parseInt(countElement.innerText, 10);
        if (currentCount > 1) {
            currentCount--;
            countElement.innerText = currentCount;
            updateInputValue(currentCount);
        }
    }

    function incrementCount() {
        const countElement = document.querySelector(".count");
        let currentCount = parseInt(countElement.innerText, 10);
        currentCount++;
        countElement.innerText = currentCount;
        updateInputValue(currentCount);
    }

    function updateInputValue(count) {
        const inputValue = document.getElementById('inputValue');

        // Ensure the count is within your desired range, for example, a minimum value of 1
        if (count < 1) {
            count = 1;
        }

        // Update the input value
        inputValue.value = count;
    }

    $(".cartBtn").click(function (e) {
    e.preventDefault();
    var $form = $(this).closest(".cartformsubmit");
    var pid = $form.find(".newId").val();
    var pname = $form.find(".newName").val();
    var pimage = $form.find(".newImage").val();
    var pqty = $form.find(".quanty").val(); // Corrected to get the quantity
    var priceSpan = $form.find('.newPrice').val(); // Corrected to get the updated price

    $.ajax({
        url: 'assets/action.php',
        method: 'post',
        data: {
            newId: pid,
            pname: pname,
            pprice: priceSpan, // Use the updated price
            pqty: pqty, // Use the corrected quantity
            pimage: pimage,
        },
        success: function (response) {
            $("#message").html(response);
            
        }
    });
});
</script>