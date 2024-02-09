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
            <form class="modal-content"enctype="multipart/form-data" method="post" name="formUser">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Compte utilisateur</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="modalClose"></button>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="exampleModal" aria-label="Close" id="modalClose"></button> -->
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
                    <button type="button" class="col my-1 mx-5 btn btn-warning" data-bs-dismiss="modal" id="a_modify" onclick="modify()"><i class="fas fa-pencil fs-2"></i></button>
                    <button type="submit" class="col my-1 mx-5 btn btn-success" id="a_valide"><i class="fas fa-check fs-2"></i></button>
                    <button type="button" class=" col my-1 mx-5 btn btn-danger" data-bs-dismiss="modal" id="a_delete"><i class="fas fa-trash-can fs-2"></i></button>
                </div>
            </form>
        </div>
    </div>

    <!-- ------------------------- -->
</div>
</div>

<script>

</script>


<!-- ------------------------------------ -->