let tableClientes; 


document.addEventListener('DOMContentLoaded', function () {




    tableClientes = $('#tableClientes').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Clientes/getClientes",
            "dataSrc":""
        },
        "columns":[
            {"data":"idpersona"},
            {"data":"identificacion"},
            {"data":"nombres"},
            {"data":"apellidos"},
            {"data":"email_user"},
            {"data":"telefono"},
            {"data":"options"}
        ],
      
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]  
    });

    let formCliente = document.querySelector("#formCliente");
    formCliente.onsubmit = function (e) {
        e.preventDefault();
        let strIdentificacion = document.querySelector('#txtIdentificacion').value;
        let strNombre = document.querySelector('#txtNombre').value;
        let strApellido = document.querySelector('#txtApellido').value;
        let strEmail = document.querySelector('#txtEmail').value;
        let intTelefono = document.querySelector('#txtTelefono').value;
        let strNit = document.querySelector('#txtNit').value;
        let strNomFical = document.querySelector('#txtNombreFiscal').value;
        let strDirFiscal = document.querySelector('#txtDirFiscal').value;
        let strPassword = document.querySelector('#txtPassword').value;

        if(strIdentificacion == '' || strApellido == '' || strNombre == '' || strEmail == '' || intTelefono == '' || strNit == '' || strDirFiscal == '' || strNomFical=='' )
        {
            swal("Atención", "Todos los campos son obligatorios." , "error");
            return false;
        }

        let elementsValid = document.getElementsByClassName("valid");
        for (let i = 0; i < elementsValid.length; i++) { 
            if(elementsValid[i].classList.contains('is-invalid')) { 
                swal("Atención", "Por favor verifique los campos en rojo." , "error");
                return false;
            } 
        } 

        let formData = new FormData(formCliente);
        let ajaxUrl = base_url+'/Clientes/setCliente';
        fetch(ajaxUrl, {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(objData => {
                if (objData.status) {
                    $('#modalFormCliente').modal("hide");
                    formCliente.reset();
                   tableClientes.api().ajax.reload(null, false);
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



function fntViewInfo(idpersona) {

    var idpersona = idpersona;
    let ajaxUrl = base_url+'/Clientes/getCliente/'+idpersona;
    fetch(ajaxUrl, {
        method: 'GET',

    })
        .then(response => response.json())
        .then(objData => {
            if (objData.status) {
                document.querySelector("#celIdentificacion").innerHTML = objData.data.identificacion;
                document.querySelector("#celNombre").innerHTML = objData.data.nombres;
                document.querySelector("#celApellido").innerHTML = objData.data.apellidos;
                document.querySelector("#celTelefono").innerHTML = objData.data.telefono;
                document.querySelector("#celEmail").innerHTML = objData.data.email_user;
                document.querySelector("#celIde").innerHTML = objData.data.nit;
                document.querySelector("#celNomFiscal").innerHTML = objData.data.nombrefiscal;
                document.querySelector("#celDirFiscal").innerHTML = objData.data.direccionfiscal;
                document.querySelector("#celFechaRegistro").innerHTML = objData.data.fechaRegistro; 
                $('#modalViewCliente').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        })
        .catch(error => {
            swal("Oops!", "Ocurrio un error en el Sistema, por favor intentalo de nuevo más tarde.", "error");
            console.log("Error: ", error)
        })

}

function fntEditInfo(idpersona) {

    document.querySelector('#titleModal').innerHTML ="Actualizar Cliente";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";

    var idpersona = idpersona;
    let ajaxUrl = base_url+'/Clientes/getCliente/'+idpersona;
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
                document.querySelector("#txtNit").value =objData.data.nit;
                document.querySelector("#txtNombreFiscal").value =objData.data.nombrefiscal;
                document.querySelector("#txtDirFiscal").value =objData.data.direccionfiscal;
          
            }

            $('#modalFormCliente').modal('show');
        })
        .catch(error => {
            swal("Oops!", "Ocurrio un error en el Sistema, por favor intentalo de nuevo más tarde.", "error");
            console.log("Error: ", error)
        })

}

//Eliminar Usuario
function fntDelInfo(idpersona) {

    var idUsuario = idpersona;

    swal({
        title: "Eliminar Cliente",
        text: "¿Realmente quiere eliminar al cliente?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {

        if (isConfirm) {


            let ajaxUrl =  base_url+'/Clientes/delCliente';
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
                        tableClientes.api().ajax.reload(null, false)

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
    document.querySelector('#titleModal').innerHTML = "Nuevo Cliente";
    document.querySelector("#formCliente").reset();
    $('#modalFormCliente').modal('show');
}