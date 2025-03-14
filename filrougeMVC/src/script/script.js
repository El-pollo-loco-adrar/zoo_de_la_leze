//GESTION MENU BURGER//
// Gestion des sous  menus pour fermer l'un lorsque l'autre s'ouvre

document.querySelectorAll('.dropdown-submenu .dropdown-toggle').forEach(function (element) {
    element.addEventListener('click', function (event) {
        event.stopPropagation(); // Empêche la fermeture automatique du menu principal
        event.preventDefault(); // Empêche le comportement par défaut du lien

        // Ferme tous les autres sous menus
        document.querySelectorAll('.dropdown-submenu .dropdown-menu').forEach(function (menu) {
            if (menu !== element.nextElementSibling) {
                menu.classList.remove('show');
            }
        });
        
        // Affiche ou masque le sous menu actuel
        const nextMenu = this.nextElementSibling;
        if (nextMenu && nextMenu.classList.contains('dropdown-menu')) {
            nextMenu.classList.toggle('show');
        }
    });
});

//IMPOSSIBLE D'ACCEDER AU JEU DEPUIS GRAND ECRAN
document.querySelector('.lienJeu').addEventListener('click', function(event){
    if(window.innerWidth >768){
        event.preventDefault();
        window.location.href = "/Pages/erreurPageJeu.html";
    }
});
//BOUTON RETOUR ARRIERE

function goBack() {
    window.history.back();
}

//FORMULAIRE INSCRIPTION
const form = document.querySelector('#formulaireInscription')
const logInputMail = document.querySelector('#email');
const logInputPassword = document.querySelector('#password');
const logInputConfirmPassword = document.querySelector('#confirmPassword')
const mailMessage = document.querySelector('#messageMail')
const passwordMessage = document.querySelector('#messagePassword');
const passwordConfirmMessage = document.querySelector('#messageConfirmPassword')
const checkbox = document.querySelector('#accept')
const checkboxError = document.querySelector('#errorCheckbox')

function setMessageStyle(element) { /*FONCTION CSS*/
    element.style.textAlign = 'center';
    element.style.borderRadius = '5px';
    element.style.width = '100%';
    element.style.padding = '0px 10px';
}

setMessageStyle(document.querySelector('#messageMail'));
setMessageStyle(document.querySelector('#messagePassword'));
setMessageStyle(document.querySelector('#messageConfirmPassword'));
setMessageStyle(document.querySelector('#errorCheckbox'));

/*FONCTION QUI CHECK EN TEMPS REEL SI MDP CORRESPONDENT*/
function passwordMatch() {
    if (logInputPassword.value === logInputConfirmPassword.value && logInputPassword.value !== '') {
        logInputConfirmPassword.style.border = 'solid 2px green'; 
        passwordConfirmMessage.style.display = 'none';
        inscriptionButton.disabled= false;
    } else {
        logInputConfirmPassword.style.border = 'solid 2px red';
        passwordConfirmMessage.innerText = 'Les mots de passe ne correspondent pas';
        passwordConfirmMessage.style.color = 'red';
        passwordConfirmMessage.style.display = 'block';
        inscriptionButton.disabled= true;
    }
}

/* REGEX MAIL*/ 
logInputMail.addEventListener('keyup', ()=>{ 
    const regexMail = /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/;

    if (regexMail.test(logInputMail.value)){
        logInputMail.style.border = 'solid 2px green'
        mailMessage.style.display = 'none'
    } else {
        logInputMail.style.border = 'solid 2px red'
        mailMessage.innerText = 'Mail non valide'  
        mailMessage.style.color = 'red'
    }
})

/* REGEX PASSWORD*/ 
logInputPassword.addEventListener('keyup', ()=>{
    const charSpecial = /[$&@!]/;

    if (charSpecial.test(logInputPassword.value)){
        logInputPassword.style.border = 'solid 2px green'
        passwordMessage.style.display = "none"
    } else{
        logInputPassword.style.border = 'solid 2px red'
        passwordMessage.innerText = "Le mot de passe doit contenir au moins un caractère spécial ($, &, @, ! )"
        passwordMessage.style.color = 'red'
    }
    passwordMatch();
})

logInputConfirmPassword.addEventListener('keyup', () =>{ 
    if(logInputPassword.value === logInputConfirmPassword.value) {
        logInputConfirmPassword.style.border = 'solid 2px green'
        passwordConfirmMessage.style.display = 'none'
        
    } else{
        passwordConfirmMessage.innerText = 'Les mots ne passe ne correspondent pas'
        
    }
    passwordMatch();
})

/*OBLIGATION DE CHECKER LA BOX*/
form.addEventListener('submit', function (e){
    if (!checkbox.checked){
        e.preventDefault(); /*Empèche envoie du formulaire si checkbox pas cochée*/
        checkboxError.style.display = 'block'; /*Affiche message du HTML*/
    }else{
        checkboxError.style.display='none'
    }
})

