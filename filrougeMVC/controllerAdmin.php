<?php
session_start();


include "./utils/function.php";
include "./model/model_admin.php";

$bdd = DBconnect();
$message ="";
$messageSupp ="";
$messageListe = "";

//!Affiche la liste des utilisateurs
if(isset($_GET['action']) && $_GET['action'] === 'utilisateurs'){
    $message = readUsers($bdd);
}

//!Supprimer un utilisateur
if(isset($_POST['deleteUser'])){
    if(isset($_POST['id_user']) && !empty($_POST['id_user'])){
        $user_id = $_POST['id_user'];
        $bdd;
        $messageSupp = deleteUser($bdd, $user_id);
    }else{
        $messageSupp = "Erreur: l'ID de l'utilisateur est manquant";
    }
}

//!Affiche la liste des animaux
if(isset($_GET['action']) && $_GET['action'] === 'animal'){
    $messageListe = readAnimal($bdd);
}



include "./view/admin/headerAdmin.php";
include "./view/admin/view_admin.php";
include "./view/footer.php";