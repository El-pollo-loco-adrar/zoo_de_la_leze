//!Empêche de revenir en arrière quand on se déconecte
document.getElementById("startScanner").addEventListener("click", function() {
    let qrScanner = new Html5QrcodeScanner("qr-reader", { fps: 10, qrbox: 250 });
    
    qrScanner.render(
        function(decodedText) {
            alert("QR Code détecté : " + decodedText);
            window.location.href = decodedText; // Redirige vers l'URL du QR Code
        },
        function(error) {
            console.log("Erreur de scan:", error);
        }
    );
});

//!Menu burger
document.addEventListener("DOMContentLoaded", function () {
    let menuButton = document.getElementById("menuBurger");
    let menuContent = document.getElementById("menuContent");

    menuButton.addEventListener("click", function (event) {
        event.stopPropagation(); // Empêche la propagation du clic
        menuContent.classList.toggle("active"); // Ajoute ou enlève la classe active
    });

    // Fermer le menu si on clique ailleurs
    document.addEventListener("click", function (event) {
        if (!menuButton.contains(event.target) && !menuContent.contains(event.target)) {
            menuContent.classList.remove("active");
        }
    });
});