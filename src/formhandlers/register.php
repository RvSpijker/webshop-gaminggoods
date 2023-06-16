<?php

if($_SERVER['REQUEST_METHOD'] != 'POST') {
    die('Geen toegang');
}

// Database credentials
require '../dbconnect/dbcredentials.php';

// Connectie is geslaagd, dus nu kunnen we de gegevens vastleggen in de database
$firstname = htmlentities( $_POST['firstname'] );
$lastname = htmlentities( $_POST['lastname'] );
$prefix = htmlentities( $_POST['prefix'] );
$email = htmlentities( $_POST['email'] );
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$street = htmlentities( $_POST['street']);
$postalcode = htmlentities( $_POST['postalcode']);
$country = htmlentities( $_POST['country']);

require '../dbconnect/dbconnect.php';

$dbconnect = new dbconnection();

$sql = "SELECT * FROM users WHERE firstname = '$firstname' OR email = '$email'";

$query = $dbconnect -> prepare($sql);

$query -> execute() ;

$recset = $query -> fetchAll(PDO::FETCH_ASSOC);

if($recset == false) {

$sql = "INSERT INTO `users`(`firstname`, `lastname`, `prefix`, `email`, `password`, `street`, `postalcode`, `country`)
        VALUES(:firstname, :lastname, :prefix, :email, :password, :street, :postalcode, :country)";
$placeholders = [
    ':firstname' => $firstname,
    ':lastname' => $lastname,
    ':prefix' => $prefix,
    ':email' => $email,
    ':password' => $password,
    ':street' => $street,
    ':postalcode' => $postalcode,
    ':country' => $country,
];

$db_statement = $db_connection->prepare($sql);
$db_statement->execute($placeholders);

// Na het succesvol vastleggen in de database laten we de gebruiker
// terugkeren naar het login scherm
header('location: ../../inlog.php');
exit();
} else {
    echo 
    '<script> 
        localStorage.namecheck = 1;
        window.location.href = "../../register.php";
    </script>';
}