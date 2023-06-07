<?php

if($_SERVER['REQUEST_METHOD'] != 'POST') {
    die('Geen toegang');
}

// Database credentials
$dbHost = '127.0.0.1'; 
$dbName = 'gaminggoods';
$dbUser = 'root';
$dbPass = '';

// Globale variabelen voor het werken met de database
$db_connection = null;
$db_statement = null;

// Connectie maken met de database
try {
    $db_connection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
} catch(PDOException $error) {
    header('location: ../../register.php');
    exit(); // die()
}

// Connectie is geslaagd, dus nu kunnen we de gegevens vastleggen in de database
$firstname = htmlentities( $_POST['firstname'] );
$lastname = htmlentities( $_POST['lastname'] );
$prefix = htmlentities( $_POST['prefix'] );
$email = htmlentities( $_POST['email'] );
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

class dbconnection extends PDO
{
    private $host = "localhost";
    private $dbname = "gaminggoods";
    private $user = "root";
    private $pass = "";
    public function __construct()
    {
        parent::__construct("mysql:host=".$this->host.";dbname=".$this->dbname."; charset=utf8", $this->user, $this->pass);
        $this->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
}

$dbconnect = new dbconnection();

$sql = "SELECT * FROM users WHERE firstname = '$firstname' OR email = '$email'";

$query = $dbconnect -> prepare($sql);

$query -> execute() ;

$recset = $query -> fetchAll(PDO::FETCH_ASSOC);

if($recset == false) {



$sql = "INSERT INTO `users`(`firstname`, `lastname`, `prefix`, `email`, `password`)
        VALUES(:firstname, :lastname, :prefix, :email, :password)";
$placeholders = [
    ':firstname' => $firstname,
    ':lastname' => $lastname,
    ':prefix' => $prefix,
    ':email' => $email,
    ':password' => $password
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