//Prévisualisation de la photo

document.getElementById("photoAnimal").addEventListener("change", function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById("previewPhoto");
    const previewContainer = document.getElementById("previewContainer");

    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.style.display = "block";
    } else {
        preview.style.display = "none"; // Cache l'image si aucun fichier n'est sélectionné
    }
});