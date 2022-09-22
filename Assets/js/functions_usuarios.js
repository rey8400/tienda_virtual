var tableUsuarios;

document.addEventListener('DOMContentLoaded', function () {

    tableUsuarios = $('#tableUsuarios').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": " " + base_url + "/Usuarios/getUsuarios",
            "dataSrc": ""
        },
        "columns": [
            { "data": "idpersona" },
            { "data": "nombres" },
            { "data": "apellidos" },
            { "data": "email_user" },
            { "data": "telefono" },
            { "data": "nombrerol" },
            { "data": "status" },
            { "data": "options" }
        ],
        "resonsieve": "true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]]
    });



    let formUsuario = document.querySelector("#formUsuario");
    formUsuario.onsubmit = function (e) {
        e.preventDefault();
        var strIdentificacion = document.querySelector('#txtIdentificacion').value;
        var strNombre = document.querySelector('#txtNombre').value;
        var strApellido = document.querySelector('#txtApellido').value;
        var strEmail = document.querySelector('#txtEmail').value;
        var intTelefono = document.querySelector('#txtTelefono').value;
        var intTipousuario = document.querySelector('#listRolid').value;
        var strPassword = document.querySelector('#txtPassword').value;

        if (strIdentificacion == '' || strApellido == '' || strNombre == '' || strEmail == '' || intTelefono == '' || intTipousuario == '') {
            swal("Atención", "Todos los campos son obligatorios.", "error");
            return false;
        }

        
        let elementsValid = document.getElementsByClassName("valid");
        for (let i = 0; i < elementsValid.length; i++) { 
            if(elementsValid[i].classList.contains('is-invalid')) { 
                swal("Atención", "Por favor verifique los campos en rojo." , "error");
                return false;
            } 
        } 

        let formData = new FormData(formUsuario);
        let ajaxUrl = base_url + '/Usuarios/setUsuario';
        fetch(ajaxUrl, {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(objData => {
                if (objData.status) {
                    $('#modalFormUsuario').modal("hide");
                    formUsuario.reset();
                    //tableUsuarios.ajax.reload(null, false);
                    tableUsuarios.api().ajax.reload(null, false);
                    swal("Usuarios", objData.msg, "success");
                } else {
                    swal("Error", objData.msg, "error");
                }
            })
            .catch(error => {
                swal("Oops!", "Ocurrio un error en el Sistema, por favor intentalo de nuevo más tarde.", "error");
                console.log("Error: ", error)
            })

    }
}, false);


window.addEventListener('load', function () {
    fntRolesUsuario();
    /*fntViewUsuario();
    fntEditUsuario();
    fntDelUsuario();*/

}, false);

//peticion para obtener los roles para el select
function fntRolesUsuario() {
    var ajaxUrl = base_url + '/Roles/getSelectRoles';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            document.querySelector('#listRolid').innerHTML = request.responseText;
            document.querySelector('#listRolid').value = 1;
            $('#listRolid').selectpicker('render');
        }
    }

}




function fntViewUsuario(idpersona) {

    var idpersona = idpersona;
    let ajaxUrl = base_url + '/Usuarios/getUsuario/' + idpersona
    fetch(ajaxUrl, {
        method: 'GET',

    })
        .then(response => response.json())
        .then(objData => {
            if (objData.status) {
                var estadoUsuario = objData.data.status == 1 ? //si es igual que uno imprime activo sino en inactivo
                    '<span class="badge badge-success">Activo</span>' :
                    '<span class="badge badge-danger">Inactivo</span>';

                document.querySelector("#celIdentificacion").innerHTML = objData.data.identificacion;
                document.querySelector("#celNombre").innerHTML = objData.data.nombres;
                document.querySelector("#celApellido").innerHTML = objData.data.apellidos;
                document.querySelector("#celTelefono").innerHTML = objData.data.telefono;
                document.querySelector("#celEmail").innerHTML = objData.data.email_user;
                document.querySelector("#celTipoUsuario").innerHTML = objData.data.nombrerol;
                document.querySelector("#celEstado").innerHTML = estadoUsuario;
                document.querySelector("#celFechaRegistro").innerHTML = objData.data.fechaRegistro;
                $('#modalViewUser').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        })
        .catch(error => {
            swal("Oops!", "Ocurrio un error en el Sistema, por favor intentalo de nuevo más tarde.", "error");
            console.log("Error: ", error)
        })

}

function fntEditUsuario(idpersona) {

    document.querySelector('#titleModal').innerHTML = "Actualizar Usuario";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";

    var idpersona = idpersona;
    let ajaxUrl = base_url + '/Usuarios/getUsuario/' + idpersona
    fetch(ajaxUrl, {
        method: 'GET',

    })
        .then(response => response.json())
        .then(objData => {
            if (objData.status) {

                document.querySelector("#idUsuario").value = objData.data.idpersona;
                document.querySelector("#txtIdentificacion").value = objData.data.identificacion;
                document.querySelector("#txtNombre").value = objData.data.nombres;
                document.querySelector("#txtApellido").value = objData.data.apellidos;
                document.querySelector("#txtTelefono").value = objData.data.telefono;
                document.querySelector("#txtEmail").value = objData.data.email_user;
                document.querySelector("#listRolid").value = objData.data.idrol;
                $('#listRolid').selectpicker('render');

                if (objData.data.status == 1) {
                    document.querySelector("#listStatus").value = 1;
                } else {
                    document.querySelector("#listStatus").value = 2;
                }
                $('#listStatus').selectpicker('render');

            }

            $('#modalFormUsuario').modal('show');
        })
        .catch(error => {
            swal("Oops!", "Ocurrio un error en el Sistema, por favor intentalo de nuevo más tarde.", "error");
            console.log("Error: ", error)
        })

}

//Eliminar Usuario
function fntDelUsuario(idpersona) {

    var idUsuario = idpersona;

    swal({
        title: "Eliminar Usuario",
        text: "¿Realmente quiere eliminar el Usuario?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {

        if (isConfirm) {


            let ajaxUrl = base_url + '/Usuarios/delUsuario'
            var strData = "idUsuario=" + idUsuario;
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
                        tableUsuarios.api().ajax.reload(null, false)

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




function openModal() {
    document.querySelector('#idUsuario').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Usuario";
    document.querySelector("#formUsuario").reset();
    $('#modalFormUsuario').modal('show');
}