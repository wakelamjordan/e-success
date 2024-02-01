
<div class="m-auto w80">
    <h1 class="titre text-light">LISTE ROLES</h1>
    <div class="div-btn my-2 print-none">
        <a href="javascript:creerRole()"> Nouveau Role</a>
        <a href="javascript:afficherRole()">Afficher</a>
        <a href="javascript:modifierRole()"> Modifier</a>
        <a href="javascript:supprimerRole()"> Supprimer</a>
        <a href="javascript:window.print()" > Imprimer</a>
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
            document.location.href="role&action=show&id="+id;
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

    function getIdChecked(name_element){
        let checkboxes=document.getElementsByName(name_element);
        let id=0;
        checkboxes.forEach((item)=>{
            if(item.checked==true){
                
                id=item.value;
                stop;
                }
    });

    return id;
}

    function onlyOne(checkbox){ // checkbox est l'élément sur le quel on va cliqué
        let checkboxes=document.getElementsByName(checkbox.name);
        checkboxes.forEach(function(item){
            if(item!=checkbox){// tester si item l'un des elements de checkboxes est different de checkbox selectionnée
                item.checked=false;
            }
        });

        checkbox.checked=true;
    }


</script>