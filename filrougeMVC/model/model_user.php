<?php

//! Recherche si mail déjà rentré dans la bdd pour la newsletter
function readNewsLetter($bdd, $email){
    try {
        $req = $bdd->prepare("SELECT email_newsletter FROM newsletter WHERE email_newsletter =? LIMIT 1");

        $req->bindParam(1, $email, PDO::PARAM_STR);
        $req->execute();
        $data = $req->fetchColumn();
        return $data;

    }catch(Exception $e){
        echo "".$e->getMessage()."";
    }
}

//!Recherche si mail déjà présent dans BDD pour la connexion
function readUserByMail($bdd, $email){
    try {
        $req = $bdd->prepare("SELECT id_user, pseudo_user, mail_user, password_user, id_role FROM users WHERE mail_user =? LIMIT 1");

        $req->bindParam(1, $email, PDO::PARAM_STR);
        $req->execute();
        $data = $req->fetchAll();
        return $data;

    }catch(Exception $e){
        echo "".$e->getMessage()."";
    }
}

//! Inscription Utilisateur
function addUser($bdd, $pseudo, $email, $password){
    $id_role = 1; //1 = utilisateur  2 = admin
    try {
        //!Verification du mail existant
        $req = $bdd->prepare("SELECT mail_user FROM users WHERE mail_user =? LIMIT 1");
        $req->bindParam(1,$email, PDO::PARAM_STR);
        $req->execute();

        $user = $req->fetch(PDO::FETCH_ASSOC);

        if(empty($user)){
            $req = $bdd->prepare("INSERT INTO users(pseudo_user, mail_user, password_user, id_role) VALUES (?,?,?,?)");

            $req->bindParam(1,$pseudo, PDO::PARAM_STR);
            $req->bindParam(2,$email, PDO::PARAM_STR);
            $req->bindParam(3,$password, PDO::PARAM_STR);
            $req->bindParam(4,$id_role, PDO::PARAM_INT);

            $req->execute();
            return "Inscription de $pseudo réussi";

        }else{
            return "Email déjà utilisé";
        }
    }catch(Exception $e){
        return $e->getMessage();
    }
}