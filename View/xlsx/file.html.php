<div class="container">
    <h1><?= $title ?></h1>
    <p><?= $p ?></p>

    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
        <input type="radio" class="btn-check" name="choice" id="people" autocomplete="off" value="people" />
        <label class="btn btn-outline-primary" for="people">People</label>

        <input type="radio" class="btn-check" name="choice" id="user" autocomplete="off" value="user" />
        <label class="btn btn-outline-primary" for="user">User</label>

        <input type="radio" class="btn-check" name="choice" id="article" autocomplete="off" value="article" />
        <label class="btn btn-outline-primary" for="article">Article</label>
    </div>

    <a name="" id="extraction" class="btn btn-primary" href="javascript:extract()" role="button">extraire</a>
</div>

<script>
    function extract() {
        let table = document.getElementsByName('choice');
        for (let i = 0; i < table.length; i++) {
            if (table[i].checked) {
                table = table[i].value;
            }
        }
        let href = "xlsx&action=extract";
        window.location.href = href;
    }
</script>