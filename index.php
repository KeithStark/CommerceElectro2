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

$olivre = new Livre;
echo " <br> <br>";

var_dump($olivre);
$livres = $olivre->getLivres();
echo " <br> <br>";

print_r($livres);
echo " <br> <br>";

var_dump($livres);
var_dump($livres[0]);
echo "<br> <br>";

$livre = $olivre->getLivreById(3);
var_dump($livre);

$livre_to_insert = [
    'titre' => "Titre de mon livre",
    'auteur' => "Shaheel",
    'annee' => 2023,
    'edition' => "Gryffondor"
];

echo " <br> <br>";
$livre_added = $olivre->ajouterLivre($livre_to_insert);
var_dump($olivre->getLivres());
