// ----------------Jordan
    // ----------------maintien le modal ouvert pour le développement
    // document.addEventListener('DOMContentLoaded', function() {
    //     modalOn('exampleModal');
    // });

    // si input change ça fait un update, si input non change ça fait rien
    function update() {
        let confirmation = confirm("Confirmez l'enregistrement?");

        if (!confirmation) {
            return;
        }
        //préparation du tableau avec comme clé les id des input à tester et à compléter par leur valeur
        let data = {

        };


    }

    function add() {
        alert('add');
        // affiche un formulaire de création d'user
    }

    function deleteUser() {
        alert('drop');
    }


    // let checkboxes = document.querySelectorAll(selector);
    // // si un checkbox est décoché ça décoche automatiquement le checkbox_all
    // checkboxes.forEach((checkbox) => {
    //     checkbox.addEventListener('change', function() {
    //         if (!this.checked) {
    //             select_all.checked = false;
    //         }
    //     })
    // })

    //affichage
    //pour le bouton modifié du modal show
    function showToModify(id) {
        modalClose.click();
        modify(id);
    }

    function modify(id = null) {

        exampleModalLabel.innerHTML = 'Modification compte utilisateur';

        if (id == null) {
            // alert(id.value);
            // controle qu'il n'y a qu'un seul user de coché sinon renvoi message de ne coché qu'un seul user
            //comptage du nombre de checkbox coché avec initialisation à 0, et création de la variable let
            let count = 0;
            checkboxes.forEach((checkbox) => {
                if (checkbox.checked == true) {
                    count++;
                    id = checkbox.value;

                }
            });

            //conditionnement pour une seul checkbox checked
            if (count > 1 || count == 0) {
                alert("Pour modifier veuillez sélectionner qu'un seul compte.");
                return;
            }
        }

        let url = `user&action=modify&id=${id}`;

        // alert(url);

        let methode = `GET`;

        xhr(methode, url, (donne) => {
            // mise des donné dans les input
            insertValueInput(donne);

            password.value = '..........';

            let roleUser = JSON.parse(donne.roles);
            // console.log(donne.roles);
            // console.log(roleUser);

            xhr('GET', 'user&action=listRole', (roles) => {
                let lignes = '';
                let checked = '';

                // console.log(roles);


                roles.forEach((role) => {
                    let id = role.id;
                    let rang = role.rang;
                    let libelle = role.libelle;


                    roleUser.forEach((test) => {
                        // console.log(test);
                        if (test == libelle) {
                            checked = `checked`;
                        } else {
                            checked = '';
                        }
                        // console.log(test + " " + libelle+" "+checked);
                    })
                    lignes += `
                            <tr>
                                <td>
                                    <label class="list-group-item">
                                        <input id="role${id}" class="form-check-input me-1" type="checkbox" value="${id}" ${checked}/>
                                    </label>
                                </td>
                                <td><label for="role${id}">${rang}</label></td>
                                <td class="text-center"><label for="role${id}">${libelle}</label></td>
                            </tr> 
                        `;
                })

                roleTbody.innerHTML = lignes;

                userImg.src = `./Public/upload/${donne.path}`;


                // for (role in roles) {
                // }

            })
        });


        modalOn('exampleModal');
        passwordGroup.style.display = '';
        dFile_photo.style.display = '';
        a_valide.style.display = '';
        // a_delete.style.display = 'none';
        a_modify.style.display = 'none';

        a_valide.onclick = () => update();
    }

    function view() {

        exampleModalLabel.innerHTML = 'Affichage compte utilisateur';

        // controle qu'il n'y a qu'un seul user de coché sinon renvoi message de ne coché qu'un seul user
        //comptage du nombre de checkbox coché avec initialisation à 0, et création de la variable let
        let count = 0;
        let id;
        checkboxes.forEach((checkbox) => {
            if (checkbox.checked == true) {
                count++;
                id = checkbox.value;
            }
        });

        //conditionnement pour une seul checkbox checked
        if (count > 1 || count == 0) {
            alert("Pour afficher veuillez sélectionner qu'un seul compte.");
            return;
        } else {
            // return;
            //fct pour afficher le modal

            let url = `user&action=show&id=${id}`;

            let methode = `GET`;

            xhr(methode, url, (donne) => {

                // mise des donné dans les input

                insertValueInput(donne, true);

                // //spécificité à donne.roles
                // password.value = '..........';
                // //formatage fr date 
                // var dateObj=new Date(last_connexion.value);
                // last_connexion.value=dateObj.toLocaleString('fr-FR');

                // ["ROLE_USER","ROLE_ADMIN"] en pars ça devrait être utilisable
                // console.log(JSON.parse(donne.roles));
                let roleUser = JSON.parse(donne.roles);

                xhr('GET', 'user&action=listRole', (roles) => {
                    let lignes = '';
                    let checked = '';

                    // console.log(roleUser);

                    roles.forEach((role) => {
                        let id = role.id;
                        let rang = role.rang;
                        let libelle = role.libelle;


                        roleUser.forEach((test) => {
                            // console.log(test);
                            if (test == libelle) {
                                checked = `checked`;
                            } else {
                                checked = '';
                            }
                            // console.log(test + " " + libelle+" "+checked);
                        })
                        lignes += `
                            <tr>
                                <td>
                                    <label class="list-group-item">
                                        <input id="role${id}" class="form-check-input me-1" type="checkbox" value="${id}" ${checked} disabled/>
                                    </label>
                                </td>
                                <td><label for="role${id}">${rang}</label></td>
                                <td class="text-center"><label for="role${id}">${libelle}</label></td>
                            </tr> 
                        `;
                    })

                    roleTbody.innerHTML = lignes;

                    userImg.src = `./Public/upload/${donne.path}`;

                    // consol.log(userImg);

                    // for (role in roles) {
                    // }

                })


                //mise de password en d-none parce que le visuel est inutile
                passwordGroup.style.display = 'none';
                dFile_photo.style.display = 'none';
                a_valide.style.display = 'none';
                a_modify.style.display = '';
            });

            a_modify.onclick = () => showToModify(id);

            // document.querySelectorAll()


            modalOn('exampleModal');

            // alert(donne.mail + " " + donne.surname);

            // alert(mail.value);

        };
    }
    // si checkbox_all est coché coche toute les autres checkbox, si decoché il décoche tout
    select_all.addEventListener('change', function() {
        if (this.checked) {
            // alert("checked");
            checkboxes.forEach((checkbox) => {
                checkbox.checked = true;
            })
        } else {
            checkboxes.forEach((checkbox) => {
                checkbox.checked = false;
            })
        }
    })
    //si un check

    let checkboxes = document.querySelectorAll('input[type="checkbox"][name="user"]');
    // si un checkbox est décoché ça décoche automatiquement le checkbox_all
    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', function() {
            if (!this.checked) {
                select_all.checked = false;
            }
        })
    })

    // --------------------------
    // renvoi un résultat sous forme d'alert
    function xhr(method, url, callback, data = {}) {

        let formData;

        if (Object.keys(data).length === 0) {
            formData = new FormData();
            for (item in data) {
                formData.append(item, data[item]);
            }
        }

        let xhr = new XMLHttpRequest();

        xhr.open(method, url);

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // console.log(xhr.responseText);
                // let donne = xhr.responseText;

                let donne = JSON.parse(xhr.responseText);
                // console.log(donne);
                // alert(donne.mail);
                callback(donne);
            }
        };

        if (formData) {
            xhr.send(formData);
        } else {
            xhr.send();
        }
    }

    //mettre automatiquement des valeurs d'un tableau json id de l'input=> valeur
    function insertValueInput(donne, disable = false) {
        let element;
        for (let item in donne) {
            // console.log(item + "=>" + donne[item]);

            element = document.getElementById(item);

            // console.log(item);

            var date;

            if (element !== null) {

                // element.value = donne[item];
                //si la donné récupéré est pas une date 
                // d'abord créer objet date à partir de la valeur
                date = new Date(donne[item]);
                // vérifier si date est pas une date, ou tester dans la valeur si il y a un format de d(chiffre de 0 à 9) 2 fois séparé par un :
                if (isNaN(date.getTime()) || !/\d{2}:\d{2}:\d{2}/.test(donne[item])) {
                    element.value = donne[item];
                } else {
                    // console.log(donne[item]);
                    // mise de la valeur au format fr
                    let dateFr = date.toLocaleString('fr-FR');
                    element.value = dateFr;
                }


                // element.value = donne[item];
                if (disable === true) {
                    element.disabled = true;
                } else {
                    element.disabled = false;
                }
            }
        }
    }

    function modalOn(idModal) {
        const modal = document.getElementById(idModal);
        if (modal) {
            const modalInstance = new bootstrap.Modal(modal);
            modalInstance.show();
            //pour le dév rendre le modal toujours ouvert

        }
    }

