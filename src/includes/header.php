<?php 
    session_start();

    include_once 'src/helpers/auth-helpers.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GamingGoods | <?php echo($page_title)?></title>

    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/tablet.css"> -->
    <!-- <link rel="stylesheet" href="css/phone.css"> -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <header>
        <a href="cart.php">
            <div id="icons" class="icon-container">
                <i class="bi bi-cart"></i>
                <i class="bi bi-cart-fill"></i>
            </div>
        </a>
        <a href="verlanglijst.php">
            <div id="headericons">
                <div id="headericon" class="icon-container">
                    <i class="bi bi-heart"></i>
                    <i class="bi bi-heart-fill"></i>
                </div>
            </div>
        </a>
        <?php if ($_SESSION == true){ ?>
            <a href="src/formhandlers/logout.php">
                <h1 class="inlog">Uitloggen</h1>
            </a>
        <?php } else { ?>
            <a href="inlog.php">
                <h1 class="inlog">Inloggen</h1>
            </a>
        <?php } ?>
            <picture>
                <source srcset="img/gaminggoodsase.png" media="(max-width: 950px)">
                <a href="index.php"><img id="logo" src="img/logoafbeedling.png" alt="logo"></a>
            </picture>
        <a id="anker" href="index.php"><img id="gaminggoods" src="img/gaminggoods.png" alt="Logo"></a>
    </header>
    <nav>
        <a href="vbucks.php"><div id="navsquare" <?php if($page_title == "vbucks"){print "class='bluenav'";}?>>V-Bucks</div></a>
        <a href="robux.php"><div id="navsquare" <?php if($page_title == "robux"){print "class='bluenav'";}?>>Robux</div></a>
        <a href="minecoins.php"><div id="navsquare" <?php if($page_title == "minecoins"){print "class='bluenav'";}?>>Minecoins</div></a>
    </nav>
    <main>