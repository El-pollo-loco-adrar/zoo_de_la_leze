<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Découvrez le Zoo de la Lèze : un lieu unique où rencontrer des animaux fascinants, participer à des activités éducatives et vivre des expériences inoubliables en famille.">
    <link rel="stylesheet" href="src/style/style.css">
    <link rel="stylesheet" href="src/style/pageAnimaux.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title><?= isset($title) ? $title : "Zoo de la Lèze"; ?></title>
</head>
<body>
<header>
                <!--IMAGE DE FOND HEADER-->
        <img class="fondHeader" src="./images/feuilles-1.png" alt="header">

        <div class="btnGroup">
            <button type="button" class="btn" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false" style="padding: 0; border: none; background: none;">
                <img src="images/burgerorange.png" alt="Menu" style="width: 50px; height: 60px; object-fit: cover;">
            </button>
        
        <ul class="dropdown-menu dropdown-menu-xl-end ">               
        
                                <!-- LES ANIMAUX -->
                <li class="dropdown-submenu">
                    <a class="dropdown-item dropdown-toggle" href="#">LES ANIMAUX</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="./controllerPetitsAnimaux.php">Nos espèces</a></li>
                        <li><a class="dropdown-item" href="#">Les podcasts de Mr Panda</a></li>
                    </ul>
                </li>
                                <!-- NOTRE PARC -->
                <li class="dropdown-submenu">
                    <a class="dropdown-item dropdown-toggle" href="#"> NOTRE PARC</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Les évènements</a></li>
                        <li><a class="dropdown-item" href="#">L'histoire du parc</a></li>
                        <li><a class="dropdown-item" href="#">Nos engagements</a></li>
                    </ul>
                </li>
                                <!-- LA NATURE -->
                <li class="dropdown-submenu">
                    <a class="dropdown-item dropdown-toggle" href="#">LA NATURE</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Le parcours</a></li>
                        <li><a class="dropdown-item" href="#">La démarche durable</a></li>
                        <li><a class="dropdown-item" href="#">Les podcasts nature</a></li>
                    </ul>
                </li>
                                <!-- INFOS PRATIQUES -->
                <li class="dropdown-submenu">
                    <a class="dropdown-item dropdown-toggle" href="#">INFOS PRATIQUES</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Plan du parc</a></li>
                        <li><a class="dropdown-item" href="#">Se restaurer dans le parc</a></li>
                        <li><a class="dropdown-item" href="#">Les boutiques souvenirs</a></li>
                        <li><a class="dropdown-item" href="#">Tarifs et billets</a></li>
                        <li><a class="dropdown-item" href="#">Services</a></li>
                    </ul>
                </li>
                                <!-- ACCES AU JEU DE PISTE -->
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item lienJeu" href="./controllerJeuDuParc.php">LE JEUX DU ZOO 🐘</a></li>
        
            </ul>
        </div> 
                <!--LOGO-->
        <div class="logo">
            <a href="./index.php"><img src="images/logo.png" alt="logo" style="width: 100px; height: 100px; object-fit: cover;"></a>
        </div>

                <!-- BOUTON ACCUEIL-->
        <div class="btnAccueil">
            <a href="./index.php"><img src="images/iconretour.png" alt="accueil" style="width: 50px; height: 60px; object-fit: cover;"></a>
        </div>
        
    </header> 
                <!--BARRE DE SEPARATION-->
    <div id="separate"></div>

                    <!--MENU SUR ECRAN LARGE-->
    <nav>
        <ul>
            <li>LES ANIMAUX 
                <ul class="sousMenu">
                    <li><a href="./controllerPetitsAnimaux.php">Nos espèces</a></li>
                    <li><a href="#">Les Podcasts de Mr Panda</a></li>
                </ul>
            </li>
            <li>NOTRE PARC
                
                <ul class="sousMenu">
                    <li><a href="#">Les évènements</a></li>
                    <li><a href="#">L'histoire du parc</a></li>
                    <li><a href="#">Nos engagements</a></li>
                </ul>
            </li>
            <li>LA NATURE
                
                <ul class="sousMenu">
                    <li><a href="#">Le parcours</a></li>
                    <li><a href="#">La démarche durable</a></li>
                    <li><a href="#">Les Podcasts nature</a></li>
                </ul>
            </li>
            <li>INFOS PRATIQUES
                <ul class="sousMenu">
                    <li><a href="#">Plan du parc</a></li>
                    <li><a href="#">Se restaurer dans le parc</a></li>
                    <li><a href="#">Les boutiques souvenirs</a></li>
                    <li><a href="#">Tarifs et billets</a></li>
                    <li><a href="#">Services</a></li>
                </ul>
            </li>
        </ul>
    </nav> 
