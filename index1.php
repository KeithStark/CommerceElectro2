<?php
require_once "./class/Person.php";
require_once "./class/Student.php";

// $peter = new Person("Peter");

// $peter->setName("Peter");
// echo $peter->getName();

//ESSAYEZ D'ACCEDER A UNE PROPRIETE PRIVATE D'UNE CLASSE
// echo $peter->address;
// $peter->address = "mon address est";

echo "<br>";
$ines = new Student("Je suis Ines");

echo $ines->getName();

echo "<br>";

echo $ines->setStudentID(1);
echo $ines->getStudentID();

echo "<br> <br>";

require_once "./class/Shape.php";

$circle = new Circle(2);
echo "Area Circle: " . $circle->calcArea();

echo "<br>";

$rectangle = new Rectangle(10, 15);
echo "Area Rectangle: " . $rectangle->calcArea();

echo "<br>";

echo $ines->addCourse('English');
