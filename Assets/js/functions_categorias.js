let tableCategorias;

document.addEventListener('DOMContentLoaded',function(){

    tableCategorias = $('#tableCategorias').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Categorias/getCategorias",
            "dataSrc":""
        },
        "columns":[
            {"data":"idcategoria"},
            {"data":"nombre"},
            {"data":"descripcion"},
            {"data":"status"},
            {"data":"options"}
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]  
    });

    if(document.querySelector("#foto")){
        var foto = document.querySelector("#foto");
        foto.onchange = function(e) {
            var uploadFoto = document.querySelector("#foto").value;
            var fileimg = document.querySelector("#foto").files;
            var nav = window.URL || window.webkitURL;
            var contactAlert = document.querySelector('#form_alert');
            if(uploadFoto !=''){
                var type = fileimg[0].type;
                var name = fileimg[0].name;
                if(type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png'){
                    contactAlert.innerHTML = '<p class="errorArchivo">El archivo no es válido.</p>';
                    if(document.querySelector('#img')){
                        document.querySelector('#img').remove();
                    }
                    document.querySelector('.delPhoto').classList.add("notBlock");
                    foto.value="";
                    return false;
                }else{  
                        contactAlert.innerHTML='';
                        if(document.querySelector('#img')){
                            document.querySelector('#img').remove();
                        }
                        document.querySelector('.delPhoto').classList.remove("notBlock");
                        var objeto_url = nav.createObjectURL(this.files[0]);
                        document.querySelector('.prevPhoto div').innerHTML = "<img id='img' src="+objeto_url+">";
                    }
            }else{
                alert("No selecciono foto");
                if(document.querySelector('#img')){
                    document.querySelector('#img').remove();
                }
            }
        }
    }
    
    if(document.querySelector(".delPhoto")){
        var delPhoto = document.querySelector(".delPhoto");
        delPhoto.onclick = function(e) {
            removePhoto();
        }
    }
    


    //SET CATEGORIA 
    let formCategoria = document.querySelector("#formCategoria");
    formCategoria.onsubmit = function (e) {
        e.preventDefault();
        let strNombre = document.querySelector('#txtNombre').value;
        let strDescripcion = document.querySelector('#txtDescripcion').value;
        let intStatus = document.querySelector('#listStatus').value;     

        if(strNombre == '' || strDescripcion == '' || intStatus == '')
        {
            swal("Atención", "Todos los campos son obligatorios." , "error");
            return false;
        }

        let formData = new FormData(formCategoria);
        let ajaxUrl = base_url+'/Categorias/setCategoria';
        fetch(ajaxUrl, {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(objData => {
                if (objData.status) {

                    $('#modalFormCategorias').modal("hide");
                    formCategoria.reset();
                   tableCategorias.api().ajax.reload(null, false);
                   removePhoto();

                    swal("Categoria", objData.msg, "success");

                } else {
                    swal("Error", objData.msg, "error");
                }
            })
            .catch(error => {
                swal("Oops!", "Ocurrio un error en el Sistema, por favor intentalo de nuevo más tarde.", "error");
                console.log("Error: ", error)
            })

    }
    

},false);

//ver Categoria
function fntViewInfo(idcategoria) {

    var idcategoria = idcategoria;
    let ajaxUrl = base_url+'/Categorias/getCategoria/'+idcategoria;
    fetch(ajaxUrl, {
        method: 'GET',

    })
        .then(response => response.json())
        .then(objData => {
            if (objData.status) {
                let estado = objData.data.status == 1 ? 
                '<span class="badge badge-success">Activo</span>' : 
                '<span class="badge badge-danger">Inactivo</span>';
                document.querySelector("#celId").innerHTML = objData.data.idcategoria;
                document.querySelector("#celNombre").innerHTML = objData.data.nombre;
                document.querySelector("#celDescripcion").innerHTML = objData.data.descripcion;
                document.querySelector("#celEstado").innerHTML = estado;
                document.querySelector("#imgCategoria").innerHTML = '<img src="'+objData.data.url_portada+'"></img>';
                $('#modalViewCategoria').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        })
        .catch(error => {
            swal("Oops!", "Ocurrio un error en el Sistema, por favor intentalo de nuevo más tarde.", "error");
            console.log("Error: ", error)
        })

}

function fntEditInfo(idcategoria) {

    document.querySelector('#titleModal').innerHTML ="Actualizar Categoría";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";

    var idcategoria = idcategoria;
    let ajaxUrl = base_url+'/Categorias/getCategoria/'+idcategoria;
    fetch(ajaxUrl, {
        method: 'GET',

    })
        .then(response => response.json())
        .then(objData => {
            if (objData.status) {

                document.querySelector("#idCategoria").value = objData.data.idcategoria;
                document.querySelector("#txtNombre").value = objData.data.nombre;
                document.querySelector("#txtDescripcion").value = objData.data.descripcion;
                document.querySelector('#foto_actual').value = objData.data.portada;
                document.querySelector("#foto_remove").value= 0;

                if(objData.data.status == 1){
                    document.querySelector("#listStatus").value = 1;
                }else{
                    document.querySelector("#listStatus").value = 2;
                }
                $('#listStatus').selectpicker('render');

                if(document.querySelector('#img')){
                    document.querySelector('#img').src = objData.data.url_portada;
                }else{
                    document.querySelector('.prevPhoto div').innerHTML = "<img id='img' src="+objData.data.url_portada+">";
                }

                if(objData.data.portada == 'portada_categoria.png'){
                    document.querySelector('.delPhoto').classList.add("notBlock");
                }else{
                    document.querySelector('.delPhoto').classList.remove("notBlock");
                }

                $('#modalFormCategorias').modal('show');

            }else{
                swal("Error", objData.msg , "error");
            }
        })
        .catch(error => {
            swal("Oops!", "Ocurrio un error en el Sistema, por favor intentalo de nuevo más tarde.", "error");
            console.log("Error: ", error)
        })

}

//Eliminar Usuario
function fntDelInfo(idcategoria) {

    var idcategoria = idcategoria;

    swal({
        title: "Eliminar Categoría",
        text: "¿Realmente quiere eliminar al categoría?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {

        if (isConfirm) {


            let ajaxUrl =  base_url+'/Categorias/delCategoria';
            var strData = "idCategoria="+idcategoria;
            fetch(ajaxUrl, {
                method: 'POST',
                headers:{

                    'Content-Type':'application/x-www-form-urlencoded',
                },
                body: strData

            })
                .then(response => response.json())
                .then(objData => {
                    if (objData.status) {

                        swal("Eliminar!", objData.msg, "success");
                        tableCategorias.api().ajax.reload(null, false)

                    } else {
                        swal("Atención!", objData.msg, "error");
                    }

                })
                .catch(error => {
                    swal("Oops!", "Ocurrio un error en el Sistema, por favor intentalo de nuevo más tarde.", "error");
                    console.log("Error: ", error)
                })

        }

    });


}

function removePhoto(){
    document.querySelector('#foto').value ="";
    document.querySelector('.delPhoto').classList.add("notBlock");
    document.querySelector('#img').remove();
}

function openModal() {
    document.querySelector('#idCategoria').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nueva Categoria";
    document.querySelector("#formCategoria").reset();
    $('#modalFormCategorias').modal('show');
    removePhoto();
}

