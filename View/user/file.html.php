<div>
    <h1 >LISTE DES </h1>
    <div >
        <a >Nouveau Client</a>
        <a >Imprimer</a>
    </div>
    <table >
        <thead >
            <tr>
                <th>ID</th>
                <th>PHOTO</th>
                <th >LOGIN</th>
                <th >MAIL</th>
                <th >PASSWORD</th>
                <th >ACTIONS</th>
            </tr>
        </thead>
        <tbody >
            <?php foreach($lignes as $ligne): ?>
                <tr>
                    <td><?=$ligne['id']?></td>
                    <td><img src="../Public/upload/<?=$ligne['photo']?>" width="50px"></td>
                    <td><?=$ligne['login']?></td>
                    <td><?=$ligne['mail']?></td>
                    <td><?=$ligne['password']?></td>
                    <td >
                        <a href="user&action=show&id=<?=$ligne['id']?>">Afficher</a>
                        <a href="user&action=modify&id=<?=$ligne['id']?>">Modifier</a>
                        <button>Supprimer</button>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
        <tfoot id="tfoot_client">
            <tr class="bg_green">
                <th colspan="5" class="text-center">Nombre clients : <?=$nbr?></th>
            </tr>
        </tfoot>
    </table>
</div>

