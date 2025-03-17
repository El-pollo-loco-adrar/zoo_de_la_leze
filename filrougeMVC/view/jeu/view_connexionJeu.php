<div>
    <!--CONNEXION-->
    <h1 class="bandeauSeConnecter">Se connecter</h1>

    <!--BOUTON RETOUR ARRIERE-->
    <button class="back-button" onclick="goBack()"><</button>

    <!--FORMULAIRE DE CONNEXION-->
    <form method="post" action=""> 
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Mon Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
        </div>

        <label for="checkbox"><a id="forgetPassword" href="#" target="_blank">J'ai oublié mon mot de passe</a></label>
        
        <p><?php echo $message; ?></p>

        <!--<div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Se souvenir de moi</label>
        </div>-->
        <div id="containerBtn">
            <button type="submit" value="envoyer" id="inscriptionButton" name="envoyer" >Valider</button>
        </div>
    </form>

        <!--CREATION DE COMPTE-->
    <div id="creation-compte">
        <p>Je n'ai pas de compte? je m'en crée un <a href="././controllerInscriptionJeu.php">ici.</a></p>
    </div>
</div>

