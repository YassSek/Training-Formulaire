

function wrongInputs(prenom, nom, mail, message, event) {

        let errorMsg = 'Veuillez corriger cet information svp';
        let regex = /^([a-zA-Z]{1,10})/g;
        let mailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        let regmess = /^([a-zA-Z0-9 .?!',])+$/gm;


        // test le nom & prenom et si vide
        if (prenom.match(regex)) {
            document.getElementById("prenom").style.borderColor = "green";
          

        } else {
            event.preventDefault()
            document.getElementById("prenom").style.borderColor = "red";
            document.getElementById("prenom").setAttribute('placeholder', errorMsg);

        }

        if (nom.match(regex)) {
            document.getElementById("nom").style.borderColor = "green";
            
        } else {
            event.preventDefault()
            document.getElementById("nom").style.borderColor = "red";
            document.getElementById("nom").setAttribute('placeholder', errorMsg);
        }
        if (prenom == '') {
            event.preventDefault()
            document.getElementById("prenom").style.borderColor = "red";
            document.getElementById("prenom").setAttribute('placeholder', errorMsg);
        }
        if (nom == '') {
            document.getElementById("nom").style.borderColor = "red";
            document.getElementById("nom").setAttribute('placeholder', errorMsg);

        }
        // test le mail
        if (mail.match(mailRegex)) {
            document.getElementById("inputEmail").style.borderColor = "green";
           
        } else {
            event.preventDefault()
            document.getElementById("inputEmail").style.borderColor = "red";
            document.getElementById("inputEmail").setAttribute('placeholder', errorMsg);
        }

        // test le message
        if (message.match(regmess)) {
            document.getElementById('message').style.borderColor = "green";
           
        } else {
            event.preventDefault()
            document.getElementById('message').style.borderColor = "red";
            document.getElementById("message").setAttribute('placeholder', errorMsg);
        }

    }

    function checkGenre(checkH, checkF, event) {
        if (checkH) {
            genre = 'Homme';
            document.getElementById("errorGenre").style.color = "green";
            document.getElementById("errorGenre").innerText = 'OK';
            
        } else if (checkF) {
            genre = 'Femme';
            document.getElementById("errorGenre").style.color = "green";
            document.getElementById("errorGenre").innerText = 'OK';
            
        } else {
            event.preventDefault()
            genre = null;
            document.getElementById("errorGenre").style.color = "red";
            document.getElementById("errorGenre").innerText = 'Veuillez choisir votre sexe svp';
        }

        return genre;

    }

    function checkSelection(paysCh, sujet, event) {
        if (sujet == '') {
            event.preventDefault()
            document.getElementById("subject").style.color = "red";
        } else {
            document.getElementById("subject").style.color = "green";
        }
        if (paysCh == '') {
            event.preventDefault()
            document.getElementById("selectPays").style.color = "red";
        } else {
            document.getElementById("selectPays").style.color = "green";
        }
    }





document.getElementById('run').addEventListener('click', (event) => {

        let mail = document.getElementById('inputEmail').value;
        let prenom = document.getElementById('prenom').value;
        let nom = document.getElementById('nom').value;
        let checkH = document.getElementById('checkH').checked;
        let checkF = document.getElementById('checkF').checked;
        let paysCh = document.getElementById("selectPays").value;
        let sujet = document.getElementById("subject").value;
        let message = document.getElementById('message').value;

        let genre = checkGenre(checkH, checkF, event);
        wrongInputs(prenom, nom, mail, message, event);
        checkSelection(paysCh, sujet, event);
})
    

