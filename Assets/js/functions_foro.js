
var tablePost;
var tableComentarios;



    

    var formPost = document.querySelector("#formPost");
    formPost.onsubmit = function(e){
        e.preventDefault();
        var strTitulo = document.querySelector('#titulo').value;
        var stDescripcion = document.querySelector('#descripcion').value;
        var strContenido = document.querySelector('#contenido').value;
        var strAutor = document.querySelector('#autor').value;
        var dateFecha = document.querySelector('#fecha').value;
      

        if (strTitulo == '' || stDescripcion == '' || strContenido == '' || strAutor == '' || dateFecha == '') {
            swal("Atención", "Todos los campos son obligatorios.", "error");
            return false;
        }

        var request =(window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url + '/Foro/setForo';
        var formData = new FormData(formPost);
        request.open("POST",ajaxUrl,true);
        request.send(formData);

        request.onreadystatechange = function(){
           if(request.readyState == 4 && request.status ==200){
            var objData =JSON.parse(request.responseText);
            if (objData.status) {
                $('#modalMostrarPost').modal("hide");
                formPost.reset();
                swal("post ", objData.msg, "success");
   
                window.location.reload(true);
                
            }else{
                swal("Error ", objData.msg, "error");
            }
           } 
        }
    }






window.addEventListener('load', function () {
    //fntRolesUsuario();
    fntViewPost();
    /*fntViewUsuario();
    fntEditUsuario();
    fntDelUsuario();*/

}, false);

function fntViewPost(){
    var btnViewPost = document.querySelectorAll(".btnViewPost");
    btnViewPost.forEach(function(btnViewPost){

        btnViewPost.addEventListener('click',function(){

            var id = this.getAttribute("us");
            var request =(window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Foro/getPos/'+id;
            request.open("GET",ajaxUrl,true);
            request.send(); 

        
            request.onreadystatechange = function(){
                if (request.status == 200) {
                    var objData = JSON.parse(request.responseText);       
                    if (objData.status) {
                        var estadopost = objData.data.status == 1 ? //si es igual que uno imprime activo sino en inactivo
                        '<span class="badge badge-success">Activo</span>' :
                        '<span class="badge badge-danger">Inactivo</span>';

                document.querySelector("#postID").value = objData.data.id;
                document.querySelector("#postTitulo").innerHTML = objData.data.tutulo;
                document.querySelector("#postDescripcion").innerHTML = objData.data.descripcion;
                document.querySelector("#postContenido").innerHTML = objData.data.contenido;
                document.querySelector("#postAutor").innerHTML = objData.data.autor;
               // document.querySelector("#usuarioC").value = objData.data.autor;
                document.querySelector("#postFecha").innerHTML = objData.data.fecha;
                //document.querySelector("#fechaC").value = objData.data.fecha;
                $('#modalViewPost').modal('show');
                    }  
                    else{
                        swal("error",objData.msg, "error");
                    }           
                }
            }

           


        });
    });
}



function openModal() {

    $('#modalMostrarPost').modal('show');
}


