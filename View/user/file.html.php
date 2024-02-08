<!-- ------------------------------------ -->
<div class="d-flex justify-content-around  flex-column position-relative">
    <div class="container">
        <h1 class="my-5 align-middle">Gestion comptes utilisateurs</h1>
        <div class="p-1 d-flex justify-content-between flex-column flex-md-row">
            <a id="" class="col-2a btn btn-primary my-1" href="javascript:add()"><i class="fas fa-user-plus fs-2"></i></a>
            <div class="d-flex flex-column flex-md-row">
                <a id="actionModal" class="col-2a my-1 mx-md-1 btn btn-success" href="javascript:view()"><i class="fas fa-eye fs-2"></i></a>
                <!-- <a name="" id="actionModal" class="col-2a my-1 mx-md-1 btn btn-success" href="javascript:view()" role="button"><i class="fas fa-eye fs-2" data-bs-toggle="modal" data-bs-target="#exampleModal"></i></a> -->
                <a id="" class="col-2a my-1 mx-md-1 btn btn-warning" href="javascript:modify()"><i class="fas fa-pencil fs-2 "></i></a>
                <a id="" class="col-2a my-1 mx-md-1 btn btn-danger" href="javascript:deleteUser()"><i class="fas fa-trash-can fs-2"></i></a>
            </div>
        </div>

        <div class="tbl-fixed overflow-auto">
            <table class="table table-hover table-striped text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th class="col-1 position-sticky top-0" scope="col">
                            <!-- <div class="form-check"> -->
                            <input class="form-check-input" type="checkbox" value="" id="select_all" />
                            <!-- <label class="form-check-label" for="">sélectionner tout</label> -->
                            <!-- </div> -->
                        </th>
                        <th class="col-1 position-sticky top-0" scope="col">ID</th>
                        <th class="col-3 position-sticky top-0" scope="col">Photo</th>
                        <th class="col-3 position-sticky top-0" scope="col">Phone</th>
                        <th class="col-3 position-sticky top-0" scope="col">Mail</th>
                    </tr>
                </thead>
                <tbody class="">
                    <?php foreach ($lignes as $ligne) : ?>
                        <tr class="">
                            <td class="table-dark" scope="row">
                                <!-- <div class="bg-black"> -->
                                <input class="form-check-input" type="checkbox" value="<?= $ligne['id'] ?>" id="user<?= $ligne['id'] ?>" name="user" />
                                <!-- </div> -->
                            </td>
                            <td><label for="user<?= $ligne['id'] ?>"><?= $ligne['id'] ?></label></td>
                            <td><img src="./Public/upload/<?= $ligne['path'] ?>" alt="" class="img-fluid" style="height:60px"></td>
                            <td><label for="user<?= $ligne['id'] ?>"><?= $ligne['phone'] ?></label></td>
                            <td><label for="user<?= $ligne['id'] ?>"><?= $ligne['mail'] ?></label></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr class="table-dark">
                        <td colspan="88" class="position-sticky bottom-0 m-0">
                            <?= $nbr ?> comptes
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- <input type="text" value="oooooo" id="caca"> -->
    </div>
    <!-- <div class="bg-danger h-100 w-100 position-absolute" style="display:none;" id="modal"> -->
    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button> -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-md-down modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Compte utilisateur</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="modalClose"></button>
                </div>
                <div class="modal-body">
                    <div class="row p-0 ">
                        <!-- photo -->
                        <div class="mb-3 col-lg d-flex flex-column justify-content-around">
                            <div class="w-100 d-flex justify-content-center my-3">
                                <img id="userImg" src="" class="img-fluid rounded w-50" alt="" />
                            </div>

                            <!-- <label for="" class="form-label">Choisissez une image</label> -->
                            <div class="" id="dFile_photo">
                                <input type="file" class="form-control w-75 mx-auto" name="file_photo" id="file_photo" placeholder="" aria-describedby="fileHelpId" />
                            </div>
                            <!-- <div id="fileHelpId" class="form-text">Help text</div> -->
                        </div>
                        <!-- groupe info user et roles -->
                        <div class="col-lg">
                            <!-- mail phone et password none -->
                            <div class="mb-3">
                                <div class="w-75 mx-auto">
                                    <label for="" class="form-label">Email</label>
                                    <input type="text" class="form-control" name="mail" id="mail" aria-describedby="helpId" placeholder="" value="bonjour" />
                                </div>
                                <div class="w-75 mx-auto">
                                    <label for="" class="form-label">Phone</label>
                                    <input type="text" class="form-control" name="phone" id="phone" aria-describedby="helpId" placeholder="" />
                                </div>
                                <!-- visible qu'en modification -->
                                <div class="w-75 mx-auto" id="passwordGroup">
                                    <label for="" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="" />
                                </div>
                                <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                            </div>
                            <!-- roles -->
                            <div class="mb-3 container">
                                <table class="table table-responsive w-75 mx-auto">
                                    <thead>
                                        <tr class="table-dark ">
                                            <th class="text-center col-1 "></th>
                                            <th class="text-center col-1 ">Rang</th>
                                            <th class="text-center">Roles</th>
                                        </tr>
                                    </thead>
                                    <tbody id="roleTbody">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row p-0">
                        <!-- name surname date_birth -->
                        <div class="mb-3 col-lg">
                            <div class="w-75 mx-auto">
                                <label for="" class="form-label">Nom</label>
                                <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="" />
                            </div>
                            <div class="w-75 mx-auto">
                                <label for="" class="form-label">Prénom</label>
                                <input type="text" class="form-control" name="surname" id="surname" aria-describedby="helpId" placeholder="" />
                            </div>
                            <div class="w-75 mx-auto">
                                <label for="" class="form-label">Date de naissance</label>
                                <input type="date" class="form-control" name="date_birth" id="date_birth" aria-describedby="helpId" placeholder="" />
                            </div>
                            <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                        </div>
                        <!-- derniére co date création -->
                        <div class="mb-3 col-lg d-flex flex-column justify-content-center ">
                            <div class="h-100a ">
                                <div class="w-75 mx-auto">
                                    <label for="" class="form-label">Dernière connexion</label>
                                    <input type="datetime" class="form-control" name="last_connexion" id="last_connexion" aria-describedby="helpId" placeholder="" />
                                </div>
                                <div class="w-75 mx-auto">
                                    <label for="datetime" class="form-label">Date de création</label>
                                    <input type="text" class="form-control" name="date_create" id="date_create" aria-describedby="helpId" placeholder="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between px-5">
                    <button type="button" class="col my-1 mx-5 btn btn-warning" data-bs-dismiss="modal" id="a_modify"><i class="fas fa-pencil fs-2"></i></button>
                    <button type="button" class="col my-1 mx-5 btn btn-success" id="a_valide"><i class="fas fa-check fs-2"></i></button>
                    <button type="button" class=" col my-1 mx-5 btn btn-danger" data-bs-dismiss="modal" id="a_delete"><i class="fas fa-trash-can fs-2"></i></button>
                </div>
            </div>
        </div>
    </div>

    <!-- ------------------------- -->
</div>
</div>

<script>
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
</script>



<!-- ------------------------------------ -->