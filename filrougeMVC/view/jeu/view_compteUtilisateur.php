<head>
    <link rel="stylesheet" href="src/style/compteUtilisateur.css">
    <script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>
</head>
    <div id="containerJeu">
        <h1>Bonjour <?= $_SESSION["pseudo_user"];?></h1>
        <div id="startJeu">
            <h3>Prêt à débuter l'aventure?</h3>
            <button id="startScanner">📷 Scanner le QR Code</button>
            <div id="qr-reader" style="width: 300px; margin: auto;"></div>
        </div>
    </div>