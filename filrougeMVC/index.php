<?php
include "./utils/function.php";
include "./model/model_user.php";
$message ="";

if(isset($_POST['newsLetterSubmit'])){

    //! 1er étape: vérifier les champs vides
    if(isset($_POST['newsLetterInscriptionMail']) && !empty($_POST['newsLetterInscriptionMail'])){

        //! 2eme étape: vérifier format
        if(filter_var($_POST['newsLetterInscriptionMail'], FILTER_VALIDATE_EMAIL)){

            //! 3eme étape: nettoyer les données
            $email = sanitize($_POST['newsLetterInscriptionMail']);

            $bdd = DBconnect();

            $data = readNewsLetter($bdd, $email);

            if(!$data){
                $req = $bdd->prepare("INSERT INTO newsletter(email_newsletter) VALUES (?)");
                $req->bindParam(1, $email, PDO::PARAM_STR);
                $req->execute();
                $message='Enregistrment à la newsLetter réussi';
            }else{
                $message = "Le mail est déjà enregistré";
            }
        }else{
            $message = 'Email non valide';
        }
    }else{
        $message = 'Veuillez renseigner votre email';
    }
}

include "./view/header.php";
include "./view/view_index.php";
include "./view/footer.php";