<?php
    $page_title = 'inlog';

    include_once 'src/helpers/auth-helpers.php';
    include_once 'src/includes/header.php';
?>
        <form class="inlogform" action="src/formhandlers/login.php" method="POST">
            <h1>Inloggen</h1>
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" />
            </div>
            <div>
                <label for="wachtwoord">Wachtwoord</label>
                <input type="password" id="wachtwoord" name="password" />
            </div>
            <button type="submit">Inloggen</button>
        </form>
<a class="registerlink" href="register.php"><h3>dont have an acount? <span>register</span></h3></a>
<?php
    include_once 'src/includes/footer.php';