<div>
    <h1 >LISTE DES </h1>
    <div >
        <a >Nouveau Client</a>
        <a >Imprimer</a>
    </div>
    <table >
        <thead >
            <tr>
                <th">ID</th>
                <th >CODE</th>
                <th >NOM</th>
                <th >ADRESSE</th>
                <th >ACTIONS</th>
            </tr>
        </thead>
        <tbody >
            <?php foreach($lignes as $ligne): ?>
                <tr>
                    <td><?=$ligne['id']?></td>
                    <td><?=$ligne['login']?></td>
                    <td><?=$ligne['mail']?></td>
                    <td><?=$ligne['password']?></td>
                    <td >
                        <a>Afficher</a>
                        <a >Modifier</a>
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

