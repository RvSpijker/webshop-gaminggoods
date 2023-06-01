<?php
    $page_title = 'index';

    include_once 'src/includes/header.php';

    getLoggedInUserID();
    if ($_SESSION != false){
    echo $_SESSION['fullname'];
    }
?>
<div class="grid">
    <a href="robux.php">
        <div class="card">
            <img id="homeimg" src="img/roblox.png" alt="Roblox">
            <h2 class="center">Roblox</h2>
        </div>
    </a>
    <a href="minecoins.php">
        <div class="card">
            <img id="homeimg" src="img/minecraft.png" alt="Minecraft">
            <h2 class="center">Minecraft</h2>
        </div>
    </a>
    <a href="vbucks.php">
        <div class="card">
            <img id="homeimg" src="img/fortnite.png" alt="Fortnite">
            <h2 class="center">Fortnite</h2>
        </div>
    </a>
</div>
<?php
    include_once 'src/includes/footer.php';