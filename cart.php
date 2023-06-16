<?php
    $page_title = 'Winkelwagen';
    $totalcart = 0;

    include_once 'src/includes/header.php';

    require "src/dbconnect/dbconnect.php";

    ?> <h1 class="carttitle">Winkelwagen</h1> <?php

    //user id krijgen of naar login.php sturen
    getLoggedInUserID();
    if ($_SESSION != false){
    $user_id = $_SESSION['user_id'];
    } else {
        header('location: inlog.php');
        exit();
    }

    //product_id en amount uit database halen
    $dbconnect = new dbconnection();
    $sql = "SELECT * FROM cart WHERE user_id = '$user_id'";
    $query = $dbconnect -> prepare($sql);
    $query -> execute() ;
    $recset = $query -> fetchAll(PDO::FETCH_ASSOC);

    // $product_id = $recset[0]["product_id"];
    // $product_id = $recset[0]["amount"];

    foreach($recset as $key => $value){ 
        $product_id = $value["product_id"];
        $sql = "SELECT * FROM product WHERE product_id = '$product_id'";
        $query = $dbconnect -> prepare($sql);
        $query -> execute() ;
        $products = $query -> fetchAll(PDO::FETCH_ASSOC);

        $amount = $recset[$key]["amount"];
        $price = $products[0]["product_price"];
        $totalprice = $amount * $price;
        $totalcart = $totalcart + $totalprice;
?>
    <div class="cartcontainer">
        <img class="cartimg" src="img/<?= $products[0]["product_img"]; ?>" alt="">
        <h1 class="cartamount"><?= $products[0]["product_amount"]; ?></h1>
        <h1 class="cartproduct"><?= $products[0]["product_name"]; ?></h1>
        <form class="trashcan" action="src/formhandlers/cartdel.php" method="POST">
            <button value="<?= $value["product_id"]; ?>" name="btn" class="carttrash" type="submit">
                <div class="icon-container2">
                    <i class="bi bi-trash"></i>
                    <i class="bi bi-trash-fill"></i>
                </div>
            </button>
        </form>
        <div class="amountcontainer">
            <form action="src/formhandlers/cartmin.php" method="POST">
                <button value="<?= $value["product_id"]; ?>" name="btn" class="cartmin" type="submit"><i class="bi bi-dash"></i></button>
            </form>
            <h1 class="amount"><?= $recset[$key]["amount"]; ?></h1>
            <form action="src/formhandlers/cartplus.php" method="POST">
                <button value="<?= $value["product_id"]; ?>" name="btn" class="cartplus" type="submit"><i class="bi bi-plus"></i></button>
            </form>
        </div>
        <h1 class="cartprice">€<?= $totalprice ?></h1>
    </div>
<?php } ?> 
<div class="totalcart">
    <h1>Totaal Winkelwagen</h1>
    <h1 class="totalprice">€<?= $totalcart ?></h1>
</div>
<a href="src/formhandlers/pakbon.php" class="buycart">
    <h1 class="buycarttext">Ga door naar betalen</h1>
    <div class="cartarrow icon-container2">
        <i class="bi bi-forward"></i>
        <i class="bi bi-forward-fill"></i>
    </div>
</a>
<?php  
include_once 'src/includes/footer.php';