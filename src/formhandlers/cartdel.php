<?php
session_start();

include_once '../helpers/auth-helpers.php';
include_once '../dbconnect/dbconnect.php';

//data base connectie
require '../dbconnect/dbcredentials.php';

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

//aantal verwijderen
    $sql = "DELETE FROM cart WHERE user_id = '$user_id' AND product_id = '$product_id'";
    $query = $dbconnect -> prepare($sql);
    $query -> execute();

echo 
'<script>
history.back()
</script>';