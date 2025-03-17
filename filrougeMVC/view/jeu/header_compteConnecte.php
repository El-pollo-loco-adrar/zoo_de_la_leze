<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Découvrez le jeu de piste du Zoo de la Lèze : êtes-vous prêt à découvrir le parc dans son intimité?">
    <link rel="stylesheet" href="src\style\compteUtilisateur.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title><?= isset($title) ? $title : "Zoo de la Lèze"; ?></title>
</head>
<body>
    <div id="containerTotalConnexion">
        <header>
            <!--IMAGE DE FOND HEADER-->
            <img class="fondHeader" src="images/feuilles-1.png" alt="header">

            <div class="btnGroup">
                <button type="button" class="btn" id="menuBurger">
                    <img src="images/burgerorange.png" alt="Menu" style="width: 50px; height: 60px;">
                </button>

                <ul class="dropdown-menu" id="menuContent">
                    <li><a class="dropdown-item" href="#">Modifier mes  informations</a></li>
                    <li><a class="dropdown-item" href="./deco.php">Me déconnecter</a></li>
                </ul>
            </div>

                    <!--LOGO-->
            <div class="logo">
            <a href="././index.php"><img src="images/logo.png" alt="logo" style="width: 100px; height: 100px; object-fit: cover;" ></a>
            </div>


            <!-- BOUTON ACCUEIL-->
    <!--<div class="btnAccueil">
    <a href="././index.php"><img src="images\iconretour.png" alt="accueil" style="width: 50px; height: 60px; object-fit: cover;"></a>
    </div>
    <div id="separate"></div> -->
        </header>