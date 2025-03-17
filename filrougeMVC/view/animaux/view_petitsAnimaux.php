    <main class="contentAnimaux">
        <div class="titreAnimaux">
            <h3>NOS ESPECES</h3>
        </div>
        <div class="espacePhoto">
            <div class="animauxPhotos">
                <?php foreach ($animaux as $animal):?>
                    
                    <a href="controllerAnimal.php?id=<?= $animal['id_animal']; ?>">
                    <img src="<?=htmlspecialchars($animal['image_url']); ?>" alt="<?= htmlspecialchars($animal['nom_animal']); ?>">
                    <span><?= htmlspecialchars($animal['nom_animal']); ?></span>
                    </a>

                <?php endforeach;?>
            </div>
        </div>

    </main>
