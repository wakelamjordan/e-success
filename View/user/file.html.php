<!-- ------------------------------------ -->
<div class="d-flex justify-content-around  flex-column position-relative">
    <div class="container">
        <h1 class="my-5 align-middle">Gestion comptes utilisateurs</h1>
        <div class="p-1 d-flex justify-content-between flex-column flex-md-row">
            <a name="" id="" class="col-2a btn btn-primary my-1" href="javascript:add()" role="button"><i class="fas fa-user-plus fs-2"></i></a>
            <div class="d-flex flex-column flex-md-row">
                <a name="" id="actionModal" class="col-2a my-1 mx-md-1 btn btn-success" href="javascript:view()" role="button"><i class="fas fa-eye fs-2"></i></a>
                <!-- <a name="" id="actionModal" class="col-2a my-1 mx-md-1 btn btn-success" href="javascript:view()" role="button"><i class="fas fa-eye fs-2" data-bs-toggle="modal" data-bs-target="#exampleModal"></i></a> -->
                <a name="" id="" class="col-2a my-1 mx-md-1 btn btn-warning" href="javascript:modify()" role="button"><i class="fas fa-pencil fs-2 "></i></a>
                <a name="" id="" class="col-2a my-1 mx-md-1 btn btn-danger" href="javascript:drop()" role="button"><i class="fas fa-trash-can fs-2"></i></a>
            </div>
        </div>

        <div class="tbl-fixed overflow-auto">
            <table class="table table-hover table-striped text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th class="col-1 position-sticky top-0 m-0 " scope="col">
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
                                <input class="form-check-input" type="checkbox" value="<?= $ligne['id'] ?>" id="<?= $ligne['id'] ?>" name="user" />
                                <!-- </div> -->
                            </td>
                            <td><label for="<?= $ligne['id'] ?>"><?= $ligne['id'] ?></label></td>
                            <td><img src="./Public/upload/<?= $ligne['path'] ?>" alt="" class="img-fluid" style="height:60px"></td>
                            <td><label for="<?= $ligne['id'] ?>"><?= $ligne['phone'] ?></label></td>
                            <td><label for="<?= $ligne['id'] ?>"><?= $ligne['mail'] ?></label></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row p-0 ">
                        <!-- photo -->
                        <div class="mb-3 col-lg d-flex flex-column justify-content-around">
                            <div class="w-100 d-flex justify-content-center my-3">
                                <img src="./Public/upload/user_default.svg" class="img-fluid rounded-top w-25" alt="" />
                            </div>

                            <!-- <label for="" class="form-label">Choisissez une image</label> -->
                            <div class="">
                                <input type="file" class="form-control w-75 mx-auto" name="" id="" placeholder="" aria-describedby="fileHelpId" />
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
                                <div class="w-75 mx-auto d-none">
                                    <label for="" class="form-label">Password</label>
                                    <input type="text" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="" />
                                </div>
                                <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                            </div>
                            <!-- roles -->
                            <div class="mb-3 container">
                                <table class="table table-responsive w-75 mx-auto">
                                    <tr class="table-dark ">
                                        <th class="text-center">Roles</th>
                                    </tr>
                                    <tr>
                                        <td>role 1</td>
                                    </tr>
                                    <tr>
                                        <td>role 2</td>
                                    </tr>
                                    <tr>
                                        <td>role 3</td>
                                    </tr>
                                    <tr>
                                        <td>role 4</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row p-0">
                        <!-- name surname date_birth -->
                        <div class="mb-3 col-lg">
                            <div class="w-75 mx-auto">
                                <label for="" class="form-label">Nom</label>
                                <input type="text" class="form-control" name="mail" id="mail" aria-describedby="helpId" placeholder="" />
                            </div>
                            <div class="w-75 mx-auto">
                                <label for="" class="form-label">Prénom</label>
                                <input type="text" class="form-control" name="phone" id="phone" aria-describedby="helpId" placeholder="" />
                            </div>
                            <div class="w-75 mx-auto">
                                <label for="" class="form-label">Date de naissance</label>
                                <input type="text" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="" />
                            </div>
                            <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                        </div>
                        <!-- derniére co date création -->
                        <div class="mb-3 col-lg d-flex flex-column justify-content-center ">
                            <div class="h-100a ">
                                <div class="w-75 mx-auto">
                                    <label for="" class="form-label">Dernière connexion</label>
                                    <input type="text" class="form-control" name="mail" id="mail" aria-describedby="helpId" placeholder="" />
                                </div>
                                <div class="w-75 mx-auto">
                                    <label for="" class="form-label">Date de création</label>
                                    <input type="text" class="form-control" name="phone" id="phone" aria-describedby="helpId" placeholder="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between px-5">
                    <button type="button" class="col my-1 mx-5 btn btn-warning" data-bs-dismiss="modal"><i class="fas fa-pencil fs-2"></i></button>
                    <button type="button" class=" col my-1 mx-5 btn btn-danger"><i class="fas fa-trash-can fs-2"></i></button>
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

    function add() {
        alert('add');
        // affiche un formulaire de création d'user
    }

    function view() {
        // alert('view');
        // controle qu'il n'y a qu'un seul user de coché sinon renvoi message de ne coché qu'un seul user
        // let count = count(checkboxes.checked == true);
        // alert(count);
        //comptage du nombre de checkbox coché avec initialisation à 0, et création de la variable let
        let count = 0;
        let id;
        checkboxes.forEach((checkbox) => {
            if (checkbox.checked == true) {
                count++;
                id = checkbox.id;
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

                alert(donne.mail+" "+donne.surname);
                alert(mail.value);

                document.getElementById('name').value = donne.name;

                document.getElementById('surname').value = donne.surname;

                document.getElementById('date_birth').value = donne.date_birth;

                document.getElementById('mail').value = donne.mail;

                document.getElementById('phone').value = donne.phone;

                document.getElementById('last_connexion').value = donne.last_connexion;

                document.getElementById('date_create').value = donne.date_create;

            });


            modalOn('exampleModal');
        };




        // function modalOn() {
        // const actionModalLink = document.getElementById('actionModal');

        // actionModalLink.addEventListener('click', (event) => {
        //     event.preventDefault();
        //     const exampleModal = document.getElementById('exampleModal');
        //     if (exampleModal) {
        //         const modal = new bootstrap.Modal(exampleModal);
        //         modal.show();
        //     }
        // })
        // const actionModal = document.getElementById('exampleModal')
        // // if (exampleModal) {
        //     exampleModal.addEventListener('show.bs.modal', event => {
        //         // Button that triggered the modal
        //         const button = event.relatedTarget
        //         // Extract info from data-bs-* attributes
        //         const recipient = button.getAttribute('data-bs-whatever')
        //         // If necessary, you could initiate an Ajax request here
        //         // and then do the updating in a callback.

        //         // Update the modal's content.
        //         const modalTitle = exampleModal.querySelector('.modal-title')
        //         const modalBodyInput = exampleModal.querySelector('.modal-body input')

        //         modalTitle.textContent = `New message to ${recipient}`
        //         modalBodyInput.value = recipient
        //     })
        // }
        // const exampleModal = document.getElementById('exampleModal')
        // if (exampleModal) {
        //     exampleModal.addEventListener('show.bs.modal', event => {
        //         // Button that triggered the modal
        //         const button = event.relatedTarget
        //         // Extract info from data-bs-* attributes
        //         const recipient = button.getAttribute('data-bs-whatever')
        //         // If necessary, you could initiate an Ajax request here
        //         // and then do the updating in a callback.

        //         // Update the modal's content.
        //         const modalTitle = exampleModal.querySelector('.modal-title')
        //         const modalBodyInput = exampleModal.querySelector('.modal-body input')

        //         modalTitle.textContent = `New message to ${recipient}`
        //         modalBodyInput.value = recipient
        //     })
        // }
        // }

    }

    function modify() {
        alert('modify');
    }

    function drop() {
        alert('drop');
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
    function xhr(method, url, callback) {
        let xhr = new XMLHttpRequest();

        xhr.open(method, url);

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);

                let donne = JSON.parse(xhr.responseText);
                console.log(donne);
                // alert(donne.mail);
                callback(donne);
            }
        };

        xhr.send();
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