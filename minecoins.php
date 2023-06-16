<?php
    $page_title = 'Minecoins';
    $product = 'minecoins';

    include_once 'src/includes/header.php';

    require "src/dbconnect/dbconnect.php";
    require "getproducts.php"
?>
<div class="minecoins-container">
<?php foreach($recset as $key => $value){ ?>
    <div class="minecoinscard">
        <img class="minecoins" src="img/<?= $value["product_img"]; ?>" alt="Minecoins">
        <h2 id="minecoinsprice" class="white">€<?= $value["product_price"]; ?></h2>
        <form action="src/formhandlers/addtocart.php" method="POST">
        <button value="<?= $value["product_id"]; ?>" name="btn" class="buy buyminecoins" type="submit">Buy<i class="bi bi-cart-plus-fill"></i></button>
        </form>
    </div>
<?php } ?>
</div>
<?php
    include_once 'src/includes/footer.php';