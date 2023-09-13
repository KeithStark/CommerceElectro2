<?php

$host = "localhost";
$db = "31b";
$user = "root";
$password = "";

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

try {
    $oPDO = new PDO($dsn, $user, $password);

    if ($oPDO) {
        echo "Connected to the $db database successfully!";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

require_once "./class/Livre.php";

$livre = new Livre;
echo " <br> <br>";

var_dump($livre);
$livres = $livre->getLivres();
echo " <br> <br>";

print_r($livres);
echo " <br> <br>";

var_dump($livres);
var_dump($livres[0]);
