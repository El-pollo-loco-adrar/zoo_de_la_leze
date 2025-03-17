<?php
session_start();

include "./utils/function.php";
include "./model/model_user.php";

$message ="";

if(isset($_POST['envoyer'])){
    //! 1er étape: vérifier les champs vides
    if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])){

        //! 2eme étape: vérifier format
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

            //! 3eme étape: nettoyer les données
            $email = sanitize($_POST["email"]);
            $password = sanitize($_POST["password"]);

            $bdd = DBconnect();
            $data = readUserByMail($bdd, $email);
            var_dump($data);

            if(!empty($data)){
                //! Verifier correspondance mdp entré avec mdp BDD
                if(password_verify($password, $data[0]["password_user"])){

                    //!Enregistre les infos relatives à l'utilisateur qui se connecte
                    $_SESSION["id_user"] = $data[0]["id_user"];
                    $_SESSION["pseudo_user"] = $data[0]["pseudo_user"];
                    $_SESSION["mail_user"] = $data[0]["mail_user"];
                    $_SESSION["id_role"] = $data[0]["id_role"];

                    $message ="Connexion réussie";

                    if($data[0]["id_role"] == 2){
                        header("location:controllerAdmin.php");
                        exit();
                    }else{
                        header("Location:controllerCompteUtilisateur.php");
                        exit();
                    }

                }else{
                    $message = "Mot de passe non valide";
                }

            }else{
                $message = "Email et/ou Mot de Passe incorrect(s)";
            }
        }else{
            $message = 'Email non valide';
        }
    }else{
        $message = 'Veuillez remplir tous les champs pour vous connecter';
    }
}

include "./view/jeu/header_jeu.php";
include "./view/jeu/view_connexionJeu.php";
include "./view/footer.php";