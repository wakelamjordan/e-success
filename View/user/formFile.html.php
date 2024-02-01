<form action="user&action=save" method="POST" enctype="multipart/form-data">
    <div>
        <label for="id">ID</label>
        <input type="text" id="id" value="<?=$id?>" name="id" >
    </div>
    <div>
        <label for="login">LOGIN</label>
        <input type="text" id="login" value="<?=$login?>" name="login" <?=$disabled?>>
    </div>
    <div >
        <label for="photo">PHOTO</label>
        <img id="image_view" src="./upload/<?=$photo?>" alt="" width="200px" >
        <input type="file" id="photo" name="photo"  onChange="previewImage(event,'image_view')">
        <a href="javascript:choisir()">Choisir une photo</a>
    </div>
    <div>
        <label for="mail">MAIL</label>
        <input type="text" id="mail" value="<?=$login?>" name="mail" <?=$disabled?>>
    </div>
    <div>
        <label for="password">PASSWORD</label>
        <input type="password" id="password" name="password" value="<?=$password?>" <?=$disabled?>>
    </div>
    <div>
        <ul>
            <?php foreach($roles as $role): ?>
            <li> <input type="checkbox" name="roles[]" value="<?=$role['libelle']?>" <?=$disabled?> <?=$role['checked']?>><?=$role['libelle']?> </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="div-btn">
        <a href="user" class="btn btn-md btn-success">Retour à la liste</a>
        <input type="reset"  value="Annuler">
        <input type="submit" value="Valider">
    </div>
</form>

<script>
    function choisir(){
        photo.click();
    }

</script>