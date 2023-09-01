<?php
require_once "./Personne.php";

$peter = new Personne();

$peter->setName("Peter c'est une personne");

echo $peter->getName();

?>
