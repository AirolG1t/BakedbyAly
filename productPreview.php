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
.input-box{
    position: relative;
    width: 400px;
    box-sizing: border-box;
    overflow: hidden;
}
.input-box .icons{
    position: absolute;
    top: -125%;
    left: 0;
    height: 3rem;
    width: 100%;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(243, 243, 243, 0.8);
    gap: 1rem;
}
.input-box.pModal-header{
    margin: 20px;
    width: 100%;
}
span {
    font-size: 25px;
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
    font-size: large;
    width: 100%;
    height: 25px;
    padding: 0 1.8rem;
}
.pMain .review{
    display: flex;
    width: 100%;
    flex-direction: column;
    height: 400px;
}
.review .feedback-container {
    width: 100%;
    align-items: center;
    justify-content: center;
    overflow-y: scroll;
}
.feedback-container .user-message{
    width: 100%;
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
                            <div class="input-box">
                            <div class="icons">
                                <h1>hello</h1>
                            </div>
                            <header class="pModal-header">
                                <span><?php echo $pname?></span>
                            </header>
                            <hr>
                            <main class="pMain">
                                <p><?php echo $description?></p>
                                <div class="review">
                                    <span>Review</span>
                                    <hr>
                                    <div class="feedback-container">
                                        <div class="user-message">
                                            <h3>myName</h3>
                                            <p>ihfaeihfae</p>
                                            <h6>chcoo: vanilla</h6>
                                        </div>
                                        <div class="user-message">
                                            <h3>myName</h3>
                                            <p>ihfaeihfae</p>
                                            <h6>chcoo: vanilla</h6>
                                        </div>
                                        <div class="user-message">
                                            <h3>myName</h3>
                                            <p>ihfaeihfae</p>
                                            <h6>chcoo: vanilla</h6>
                                        </div>
                                        <div class="user-message">
                                            <h3>myName</h3>
                                            <p>ihfaeihfae</p>
                                            <h6>chcoo: vanilla</h6>
                                        </div>
                                    </div>
                                    
                                </div>
                            </main>
                            <hr>
                            <footer>
                                <button type="submit" class="fas fa-shopping-cart cart">Add Cart</button>
                                <button class="fas fa-heart">Favorite</button>
                            </footer>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>