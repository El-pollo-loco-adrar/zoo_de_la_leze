<?php

//!Fonction qui récupère les animaux
function getAnimal($bdd){
    try{
        $req = $bdd->prepare("SELECT id_animal, nom_animal, espece_animal,description_animal, age_animal, image_url FROM animal");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }catch(Exception $e){
        return [];
    }
}

//!Fonctions pour récupérer un animal par son ID
function getAnimalById($bdd, $id_animal){
    try{
        $req = $bdd->prepare("SELECT id_animal, nom_animal, espece_animal,description_animal, age_animal, image_url FROM animal WHERE id_animal =?");
        $req->execute([$id_animal]);
        return $req->fetch(PDO::FETCH_ASSOC);

    }catch(Exception $e){
        return false;
    }
}