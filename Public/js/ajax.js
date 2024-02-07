// document.getElementById("formInscription").addEventListener("submit", (event) => {
//     // event.preventDefault();
//     if (ctrlFieldInscription(event) !== false) {
//       var formData = new FormData(this);

//       // alert(formData);

//       var xhr = new XMLHttpRequest();

//       xhr.onload = function () {
//         var response = JSON.parse(xhr.responseText);
//         let message = response.message;
//         document.getElementById("message").innerHTML = message;
//       };
//       xhr.open("POST", "acceuil&action=create");

//       xhr.send(formData);

//         event.preventDefault();

//       // (xhr.onload)=>{
//       //     var response=xhr.responseText;
//       // };
//     }
//   });

