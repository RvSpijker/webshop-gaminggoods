<?php
    $page_title = 'cart';

    include_once 'src/includes/header.php';

    require "src/dbconnect/dbconnect.php";

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

    foreach($recset as $key => $value){
        $product_id = $value["product_id"];

        $sql = "SELECT * FROM product WHERE product_id = '$product_id'";

        $query = $dbconnect -> prepare($sql);

        $query -> execute() ;

        $products = $query -> fetchAll(PDO::FETCH_ASSOC);
    }
?>
<h1 class="servicetitle">Winkelwagen</h1>

<div class="cartcontainer">
    <img class="cartimg" src="img/<?= $value["product_amount"]; ?>" alt="">
    <h1 class="cartamount"><?= $value["product_amount"]; ?></h1>
    <h1 class="cartproduct"><?= $value["product_amount"]; ?></h1>
    <div class="carttrash icon-container2">
        <i class="bi bi-trash"></i>
        <i class="bi bi-trash-fill"></i>
    </div>
    <div class="amountcontainer">
        <i class="cartmin bi bi-dash"></i>
        <h1 class="amount">99</h1>
        <i class="cartplus bi bi-plus"></i>
    </div>
    <h1 class="cartprice"><?= $value["product_amount"]; ?></h1>
</div>

<?php
    include_once 'src/includes/footer.php';