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

        <ul class="infosAdmin">
            <?= $message ?>
        </ul>
        <ul class="infosAnimaux">
            <?php echo $messageListe ?>
        </ul>

        <?php if(!empty($messageSupp)):?>
        <p style="color: red;"><?= $messageSupp;?> </p>
        <?php endif;?>
        

</div>