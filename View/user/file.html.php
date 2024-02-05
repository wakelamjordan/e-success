<div>
    <h1>LISTE DES </h1>
    <div>
        <a href="user&action=insert">Nouveau User</a>
        <a href="javascript:window.print()">Imprimer</a>
    </div>
    <table class="w-100">
        <thead>
            <tr>
                <th>ID</th>
                <th>PHOTO</th>
                <th>PHONE</th>
                <th>MAIL</th>
                <th>ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lignes as $ligne) : ?>
                <tr>
                    <td><?= $ligne['id'] ?></td>
                    <td><img src="./Public/upload/<?= $ligne['path'] ?>" width="50px"></td>
                    <td><?= $ligne['phone'] ?></td>
                    <td><?= $ligne['mail'] ?></td>
                    <td>
                        <a href="user&action=show&id=<?= $ligne['id'] ?>">Afficher</a>
                        <a href="user&action=modify&id=<?= $ligne['id'] ?>">Modifier</a>
                        <button onclick="supprimer(<?= $ligne['id'] ?>)">Supprimer</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot id="tfoot_client">
            <tr class="bg_green">
                <th colspan="5" class="text-center">Nombre clients : <?= $nbr ?></th>
            </tr>
        </tfoot>
    </table>
</div>

<script>
    function supprimer(id) {
        const response = confirm("Voulez-vous bien supprimer ce user?");
        if (response) {
            document.location.href = "user&action=delete&id=" + id;
        }
    }
</script>