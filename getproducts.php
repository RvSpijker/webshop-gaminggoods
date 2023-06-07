<?php
//maak een nieuwe connectie aan in de variabele $dbconnect
$dbconnect = new dbconnection();

$sql = "SELECT * FROM product WHERE product_name = '$product' ORDER BY product_amount ASC";

$query = $dbconnect -> prepare($sql);

$query -> execute() ;

$recset = $query -> fetchAll(PDO::FETCH_ASSOC);