<head>
    <link rel="stylesheet" href="src/style/compteUtilisateur.css">
    <script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>
</head>
<div id="containerJeu">
        <h1>Bonjour <?= $_SESSION["pseudo_user"];?></h1>
        
        <ul class="menuAdmin">
            <li><a class="dropdown-item" href="#">Quizz</a></li>
            <li><a class="dropdown-item" href="controllerAdmin.php?action=utilisateurs">Utilisateurs</a></li>
            <li><a class="dropdown-item" href="./controllerAjoutAnimauxAdmin.php">Ajouter animal</a></li>
            <li><a class="dropdown-item" href="controllerAdmin.php?action=animal">liste animal</a></li>
            <li><a class="dropdown-item" href="./deco.php">Me déconnecter</a></li>
        </ul>
        <div id="separate"></div>

        <h2>AJOUT D'UN ANIMAL</h2>
        <P id="para">*Vous devez OBLIGATOIREMENT remplir tous les champs pour valider la nouvelle entrée</P>
        <form action="" method="POST" id="ajoutAnimal" enctype="multipart/form-data">

        <label for="photoAnimal" class="custom-file">Photo de l'animal</label>
            <input type="file" id="photoAnimal" accept=".png, .jpg" name="image">
            <div id="previewContainer">
                <img src="" alt="Votre photo" id="previewPhoto">
            </div>
            <label for="nom">Nom de l'animal</label>
            <input type="text" id="nom" name="nom">

            <label for="espece">Espèce de l'animal</label>
            <input type="text" id="espece" name="espece">

            <label for="description">Description de l'animal</label>
            <textarea name="description" id="description"></textarea>

            <label for="age">Age de l'animal</label>
            <input type="number" id="inputAge" name="age">

            <p><?php echo $message; ?></p>
            <button type="submit" name="animalSubmit" value="envoyer">Valider</button>
        </form>

</div>