<?php
    $page_title = 'Robux';
    $product = 'robux';

    include_once 'src/includes/header.php';

    require "src/dbconnect/dbconnect.php";
    require "getproducts.php"
?>
<div class="robloxgrid">
<?php foreach($recset as $key => $value){ ?>
    <div class="robloxcard">
        <img class="robloxcardimg" src="img/<?= $value["product_img"]; ?>" alt="robloxcard">
        <p class="robuxamount"><?= $value["product_amount"]; ?></p>
        <img class="robuxicon" src="img/robuxicon.png" alt="robux">
        <h2 class="robloxprice">€<?= $value["product_price"]; ?></h2>
        <form action="src/formhandlers/addtocart.php" method="POST">
            <button value="<?= $value["product_id"]; ?>" name="btn" class="buy buyrobux" type="submit">buy<i class="bi bi-cart-plus-fill"></i></button>
        </form>
    </div>
<?php } ?>
</div>
<?php
    include_once 'src/includes/footer.php';