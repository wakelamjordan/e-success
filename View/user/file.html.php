<div class="container-fluid">

    <table class="">
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>login</th>
                <th>mail</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lignes as $ligne) : ?>
                <tr>
                    <td><input type="checkbox" name="user" id="<?= $ligne['id'] ?>" value="<?= $ligne['id'] ?>"></td>
                    <td><?= $ligne['id'] ?></td>
                    <td><?= $ligne['login'] ?></td>
                    <td><?= $ligne['mail'] ?></td>
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