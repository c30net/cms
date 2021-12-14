window.addEventListener('DOMContentLoaded', (event) => {
    if(document.getElementById('used')){
        setTimeout(()=>{
            document.getElementById('used').className = 'hide';
        }, 5000);
    }
});


$(document).ready(function(){

    //editor ckeditor
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );
})

