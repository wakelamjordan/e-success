
<div class="m-auto w80">
    <h1 class="titre text-light">LISTE ROLES</h1>
    <div class="div-btn my-2 print-none">
        <a href="javascript:creerRole()"  class="btn btn-md btn-success"><i class="fas fa-cart-plus" ></i> Nouveau Role</a>
        <a href="javascript:afficherRole()"  class="btn btn-md btn-primary"><i class="fas fa-shower" ></i>Afficher</a>
        <a href="javascript:modifierRole()"  class="btn btn-md btn-primary"><i class="fa fa-pen"></i> Modifier</a>
        <a href="javascript:supprimerRole()"  class="btn btn-md btn-danger"><i class="fa fa-trash"></i> Supprimer</a>
        <a href="javascript:window.print()"  class="btn btn-md btn-primary"><i class="fa fa-print" ></i> Imprimer</a>
    </div>
    <table class="w100 table-responsive">
        <thead id="thead_role">
            <tr class="bg_navy">
                <td class="w10 left">CHOIX</td>
                <td class="w10 left">ID</td>
                <td class="w20 left">RANG</td>
                <td class="w60 left">LIBELLE</td>                                
            </tr>
        </thead>
        <tbody id="tbody_role">
            <?php foreach($lignes as $ligne): ?>
                <tr>
                    <td class="left"> <input type="checkbox" id="<?=$ligne['id']?>" name="role" value="<?=$ligne['id']?>" onclick="onlyOne(this)"  > </td>
                    <td class="left"> <label for="<?=$ligne['id']?>"> <?=$ligne['id']?></label> </td>
                    <td class="left"> <label for="<?=$ligne['id']?>"> <?=$ligne['rang']?></label> </td>
                    <td class="left"> <label for="<?=$ligne['id']?>"> <?=$ligne['libelle']?></label> </td>
                </tr>
            <?php endforeach;?>
        </tbody>
        <tfoot id="tfoot_role">
            <tr class="bg_navy">
                <th colspan="5" class="text-center">Nombre roles : <?=$nbre?></th>
            </tr>
        </tfoot>
    </table>
</div>


<script>
    function creerRole(){
        document.location.href="role&action=insert";
    }
    function supprimerRole(){
        let id=getIdChecked('role');
        if(id==0){
            alert("Vous devez cocher une ligne à supprimer");
        }else{
            const response=confirm("Voulez-vous vraiement supprimer ce role?");
            if(response){
                document.location.href="role&action=delete&id="+id;
            }
        }
    }
    function afficherRole(){
        let id=getIdChecked('role');
        if(id==0){
            alert("Vous devez cocher une ligne à afficher");
        }else{
            document.location.href="role_type&action=show&id="+id;
        }

    }
    function modifierRole(){
        let id=getIdChecked('role');
       
         if(id==0) {
             alert("Selectionnez bien une ligne");
         }else{
            
            document.location.href="role&action=update&id="+id;
         }      
         


    }

    function touche(event){
        if(event.keyCode==13){
            chercher();
        }
    }
  function supprimer(){
    const response=confirm("Voulez-vous bien supprimer ce role?");
    if(response){
        document.location.href="role&action=delete&id="+id;
    }
  }
  function chercher(){
    document.location.href="role&action=search&mot="+mot.value;
}
</script>