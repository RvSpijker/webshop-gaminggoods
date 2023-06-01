<?php
    $page_title = 'minecoins';
    $product = 'minecoins';

    include_once 'src/includes/header.php';

    require "dbconnect.php";
?>
<div class="minecoins-container">
<?php foreach($recset as $key => $value){ ?>
    <div class="minecoinscard">
        <img class="minecoins" src="img/<?= $value["product_img"]; ?>" alt="Minecoins">
        <h2 id="minecoinsprice" class="white">€<?= $value["product_price"]; ?></h2>
    </div>
<?php } ?>
</div>
<?php
    include_once 'src/includes/footer.php';