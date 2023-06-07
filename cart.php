<?php
    $page_title = 'cart';

    include_once 'src/includes/header.php';

    require "src/dbconnect/dbconnect.php";

    ?> <h1 class="servicetitle">Winkelwagen</h1> <?php

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
        $totalprice = $amount * $price
?>
    <div class="cartcontainer">
        <img class="cartimg" src="img/<?= $products[0]["product_img"]; ?>" alt="">
        <h1 class="cartamount"><?= $products[0]["product_amount"]; ?></h1>
        <h1 class="cartproduct"><?= $products[0]["product_name"]; ?></h1>
        <div class="carttrash icon-container2">
            <i class="bi bi-trash"></i>
            <i class="bi bi-trash-fill"></i>
        </div>
        <div class="amountcontainer">
            <i class="cartmin bi bi-dash"></i>
            <h1 class="amount"><?= $recset[$key]["amount"]; ?></h1>
            <i class="cartplus bi bi-plus"></i>
        </div>
        <h1 class="cartprice">€<?= $totalprice ?></h1>
    </div>

<?php }

    include_once 'src/includes/footer.php';