
//méthode "GET"ou"POST"
//url path=xxxx&action=xxxx du controller php qui requêtera le serveur pour echo le résultat qui sera retourné par le callback variable dans laquel le résultat sera mis en valeur
// data un array qui contien des data à envoyer vers le serveur key=champs de table ou insérer, valeur = données
function xhr(method, url, callback, data = {}) {

    let formData;

    if (Object.keys(data).length === 0) {
        formData = new FormData();
        for (item in data) {
            formData.append(item, data[item]);
        }
    }

    let xhr = new XMLHttpRequest();

    xhr.open(method, url);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // console.log(xhr.responseText);
            // let donne = xhr.responseText;

            let donne = JSON.parse(xhr.responseText);
            // console.log(donne);
            // alert(donne.mail);
            callback(donne);
        }
    };

    if (formData) {
        xhr.send(formData);
    } else {
        xhr.send();
    }
}

