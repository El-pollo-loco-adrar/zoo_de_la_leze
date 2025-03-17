<div class="container">
    <?php if(isset($animal) && $animal):?>
        <h1><?= $animal['nom_animal'] ?></h1>

        <img src="<?= htmlspecialchars($animal['image_url'], ENT_QUOTES,'UTF-8')?>" alt="<?= htmlspecialchars($animal['nom_animal'], ENT_QUOTES,'UTF-8')?>">
        <div class="separe"></div>
        <div id="textDesc">
            <p><strong>Espèce:</strong> <?= $animal['espece_animal']?></p>
            
            <p><strong>Age:</strong> <?= $animal['age_animal']?> ans.</p>
        </div>
        <div class="separe"></div>
        <p id="description"><?= nl2br($animal['description_animal'])?></p>
        <div class="titreAnimauxSuivant">
            <a href="controllerPetitsAnimaux.php"><h3>Retour à la liste</h3></a>
        </div>
        
    
    <?php else:?>
        <p><?php $message ?></p>
    <?php endif;?>
</div>
