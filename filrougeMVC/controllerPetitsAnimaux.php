<?php
session_start();
include "./utils/function.php";
include "./model/model_animal.php";

$bdd = DBconnect();
$animaux = getAnimal($bdd);

include "./view/header.php";
include "./view/animaux/view_petitsAnimaux.php";
include "./view/footer.php";