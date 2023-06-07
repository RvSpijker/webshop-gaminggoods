<?php
    $page_title = 'register';

    include_once 'src/helpers/auth-helpers.php';
    include_once 'src/includes/header.php';
?>
<h1 id="namecheck" style="display: none;">Naam/email al in gebruik</h1>
<script>
if(localStorage.namecheck == 1){
    document.getElementById("namecheck").style.display = "block";
    localStorage.namecheck = 0;
}
</script>
<form class="inlogform" action="src/formhandlers/register.php" method="POST">
    <h1 class="formtitle">Registeren</h1>
    <div>
        <label for="voornaam">Voornaam</label><br>
        <input class="input" type="text" id="voornaam" name="firstname" placeholder="Voornaam"/>
    </div>
    <div>
        <label for="achternaam">Achternaam</label><br>
        <input class="input" type="text" id="achternaam" name="lastname" placeholder="Achternaam"/>
    </div>
    <div>
        <label for="tussenvoegsels">Tussenvoegsels</label><br>
        <input class="input" type="text" id="tussenvoegsels" name="prefix" placeholder="Tussenvoegsels(optional)"/>
    </div>
    <div>
        <label for="email">Email</label><br>
        <input class="input" type="email" id="email" name="email" placeholder="example@example.com"/>
    </div>
    <div>
        <label for="wachtwoord">Wachtwoord</label><br>
        <input class="input" type="password" id="wachtwoord" name="password" placeholder="wachtwoord"/>
    </div>
    <button class="formbutton" type="submit">Registreren</button>
</form>
<?php
    include_once 'src/includes/footer.php';