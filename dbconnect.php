<?php

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

//maak een nieuwe connectie aan in de variabele $dbconnect
$dbconnect = new dbconnection();

$sql = "SELECT * FROM product WHERE product_name = '$product' ORDER BY product_amount ASC";

$query = $dbconnect -> prepare($sql);

$query -> execute() ;

$recset = $query -> fetchAll(PDO::FETCH_ASSOC);