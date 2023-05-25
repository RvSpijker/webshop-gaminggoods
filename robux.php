<?php
    $page_title = 'robux';

    include_once 'includes/header.php';

    //maak de connectie beschikbaar in dit bestand
    require "dbconnect.php";
    //maak een nieuwe connectie aan in de variabele $dbconnect
    $dbconnect = new dbconnection();

    //op de volgende regel bouw je een sql-query (leren we in module 10); als je alle producten uit de tabel met de naam ‘product’ wilt trekken heb je de volgende query nodig
    $sql = "SELECT * FROM product";

    //hier zet je de query klaar, ‘prepare()’ is een functie binnen PDO die je kunt gebruiken bij de variabele $dbconnect
    $query = $dbconnect -> prepare($sql);

    //hier voer je de database bevraging uit, ‘execute()’ is een functie binnen PDO die je los kunt laten op de variabele $query
    $query -> execute() ;

    //hier sla je alle records die je uit de database opgevraagd hebt, op in de array $recset ('recset' is een afkorting voor records-set - een andere naam mag ook);
    //‘fetchAll()’ is een functie binnen PDO en betekent letterlijk: trek (fetch) alles (all) uit de database op basis van de query;
    //$recset is een array met gevonden records uit de database
    $recset = $query -> fetchAll(PDO::FETCH_ASSOC);

    $price = $recset[0]["product_price"];
    $amount = $recset[0]["product_amount"];
?>
<div class="robloxgrid">
    <div class="robloxcard">
        <img class="robloxcardimg" src="img/robloxcard.png" alt="robloxcard">
        <p class="robuxamount"><?= $recset[0]["product_amount"]; ?></p>
        <img class="robuxicon" src="img/robuxicon.png" alt="robux">
        <h2 class="robloxprice">€<?= $recset[0]["product_price"]; ?></h2>
    </div>
    <div class="robloxcard">
        <img class="robloxcardimg" src="img/robloxcard.png" alt="robloxcard">
        <p class="robuxamount">800</p>
        <img class="robuxicon" src="img/robuxicon.png" alt="robux">
        <h2 class="robloxprice">€11.99</h2>
    </div>
    <div class="robloxcard">
        <img class="robloxcardimg" src="img/robloxcard.png" alt="robloxcard">
        <p class="robuxamount">1700</p>
        <img class="robuxicon" src="img/robuxicon.png" alt="robux">
        <h2 class="robloxprice">€23.99</h2>
    </div>
    <div class="robloxcard">
        <img class="robloxcardimg" src="img/robloxcard.png" alt="robloxcard">
        <p class="robuxamount">4500</p>
        <img class="robuxicon" src="img/robuxicon.png" alt="robux">
        <h2 class="robloxprice">€59.99</h2>
    </div>
    <div class="robloxcard">
        <img class="robloxcardimg" src="img/robloxcard.png" alt="robloxcard">
        <p class="robuxamount">10000</p>
        <img class="robuxicon" src="img/robuxicon.png" alt="robux">
        <h2 class="robloxprice">€119.99</h2>
    </div>
    <div class="robloxcard">
        <img class="robloxcardimg" src="img/robloxcard.png" alt="robloxcard">
        <p class="robuxamount">22500</p>
        <img class="robuxicon" src="img/robuxicon.png" alt="robux">
        <h2 class="robloxprice">€239.99</h2>
    </div>
</div>
<?php
    include_once 'includes/footer.php';