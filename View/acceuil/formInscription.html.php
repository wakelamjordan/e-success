<h1 class=""><?= $title ?></h1>
<p>Remplissez le formulaire ci-dessous.</p>
<form id="formInscription" method="post" class="container-lg p">
    <!-- <div class=""> -->
    <!-- <div class="p-2 border border-1 rounded m-1 " id='identitee'>
        <fieldset>
            <legend>Identitée</legend>
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="name" class="form-label">Nom :</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="helpName" placeholder="" required />
                    <small id="helpName" class="form-text text-muted d-none">champ nom</small>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="surname" class="form-label">Prenom :</label>
                    <input type="text" class="form-control" name="surname" id="surname" aria-describedby="helpSurname" placeholder="" required />
                    <small id="helpSurname" class="form-text text-muted d-none">champ prenom</small>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="date_birth" class="form-label">Date de naissance :</label>
                    <input type="date" class="form-control" name="date_birth" id="date_birth" aria-describedby="helpDate_birth" placeholder="" />
                    <small id="helpDate_birth" class="form-text text-muted d-none">champ date de naissance</small>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="place_birth" class="form-label">Lieu de naissance :</label>
                    <input type="text" class="form-control" name="place_birth" id="place_birth" aria-describedby="helpPlace_birth" placeholder="" />
                    <small id="helpPlace_birth" class="form-text text-muted d-none ">champ lieu de naissance</small>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="id_nationality" class="form-label">Nationalité</label>
                    <select class="form-select form-select-lg" name="id_nationality" id="id_nationality">
                        <option selected>Selectionnez une Nationalité</option>
                        <?php foreach ($nationality as $value) : ?>
                            <option value="<?= $value['id'] ?>"><?= $value['libelle'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="id_civility" class="form-label">Civilité :</label>
                    <select class="form-select form-select-lg" name="id_civility" id="id_civility">
                        <option selected>Selectionnez une Civilité</option>
                        <?php foreach ($civility as $value) : ?>
                            <option value="<?= $value['id'] ?>"><?= $value['libelle'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col d-flex">
                    <img src="./Public/upload/user_default.svg" alt="preview photo" class="m-auto img-fluid m_w_50" id='image_view'>
                </div>
                <div class="mb-3 col-md-6 d-flex flex-column justify-content-end ">
                    <label for="path" class="form-label">Photo :</label>
                    <input type="file" class="form-control" name="path" id="path" placeholder="" aria-describedby="fileHelpPhoto" onchange="previewImage(event,'image_view')" />
                    <div id="fileHelpPhoto" class="form-text d-none">Champ photo profile</div>
                </div>
            </div>
        </fieldset>
    </div> -->
    <div class="p-2 border border-1 rounded m-1 " id='compte'>
        <fieldset>
            <legend>Compte</legend>
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="mail" class="form-label">Mail :</label>

                    <input type="text" class="form-control" name="mail" id="mail" aria-describedby="helpMail" placeholder="" required />

                    <span id="mailError"></span>

                    <small id="helpMail" class="form-text text-muted d-none">champ mail</small>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="ctrlMail" class="form-label">Vérification :</label>
                    <input type="text" class="form-control" name="ctrlMail" id="ctrlMail" aria-describedby="helpMail" placeholder="" required />
                    
                    <small id="helpMail" class="form-text text-muted d-none">champ vérification mail</small>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="login" class="form-label">Identifiant :</label>
                    <input type="text" class="form-control" name="login" id="login" aria-describedby="helpLogin" placeholder="" required />

                    <span id="loginError"></span>

                    <small id="helpLogin" class="form-text text-muted d-none">champ login</small>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="ctrlLogin" class="form-label">Vérification :</label>
                    <input type="text" class="form-control" name="ctrlLogin" id="ctrlLogin" aria-describedby="helpCtrlLogin" placeholder="" required />
                    <small id="helpCtrlLogin" class="form-text text-muted d-none">champ vérification login</small>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="password" class="form-label">Mot de passe :</label>
                    <input type="text" class="form-control" name="password" id="password" aria-describedby="helpPassword" placeholder="" required />
                    <span id="passwordError"></span>
                    <small id="helpPassword" class="form-text text-muted d-none">champ mot de passe</small>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="ctrlPassword" class="form-label">Vérification :</label>
                    <input type="text" class="form-control" name="ctrlPassword" id="ctrlPassword" aria-describedby="helpCtrlPassword" placeholder="" required />
                    <small id="helpCtrlPassword" class="form-text text-muted d-none">vérification mot de passe</small>
                </div>
            </div>
        </fieldset>
    </div>
    <div class="d-grid col-md-6 mx-auto ">
        <button type="submit" class="btn btn-primary">
            Envoyer
        </button>
    </div>
</form>