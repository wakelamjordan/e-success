<h1 class="text-center"><?= $title ?></h1>
<h2 id="message"></h2>
<p class="text-center">Remplissez le formulaire ci-dessous.</p>
<form action="login&action=validation" id="formInscription" method="post" class="container-lg p">
    <!-- <div class=""> -->
    <div class="p-2 border border-1 rounded m-1 " id='identitee'>
        <fieldset>
            <!-- mot de passe mail -->
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="mail" class="form-label">Mail ou numéros de téléphone:</label>

                    <input type="text" class="form-control" name="mail" id="mail" aria-describedby="helpMail" placeholder="" value="<?= $mail ?>" required />
                    <a href="login&action=recuperation">Récupération de compte</a>
                    <small id="helpMail" class="form-text text-muted d-none">champ mail</small>
                </div>
                <!-- password -->
                <div class="mb-3 col-md-6">
                    <label for="password" class="form-label">Mot de passe :</label>
                    <input type="password" class="form-control" name="password" id="password" aria-describedby="helpPassword" placeholder="" required />
                    <span id="passwordError"></span>
                    <small id="helpPassword" class="form-text text-muted d-none">champ mot de passe</small>
                </div>
                <div class="d-grid col-md-6 mx-auto ">
                    <button type="submit" class="btn btn-primary">
                        Envoyer
                    </button>
                </div>
            </div>
        </fieldset>
    </div>
</form>