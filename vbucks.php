<?php
    $page_title = 'vbucks';
    $product = 'vbucks';

    include_once 'src/includes/header.php';

    require "src/dbconnect/dbconnect.php";
    require "getproducts.php"
?>
<div class="vbucksgrid">
<?php foreach($recset as $key => $value){ ?>
    <div class="vbuckscard">
        <img class="vbucksimg" src="img/<?= $value["product_img"]; ?>" alt="vbucks">
        <h2><?= $value["product_amount"]; ?><br>V-BUCKS</h2>
        <h2 class="vbucksprice">€<?= $value["product_price"]; ?></h2>
        <form action="src/formhandlers/addtocart.php" method="POST">
        <button value="<?= $value["product_id"]; ?>" name="btn" class="buy buyvbucks" type="submit">Buy<i class="bi bi-cart-plus-fill"></i></button>
        </form>
    </div>
<?php } ?>
</div>
<?php
    include_once 'src/includes/footer.php';