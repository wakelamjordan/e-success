<form action="POST" enctype="multipart/form-data">
    <div>
        <label for="id">ID</label>
        <input type="text" value="<?=$id?>" name="id" $disabled>
    </div>
    <div>
        <label for="login">LOGIN</label>
        <input type="text" value="<?=$login?>" name="login" $disabled>
    </div>
    <div class="my-2">
        <label for="photo" class="lab30">PHOTO</label>
        <img id="image_view" src="Public/upload/<?=$photo?>" alt="" width="200px" >
        <input type="file" id="photo" name="photo"  onChange="previewImage(event,'image_view')"  >
        <a href="javascript:choisir()">Choisir une photo</a>
    </div>
    <div>
        <label for="mail">MAIL</label>
        <input type="text" value="<?=$login?>" name="mail" $disabled>
    </div>
    <div>
        <label for="password">PASSWORD</label>
        <input type="password" value="<?=$password?>" $disabled>
    </div>
    <div>
        <ul>
            <? foreach($roles as $role): ?>
            <li> <input type="checkbox" name="roles[]" value="<?=role['libelle']?>" <?=$role['checked']?>><?=role['libelle']?> </li>
            <? endforeach; ?>
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