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


//FORMULAIRE INSCRIPTION
const form = document.querySelector('#formulaireInscription')


const logInputMail = document.querySelector('#email');
const logInputPassword = document.querySelector('#password');
const logInputConfirmPassword = document.querySelector('#confirmPassword')


const mailMessage = document.querySelector('#messageMail')
mailMessage.style.textAlign = 'center'
mailMessage.style.borderRadius = '5px'
mailMessage.style.Width = '100%'; 
mailMessage.style.padding = '0px 10px'; 


const passwordMessage = document.querySelector('#messagePassword');
passwordMessage.style.textAlign = 'center'
passwordMessage.style.borderRadius = '5px'
passwordMessage.style.Width = '100%'; 
passwordMessage.style.padding = '0px 10px'; 


const passwordConfirmMessage = document.querySelector('#messageConfirmPassword')
passwordConfirmMessage.style.textAlign= 'center'
passwordConfirmMessage.style.borderRadius = '5px'
passwordConfirmMessage.style.padding = '0px 10px'
passwordConfirmMessage.style.Width = '100%'; 
passwordConfirmMessage.style.padding = '0px 10px'; 


const checkbox = document.querySelector('#accept')
const checkboxError = document.querySelector('#errorCheckbox')
checkboxError.style.width = '100%'

form.addEventListener('submit', function (e){
    if (!checkbox.checked){
        e.preventDefault();
        checkboxError.style.display = 'block'
    } else{
        checkboxError.style.display = 'none'
    }
})

/* REGEX MAIL*/ logInputMail.addEventListener('keyup', ()=>{ 
    const regexMail = /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/;

    if (regexMail.test(logInputMail.value)){
        logInputMail.style.border = 'solid 5px green'
        mailMessage.style.display = 'none'
    } else {
        logInputMail.style.border = 'solid 5px red'
        mailMessage.innerText = 'Mail non valide'  
        mailMessage.style.border = 'solid 2px red'  
        mailMessage.style.backgroundColor = 'red'
    }
})

/* REGEX PASSWORD*/ logInputPassword.addEventListener('keyup', ()=>{
    const charSpecial = /[$&@!]/;

    if (charSpecial.test(logInputPassword.value)){
        logInputPassword.style.border = 'solid 2px green'
        passwordMessage.innerText = "Le mot de passe est valide"
        passwordMessage.style.backgroundColor = 'green'
    } else{
        logInputPassword.style.border = 'solid 2px red'
        passwordMessage.innerText = "Le mot de passe doit contenir: $&@!"
        passwordMessage.style.backgroundColor = 'red'
    }
})

/*VERIF CONFIRMATION PASSWORD*/ logInputConfirmPassword.addEventListener('keyup', () =>{ 
    if(logInputPassword.value === logInputConfirmPassword.value) {
        passwordConfirmMessage.innerText = 'Les mots de passe correspondent'
        passwordConfirmMessage.style.backgroundColor = 'green'
    } else{
        passwordConfirmMessage.innerText = 'Les mots ne passe ne correspondent pas'
        passwordConfirmMessage.style.backgroundColor = 'red'
    }
})

