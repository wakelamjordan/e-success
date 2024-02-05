<h1 class="text-center"><?= $title ?></h1>
<h2 class="" id="message"></h2>
<p class="text-center">Remplissez le formulaire ci-dessous.</p>
<form id="formInscription" method="post" class="container-lg p">
    <!-- <div class=""> -->
    <div class="p-2 border border-1 rounded m-1 " id='identitee'>
        <fieldset>
            <legend>Compte</legend>
            <!-- mail -->
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="mail" class="form-label">Mail ou numéros de telephone:</label>

                    <input type="text" class="form-control" name="mail" id="mail" aria-describedby="helpMail" placeholder="" required />

                    <span id="mailError"></span>

                    <small id="helpMail" class="form-text text-muted d-none">champ mail</small>
                    <a href="ap&action=recuperation">Récupération de compte</a>

                </div>
            </div>
            <button type="submit" class="btn btn-primary">
                Envoyer
            </button>
    </div>
</form>