<h1 class="text-center"><?= $title ?></h1>
<h2 class="" id="message"></h2>
<p class="text-center">Remplissez le formulaire ci-dessous.</p>
<form action="user&action=validation" id="formInscription" method="post" class="container-lg" >
    <!-- <div class=""> -->
    <div class="p-2 border border-1 rounded m-1 " id='identitee'>
        <fieldset>
            <!-- mot de passe mail -->
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="mail" class="form-label">Mail :</label>

                    <input type="text" class="form-control" name="mail" id="mail" aria-describedby="helpMail" placeholder="" required />

                    <small id="helpMail" class="form-text text-muted d-none">champ mail</small>
                </div>
                <!-- password -->
                <div class="mb-3 col-md-6">
                    <label for="password" class="form-label">Mot de passe :</label>
                    <input type="text" class="form-control" name="password" id="password" aria-describedby="helpPassword" placeholder="" required />
                    <span id="passwordError"></span>
                    <small id="helpPassword" class="form-text text-muted d-none">champ mot de passe</small>
                </div>
            </div>
            <!-- name -->
            <!-- surname -->
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
            <!-- date_birth -->
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="date_birth" class="form-label">Date de naissance :</label>
                    <input type="date" class="form-control" name="date_birth" id="date_birth" aria-describedby="helpDate_birth" placeholder="" />
                    <small id="helpDate_birth" class="form-text text-muted d-none">champ date de naissance</small>
                </div>
                <div class="mb-3 col-md-6 d-flex justify-content-end  flex-column ">
                    <button type="submit" class="btn btn-primary">
                        Envoyer
                    </button>
                </div>
            </div>
        </fieldset>
        <a href="ap&action=recuperation">Récupération de compte</a>
    </div>
</form>