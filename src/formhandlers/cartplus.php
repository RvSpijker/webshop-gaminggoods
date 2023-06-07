<?php
session_start();

include_once '../helpers/auth-helpers.php';
include_once '../dbconnect/dbconnect.php';

//data base connectie
$dbHost = '127.0.0.1'; 
$dbName = 'gaminggoods';
$dbUser = 'root';
$dbPass = '';

$db_connection = null;
$db_statement = null;

try {
    $db_connection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
} catch(PDOException $error) {
    header('location: ../../register.php');
    exit();
}
//

//user id krijgen of naar login.php sturen
getLoggedInUserID();
if ($_SESSION != false){
$user_id = $_SESSION['user_id'];
} else {
    header('location: ../../inlog.php');
    exit();
}

//product id krijgen
$product_id = $_POST["btn"];

//amount krijgen
$dbconnect = new dbconnection();
$sql = "SELECT * FROM cart WHERE user_id = '$user_id' AND product_id = '$product_id'";
$query = $dbconnect -> prepare($sql);
$query -> execute() ;
$recset = $query -> fetchAll(PDO::FETCH_ASSOC);

if ($recset == false) {
    $amount = 1;
} else {
    $amount = $recset[0]['amount'];
    $amount++;
}

echo $user_id;
echo '<br>';
echo $product_id;
echo '<br>';
echo $amount;

//aantal verhogen

$sql = "UPDATE cart SET amount='$amount' WHERE user_id = '$user_id' AND product_id = '$product_id'";
$query = $dbconnect -> prepare($sql);
$query -> execute();

echo 
'<script>
history.back()
</script>';