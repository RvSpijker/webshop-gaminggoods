<?php
    $page_title = 'robux';
    $product = 'robux';

    include_once 'src/includes/header.php';

    require "dbconnect.php";
?>
<div class="robloxgrid">
<?php foreach($recset as $key => $value){ ?>
    <div class="robloxcard">
        <img class="robloxcardimg" src="img/<?= $value["product_img"]; ?>" alt="robloxcard">
        <p class="robuxamount"><?= $value["product_amount"]; ?></p>
        <img class="robuxicon" src="img/robuxicon.png" alt="robux">
        <h2 class="robloxprice">€<?= $value["product_price"]; ?></h2>
    </div>
<?php } ?>
</div>
<?php
    include_once 'src/includes/footer.php';