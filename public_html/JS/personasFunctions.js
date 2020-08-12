//*****************************************************************
//Inyección de eventos en el HTML
//*****************************************************************



$(function () { //para la creación de los controles
    //agrega los eventos las capas necesarias
    $("#enviar").click(function () {
        addOrUpdatePersonas(false);
    });
    //agrega los eventos las capas necesarias
    $("#cancelar").click(function () {
        cancelAction();
    });    //agrega los eventos las capas necesarias

});

//*********************************************************************
//cuando el documento esta cargado se procede a cargar la información
//*********************************************************************

$(document).ready(function () {
   // showALLPersonas(true);
    
});

//*********************************************************************
//Agregar o modificar la información
//*********************************************************************

function addOrUpdatePersonas() {
    //Se envia la información por ajax
    if (validar()) {
        $.ajax({
            url: '../backend/agenda/controller/personasController.php', 
            data: {
                quequiereHacerelsuaurio:           "registrarse",
                PK_cedula:      $("#txtPK_cedula").val(),
                nombre:         $("#txtnombre").val(),
                apellido1:      $("#txtapellido1").val(),
                apellido2:      $("#txtapellido2").val(),
                fecNacimiento:  $("#txtfecNacimiento").val(),
                sexo:           $("#txtsexo").val(),
                observaciones:  $("#txtobservaciones").val()
            },
            error: function () { //si existe un error en la respuesta del ajax
                swal("Error", "Se presento un error al enviar la informacion", "error");
            },
            success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
                var messageComplete = data.trim();
                var responseText = messageComplete.substring(2);
                var typeOfMessage = messageComplete.substring(0, 2);
                if (typeOfMessage === "M~") { //si todo esta corecto
                    swal("Confirmacion", responseText, "success");
                    //clearFormPersonas();
                    //showALLPersonas();
                } else {//existe un error
                    swal("Error", responseText, "error");
                }
            },
            type: 'POST'
        });
    }else{
        swal("Error de validación", "Los datos del formulario no fueron digitados, por favor verificar", "error");
    }
}



//*****************************************************************
//*****************************************************************
function validar() {
    var validacion = true;

    
    //valida cada uno de los campos del formulario
    //Nota: Solo si fueron digitados
    if ($("#txtPK_cedula").val() === "") {
        validacion = false;
    }

    if ($("#txtnombre").val() === "") {
        validacion = false;
    }

    if ($("#txtapellido1").val() === "") {
        validacion = false;
    }

    if ($("#txtapellido2").val() === "") {
        validacion = false;
    }

    if ($("#txtfecNacimiento").val() === "") {
        validacion = false;
    }

    if ($("#txtsexo").val() === "") {
        validacion = false;
    }

    if ($("#txtobservaciones").val() === "") {
        validacion = false;
    }


    return validacion;
}
