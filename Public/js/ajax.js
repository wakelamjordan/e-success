document.getElementById("formInscription").addEventListener("submit",(event)=>{

    event.preventDefault;
    if(ctrlFieldInscription(event)!==false){

        var formData= new FormData(this);

        // alert(formData);

        var xhr=new XMLHttpRequest();

        xhr.open("POST","acceuil&action=create");

        xhr.send(formData);


    }
})