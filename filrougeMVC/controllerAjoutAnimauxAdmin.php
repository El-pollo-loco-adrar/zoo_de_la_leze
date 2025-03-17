<?php
session_start();


include "./utils/function.php";
include "./model/model_admin.php";

$bdd = DBconnect();
$bdd->exec("SET NAMES 'utf8mb4'");
$message= "";
//!Ajout d'un animal

if(isset($_POST["animalSubmit"])){

    //!Vérifier les champs vides
    if(isset($_POST["nom"]) && !empty($_POST["nom"]) &&
    isset($_POST['espece']) && !empty($_POST['espece']) &&
    isset($_POST['description']) && !empty($_POST['description']) &&
    isset($_POST['age']) && !empty($_POST['age']) &&
    isset($_FILES['image'])){

        //!Nettoyer les données
        $nom = sanitize($_POST['nom'] );
        $espece = sanitize($_POST['espece'] );
        $description = sanitize($_POST['description']);
        $age = sanitize($_POST['age']);
        $image_url = "";

        $uploadDir = "uploads/"; //Chemin du dossier qui enregistre les photos
        $uploadFile = $uploadDir . basename( $_FILES["image"]["name"] );//Récupère le nom du fichier
        $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));//strtolower: transforme extension en minuscule | PATHINFO: récupère l'extension
        $allowedTypes =  ['jpg', 'jpeg', 'png', 'gif'];

        if(in_array($imageFileType, $allowedTypes)){
            if(move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)){
                $image_url = $uploadFile;
            }else{
                $message = "Erreur lors du chargement de l'image";
                return;
            }
        }else{
            $message = "Format de l'image non valide";
        }

        $bdd = DBconnect();
        $message = addAnimal($bdd,$nom, $espece, $description, $age, $image_url);

    }else{
        $message= 'Veuillez remplir les champs';
    }
}

//!Supprimer un animal
if(isset($_POST['deleteAnimal'])){
    if(isset($_POST['id_animal']) && !empty($_POST['id_animal'])){
        $animal_id = $_POST['id_animal'];
        $bdd;
        $message = deleteAnimal($bdd, $animal_id);
    }else{
        $message = "Erreur: l'ID est manquant";
    }
}

include "./view/admin/headerAdmin.php";
include "./view/admin/view_ajoutAnimaux.php";
include "./view/footer.php";
