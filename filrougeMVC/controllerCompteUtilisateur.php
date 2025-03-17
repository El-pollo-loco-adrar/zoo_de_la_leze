<?php
session_start();



if (!isset($_SESSION["id_user"])) {
    header("Location: index.php");
    exit();
}
include "./view/jeu/header_compteConnecte.php";
include "./view/jeu/view_compteUtilisateur.php";
include "./view/footer.php";