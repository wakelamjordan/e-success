function previewImage(event,id_image){
    const image=event.target.files[0];
    if(image){
        const elt_image=document.getElementById(id_image);
        elt_image.src=URL.createObjectURL(image);
    }
}