<?php
    $page_title = 'register';

    include_once 'src/helpers/auth-helpers.php';
    include_once 'src/includes/header.php';
?>
        <form class="inlogform" action="src/formhandlers/register.php" method="POST">
            <h1>Registeren</h1>
            <div>
                <label for="voornaam">Voornaam</label>
                <input type="text" id="voornaam" name="firstname" />
            </div>
            <div>
                <label for="achternaam">Achternaam</label>
                <input type="text" id="achternaam" name="lastname" />
            </div>
            <div>
                <label for="tussenvoegsels">Tussenvoegsels</label>
                <input type="text" id="tussenvoegsels" name="prefix" />
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" />
            </div>
            <div>
                <label for="wachtwoord">Wachtwoord</label>
                <input type="password" id="wachtwoord" name="password" />
            </div>
            <button type="submit">Registreren</button>
        </form>
<?php
    include_once 'src/includes/footer.php';