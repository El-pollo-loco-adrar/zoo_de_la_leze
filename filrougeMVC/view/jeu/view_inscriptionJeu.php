
    <div class="couleur-connexion">
        <h1 class="bandeauSeConnecter">Inscription</h1>

            <!--BOUTON RETOUR ARRIERE-->
        <button class="back-button" onclick="goBack()"><</button>

        <!--FORMULAIRE D'INSCRIPTION-->
        <form method="post" action="monProgramme.php" id="formulaireInscription">
            <label for="nom">Ton nom d'aventurier</label>
            <input type="text" id="nom" name=" ton nom" required minlength="2" placeholder="Korben Dallas">

            <label for="email">Adresse mail</label>
            <input type="email" id="email" name="email" required placeholder="korbendallas@gmail.com">
            <p id="messageMail"></p>
            
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required minlength="3">
            <p id="messagePassword"></p>

            <label for="confirmPassword">Confirmation du mot de passe</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required minlength="3">
            <p id="messageConfirmPassword"></p>

            <div class="checkbox-container">
                <input type="checkbox" id="accept"/>
                <div id="errorCheckbox" style="display: none;">Vous devez accepter les conditions générales pour continuer</div>
                
                <label for="checkbox"><a id="lienCgu" href="CGU.html" target="_blank">J'accepte les conditions générales</a></label>
            </div>

            <div id="containerInscriptionButton">
                <button type="submit" value="Envoyer" id="inscriptionButton" >Valider</button>
            </div>  
        </form>
    </div>
