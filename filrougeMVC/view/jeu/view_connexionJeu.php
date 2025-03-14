

<div>
<!--CONNEXION-->
<h1 class="bandeauSeConnecter">Se connecter</h1>

<!--BOUTON RETOUR ARRIERE-->
<button class="back-button" onclick="goBack()"><</button>

<form method="post" action="monProgramme.php"> <!--FORMULAIRE DE CONNEXION-->
<div class="mb-3">
<label for="exampleInputEmail1" class="form-label">Mon Email</label>
<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>

</div>
<div class="mb-3">
<label for="exampleInputPassword1" class="form-label">Mot de passe</label>
<input type="password" class="form-control" id="exampleInputPassword1" required>
</div>
<label for="checkbox"><a id="forgetPassword" href="#" target="_blank">J'ai oublié mon mot de passe</a></label>

<!--<div class="mb-3 form-check">
<input type="checkbox" class="form-check-input" id="exampleCheck1">
<label class="form-check-label" for="exampleCheck1">Se souvenir de moi</label>
</div>-->
<div id="containerBtn">
    <button type="submit" value="Envoyer" id="inscriptionButton" >Valider</button>
</div>
</form>

    <!--CREATION DE COMPTE-->
<div id="creation-compte">
    <p>Je n'ai pas de compte? je m'en crée un <a href="inscription.html">ici.</a></p>
</div>
</div>

