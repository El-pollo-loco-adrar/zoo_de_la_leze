<?php
session_start();
include "./utils/function.php";
include "./model/model_animal.php";

$bdd = DBconnect();

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id_animal = intval($_GET['id']); //intval sert à intégrer uniquement un int et pas du string
    $animal = getAnimalById($bdd, $id_animal);
    if(!$animal){
        $message = "Aucun animal trouvé";
    }
}else{
    $message = "ID de l'animal manquant";
}


include "./view/header.php";
include "./view/animaux/view_animal.php";
include "./view/footer.php";