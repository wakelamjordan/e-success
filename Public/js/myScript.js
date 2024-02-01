
//jordan fonction pour controller la concordance des input d'un formulaire avec vérification saisie
function ctrlFieldInscription(event) {

    // alert('eeeee');
    // mail
    var array = [];
    // mail
    var mail = document.getElementById('mail').value;
    var ctrlMail = document.getElementById('ctrlMail').value;

    array['mail'] = mail;
    array['ctrlMail'] = ctrlMail;

    // login
    var login = document.getElementById('login').value;
    var ctrlLogin = document.getElementById('ctrlLogin').value;

    array['login'] = login;
    array['ctrlLogin'] = ctrlLogin;

    // password
    var password = document.getElementById('password').value;
    var ctrlPassword = document.getElementById('ctrlPassword').value;

    array['password'] = password;
    array['ctrlPassword'] = ctrlPassword;

    // récupération des keys
    var keys = Object.keys(array);

    for (let i = 0; i < keys.length; i += 2) {
        var key1 = keys[i];
        var key2 = keys[i+1];

        var valeur1 = array[key1];
        var valeur2 = array[key2];

        if (valeur1 !== valeur2) {
            document.getElementById(key1 + "Error").innerHTML = `Les champs ${key1} ne correspondent pas!`;
            event.preventDefault();
            return false;
        }
    }
}

function previewImage(event,id_image){
    const image=event.target.files[0];
    if(image){
        const elt_image=document.getElementById(id_image);
        elt_image.src=URL.createObjectURL(image);
    }
}

function popupCenter(url, title, w, h) {
    var left = (screen.width/2)-(w/2);
    var top = (screen.height/2)-(h/2);
    return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
}

function getIdChecked(name_element){
    let checkboxes=document.getElementsByName(name_element);
      let id=0;
    checkboxes.forEach((item)=>{
        if(item.checked==true) {
            id=item.value;
            stop;
        }
    });
    return id;
}
function onlyOne(checkbox){  //  checkbox est l'element où on a cliqué
    let checkboxes=document.getElementsByName(checkbox.name);
    checkboxes.forEach(function(item){
            if(item!=checkbox){  // tester si item l'un des elements de checkboxes est different de checkbox selectionnée
                item.checked=false;
            }
    });
    checkbox.checked=true;
}