// ----------------Jordan
//jordan fonction pour controller la concordance des input d'un formulaire avec vérification saisie
// function ctrlFieldInscription(event) {

//     // alert('eeeee');
//     // mail
//     var array = [];
//     // mail
//     var mail = document.getElementById('mail').value;
//     var ctrlMail = document.getElementById('ctrlMail').value;

//     array['mail'] = mail;
//     array['ctrlMail'] = ctrlMail;

//     // login
//     var login = document.getElementById('login').value;
//     var ctrlLogin = document.getElementById('ctrlLogin').value;

//     array['login'] = login;
//     array['ctrlLogin'] = ctrlLogin;

//     // password
//     var password = document.getElementById('password').value;
//     var ctrlPassword = document.getElementById('ctrlPassword').value;

//     array['password'] = password;
//     array['ctrlPassword'] = ctrlPassword;

//     // récupération des keys
//     var keys = Object.keys(array);

//     for (let i = 0; i < keys.length; i += 2) {
//         var key1 = keys[i];
//         var key2 = keys[i+1];

//         var valeur1 = array[key1];
//         var valeur2 = array[key2];

//         if (valeur1 !== valeur2) {
//             document.getElementById(key1 + "Error").innerHTML = `Les champs ${key1} ne correspondent pas!`;
//             event.preventDefault();
//             return false;
//         }
//     }
// }

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
