<?php
session_start();

require "../dbconnect/dbconnect.php";
require '../helpers/auth-helpers.php';

$totalcart = 0;

//user id krijgen of naar login.php sturen
getLoggedInUserID();
if ($_SESSION != false){
    $user_id = $_SESSION['user_id'];
} else {
    header('location: ../../inlog.php');
    die();
}

$dbconnect = new dbconnection();
$sql = "SELECT * FROM users WHERE id = '$user_id'";
$query = $dbconnect -> prepare($sql);
$query -> execute() ;
$recset = $query -> fetchAll(PDO::FETCH_ASSOC);

$user = $recset[0];
$firstname = $user['firstname'];
$prefix = $user['prefix'];
$lastname = $user['lastname'];
$street = $user['street'];
$postalcode = $user['postalcode'];
$country = $user['country'];

if ($prefix == null) {
    $fullname = $firstname . ' ' . $lastname;
} else {
    $fullname = $firstname . ' ' . $prefix . ' ' . $lastname;
}

//product_id en amount uit database halen
$dbconnect = new dbconnection();
$sql = "SELECT * FROM cart WHERE user_id = '$user_id'";
$query = $dbconnect -> prepare($sql);
$query -> execute() ;
$recset = $query -> fetchAll(PDO::FETCH_ASSOC);

// $product_id = $recset[0]["product_id"];

// Generate PDF with images and text \\
require('../../FPDF/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->Ln(0);

$pdf->SetFont('Arial','B',20);

$pdf->Cell(25,10,'Pakbon',0,1,'C');
$pdf->Ln(10);


$pdf->SetFont('Arial','',12);

$pdf->Cell(50,5,$fullname);
$pdf->Cell(80);
$pdf->Cell(50,5,'GamingGoods');
$pdf->Ln(5);

$pdf->Cell(50,5,$street);
$pdf->Cell(80);
$pdf->Cell(50,5,'robinvanspijker@gmail.com');
$pdf->Ln(5);
$pdf->Cell(50,5,$postalcode);
$pdf->Cell(80);
$pdf->Cell(50,5,'1234 AC    Amsterdam');
$pdf->Ln(5);

$pdf->Cell(50,5,$country);
$pdf->Ln(20);

$pdf->Cell(50,5,date("d-m-20y"));
$pdf->Ln(1);

$pdf->Cell(50,5,'________________________________________________________________');

foreach($recset as $key => $value){ 
    $product_id = $value["product_id"];
    $sql = "SELECT * FROM product WHERE product_id = '$product_id'";
    $query = $dbconnect -> prepare($sql);
    $query -> execute() ;
    $products = $query -> fetchAll(PDO::FETCH_ASSOC);

    $productname = $products[0]["product_name"];
    $productamount = $products[0]["product_amount"];
    $amount = $recset[$key]["amount"];
    $price = $products[0]["product_price"];
    $totalprice = $amount * $price;
    $totalcart = $totalcart + $totalprice;
    $product_list = $amount . 'pc - ' . $productamount . ' ' . $productname . ' - $' . $totalprice;

    $pdf->Ln(9);
    $pdf->Cell(10);
    $pdf->Cell(50,5,$product_list);
    $pdf->Ln(5);
    $pdf->Cell(50,5,'________________________________________________________________');
}

$pdf->Output();

// $sql = "DELETE FROM cart WHERE user_id = '$user_id'";
// $query = $dbconnect -> prepare($sql);
// $query -> execute();