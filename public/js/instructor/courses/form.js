 //Slug automático
 document.getElementById("title").addEventListener('keyup', slugChange);

 function slugChange(){
     
     title = document.getElementById("title").value;
     document.getElementById("slug").value = slug(title);

 }

 function slug (str) {
     var $slug = '';
     var trimmed = str.trim(str);
     $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
     replace(/-+/g, '-').
     replace(/^-|-$/g, '');
     return $slug.toLowerCase();
 }


 //CKEDITOR

 ClassicEditor
     .create( document.querySelector( '#description' ), {
         toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'blockQuote' ],
         heading: {
             options: [
                 { model: 'paragraph', title: 'Parrafo', class: 'ck-heading_paragraph' },
                 { model: 'heading1', view: 'h1', title: 'Titulo 1', class: 'ck-heading_heading1' },
                 { model: 'heading2', view: 'h2', title: 'Titulo 2', class: 'ck-heading_heading2' }
             ]
         }
     } )
     .catch( error => {
         console.log( error );
     } );

 //Cambiar imagen
 document.getElementById("file").addEventListener('change', cambiarImagen);

 function cambiarImagen(event){
     var file = event.target.files[0]; //Recupera la informacion de la imagen y la transforma a base 64 

     var reader = new FileReader();
     reader.onload = (event) => {
         document.getElementById("picture").setAttribute('src', event.target.result); 
     };

     reader.readAsDataURL(file);
 }