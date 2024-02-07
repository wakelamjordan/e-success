<!-- ------------------------------------ -->
<div class="d-flex justify-content-around  flex-column">
    <div class="container">
        <h1 class="my-5 align-middle">Gestion comptes utilisateurs</h1>
        <div class="p-1 d-flex justify-content-between flex-column flex-md-row">
            <a name="" id="" class="col-2a btn btn-primary my-1" href="javascript:add()" role="button"><i class="fas fa-user-plus fs-2"></i></a>
            <div class="d-flex flex-column flex-md-row">
                <a name="" id="" class="col-2a my-1 mx-md-1 btn btn-success" href="javascript:view()" role="button"><i class="fas fa-eye fs-2"></i></a>
                <a name="" id="" class="col-2a my-1 mx-md-1 btn btn-warning" href="javascript:modify()" role="button"><i class="fas fa-pencil fs-2 "></i></a>
                <a name="" id="" class="col-2a my-1 mx-md-1 btn btn-danger" href="javascript:drop()" role="button"><i class="fas fa-trash-can fs-2"></i></a>
            </div>
        </div>

        <div class="tbl-fixed overflow-auto">
            <table class="table table-hover table-striped text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th class="col-1 position-sticky top-0 m-0 " scope="col">
                            <!-- <div class="form-check"> -->
                            <input class="form-check-input" type="checkbox" value="" id="select_all" />
                            <!-- <label class="form-check-label" for="">sélectionner tout</label> -->
                            <!-- </div> -->
                        </th>
                        <th class="col-1 position-sticky top-0" scope="col">ID</th>
                        <th class="col-3 position-sticky top-0" scope="col">Photo</th>
                        <th class="col-3 position-sticky top-0" scope="col">Phone</th>
                        <th class="col-3 position-sticky top-0" scope="col">Mail</th>
                    </tr>
                </thead>
                <tbody class="">
                    <?php foreach ($lignes as $ligne) : ?>
                        <tr class="">
                            <td class="table-dark" scope="row">
                                <!-- <div class="bg-black"> -->
                                <input class="form-check-input" type="checkbox" value="<?= $ligne['id'] ?>" id="<?= $ligne['id'] ?>" name="user" />
                                <!-- </div> -->
                            </td>
                            <td><label for="<?= $ligne['id'] ?>"><?= $ligne['id'] ?></label></td>
                            <td><img src="./Public/upload/<?= $ligne['path'] ?>" alt="" class="img-fluid" style="height:60px"></td>
                            <td><label for="<?= $ligne['id'] ?>"><?= $ligne['phone'] ?></label></td>
                            <td><label for="<?= $ligne['id'] ?>"><?= $ligne['mail'] ?></label></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function add() {
        alert('add');
        // affiche un formulaire de création d'user
    }

    function view() {
        // alert('view');
        // controle qu'il n'y a qu'un seul user de coché sinon renvoi message de ne coché qu'un seul user
        // let count = count(checkboxes.checked == true);
        // alert(count);
        let count = 0;
        let id;
        checkboxes.forEach((checkbox) => {
            if (checkbox.checked == true) {
                count++;
                id = checkbox.id;
            }
        });

        

        if (count > 1 || count == 0) {
            alert("Pour afficher veuillez sélectionner qu'un seul compte.");
            return;
        };
        let url = `user&action=show&id=${id}`;

        // console.log(url);

        // return;

        let xhr = new XMLHttpRequest();

        xhr.open("GET", url);

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);

                let donne = JSON.parse(xhr.responseText);
                console.log(donne);
                alert(donne.mail);

            }
        };

        xhr.send();



        // récupére id de l'user selectionné
    }

    function modify() {
        alert('modify');
    }

    function drop() {
        alert('drop');
    }
    // si checkbox_all est coché coche toute les autres checkbox, si decoché il décoche tout
    select_all.addEventListener('change', function() {
        if (this.checked) {
            // alert("checked");
            checkboxes.forEach((checkbox) => {
                checkbox.checked = true;
            })
        } else {
            checkboxes.forEach((checkbox) => {
                checkbox.checked = false;
            })
        }
    })

    let checkboxes = document.querySelectorAll('input[type="checkbox"][name="user"]');
    // si un checkbox est décoché ça décoche automatiquement le checkbox_all
    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', function() {
            if (!this.checked) {
                select_all.checked = false;
            }
        })
    })
</script>



<!-- ------------------------------------ -->