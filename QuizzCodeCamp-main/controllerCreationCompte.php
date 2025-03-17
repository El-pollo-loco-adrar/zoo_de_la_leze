<link rel="stylesheet" href="./source/css/creationCompte.css">
<?php
include "./utils/functions.php";
include "./model/model_user.php";

$message = "";


if(isset($_POST["inscriptionButton"])){
    //! 1er étape: vérifier les champs vides
    if(isset($_POST["name_user"]) && !empty($_POST["name_user"]) && isset($_POST["firstname_user"]) && !empty($_POST["firstname_user"]) && isset($_POST["email_user"]) && !empty($_POST["email_user"]) && isset($_POST["mdp_user"]) && !empty($_POST["mdp_user"])){
            //! 2eme étape: vérifier format
            if(filter_var($_POST["email_user"], FILTER_VALIDATE_EMAIL)){
                //! 3eme étape: nettoyer les données
                $nom = nettoyage($_POST["name_user"]);
                $prenom = nettoyage($_POST["firstname_user"]);
                $email = nettoyage($_POST["email_user"]);
                $mdp = nettoyage($_POST["mdp_user"]);
                $avatar = "";
                //chiffrage mdp
                $mdp = password_hash($mdp, PASSWORD_BCRYPT);

                $bdd = DBconnect();

                $message = userAdd($bdd, $nom, $prenom, $email, $mdp, $avatar);
            }else{
                $message = "Email non valide";
            }
        }else{   
            $message = "Remplir tous les champs obligatoires svp";
        }
} else {
    $message = "Erreur lors de l'envoi du formulaire";
}


include "./view/header.php";
include "./view/viewCreationCompte.php";
include "./view/footer.php";
?>