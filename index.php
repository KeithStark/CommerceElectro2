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

echo " <br> <br>";

// var_dump($livre1);
// $livres = $livre1->getLivres();
// echo " <br> <br>";

// print_r($livres);
// echo " <br> <br>";

// var_dump($livres);
// var_dump($livres[0]);
// echo "<br> <br>";

// $livre = $livre1->getLivreById(3);
// var_dump($livre);

// $livre_to_insert = [
//     'titre' => "Titre de mon livre",
//     'auteur' => "Shaheel",
//     'annee' => 2023,
//     'edition' => "Gryffondor"
// ];

// echo " <br> <br>";
// $livre_added = $livre1->ajouterLivre($livre_to_insert);
// var_dump($livre1->getLivres());


$livre1 = new Livre;
$livre = $livre1->getLivreById(1); // Obtenir le livre avec l'identifiant 1


$livre['titre'] = "Tokyo";
$livre['annee'] = 2012;
$livre['auteur'] = "Marcelo";

$livre1->UpdateLivreById(1, $livre);

// Obtenir le livre avec l'identifiant 1 après la mise à jour
var_dump($livre1->getLivreById(1));

echo "<br> <br>";

$livre1->deleteLivre(2);
