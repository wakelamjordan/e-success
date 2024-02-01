<div>
    <h1>SAISIE ROLE</h1>
    <form action="role&action=save" method='POST' >

        <div>
            <label for="id">ID</label>
            <input type="text" id='id' name="id" value="<?=$id?>" <?=$disabled?>>
        </div>
        <div>
            <label for="rang">RANG</label>
            <input required type="text" id='rang' name="rang" value="<?=$rang?>"  <?=$disabled?>>
        </div>

        <div>
            <label for="libelle">LIBELLE</label>
            <input type="text" id='libelle' name="libelle" value="<?=$libelle?>" <?=$disabled?>>
        </div>

        <div class="div-btn">
            <a href="role">Retour à la liste</a>
            <input type="reset" value="Annuler" <?=$disabled?>>
            <input type="submit" value="Valider" <?=$disabled?>>
        </div>
    </form>
</div>
<script>

</script>