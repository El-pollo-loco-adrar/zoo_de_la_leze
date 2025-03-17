<?php



//!Fonction qui affiche les utilisateurs
function readUsers($bdd){
    try{
        // $bdd = DBconnect();
        $req = $bdd->prepare("SELECT id_user, pseudo_user, mail_user, id_role FROM users");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        $message= "";

        foreach($data as $utilisateurs){
            $message = $message. "
            <div style = 'border: solid black 2px; text-align: center; width: 60%; margin: auto; padding: 1%; background-color : whitesmoke;'
                <form method='POST' action='controllerAdmin.php'>                 
                    <p><strong>ID:</strong> {$utilisateurs['id_user']}</p>
                    <p><strong>Pseudo:</strong> {$utilisateurs['pseudo_user']}</p>
                    <p><strong>Email:</strong> {$utilisateurs['mail_user']}</p>
                    <p><strong>Rôle:</strong> {$utilisateurs['id_role']}</p>
                    <input type='hidden' name='id_user' value='{$utilisateurs['id_user']}'>
                    <button type='submit' name='deleteUser'>❌ Supprimer</button>
                </li>
            </div>
            <br>
            <br>";
        }
        return $message;
    }catch(Exception $e){
        return  $e->getMessage();
    }
}

//!Fonction qui supprime un utilisateur
function deleteUser($bdd, $id_user){
    try{
        $req = $bdd->prepare("DELETE FROM users WHERE id_user =?");
        $req->execute([$id_user]);
        return "L'utilisateur a été supprimé avec succès.";
    }catch(Exception $e){
        return $e->getMessage();
    }
}

//!Fonction qui ajoute un animal
function addAnimal($bdd, $nom, $espece, $description, $age, $image_url){
    try{
        
        $req = $bdd->prepare("INSERT INTO animal(nom_animal, espece_animal, description_animal, age_animal, image_url) VALUES (?,?,?,?,?)");

        $req->bindParam(1,$nom,PDO::PARAM_STR);
        $req->bindParam(2,$espece,PDO::PARAM_STR);
        $req->bindParam(3,$description,PDO::PARAM_STR);
        $req->bindParam(4,$age,PDO::PARAM_INT);
        $req->bindParam(5,$image_url,PDO::PARAM_STR);
        $req->execute();
        return "Ajout de $nom réussi.";

    }catch(Exception $e){
        return $e->getMessage();
    }
}

//!Fonction qui affiche les animaux pour l'admin
function readAnimal($bdd){
    try {
        $req = $bdd->prepare("SELECT id_animal, nom_animal, espece_animal,description_animal, age_animal, image_url FROM animal");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        $messageListe = "";

        foreach ($data as $animal){
            $messageListe = $messageListe. "
            <div style = 'border: solid black 2px; text-align: center; width: 60%; margin: auto; padding: 1%; background-color : whitesmoke;'>
                <form method='POST' action='controllerAjoutAnimauxAdmin.php'>            
                    <p><strong>ID:</strong> {$animal['id_animal']}</p>
                    <p><strong>Nom:</strong> {$animal['nom_animal']}</p>
                    <p><strong>Espece:</strong> {$animal['espece_animal']}</p>
                    <p><strong>Description:</strong> {$animal['description_animal']}</p>
                    <p><strong>Age:</strong> {$animal['age_animal']}</p>
                    <img src ='{$animal['image_url']}' alt='Photo{$animal['nom_animal']}' style='max-width: 200px; max-height: 200px; object-fit: cover;'>
                    <br>
                    <input type='hidden' name='id_animal' value='{$animal['id_animal']}'>
                    <button type='submit' name='deleteAnimal'>❌ Supprimer</button>
                </form>
            </div>
            <br>
            <br>";
        }
        return $messageListe;
    }catch(Exception $e){
        return $e->getMessage();
    }
}
//!Fonction qui supprime un animal
function deleteAnimal($bdd, $id_animal){
    try {
        $req = $bdd->prepare("SELECT image_url FROM animal WHERE id_animal = ?");
        $req->execute([$id_animal]);
        $animal = $req->fetch(PDO::FETCH_ASSOC);

        if($animal && !empty($animal['image_url']) && file_exists($animal['image_url'])){
            unlink($animal['image_url']);//Je supprime l'image du dossier
        }
        $req = $bdd->prepare('DELETE FROM animal WHERE id_animal =?');
        $req->execute([$id_animal]);

        return "Suppression de l'animal";

    }catch(Exception $e){
        return $e->getMessage();
    }
}

