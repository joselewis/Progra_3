<?php

require_once("../bo/personasBo.php");
require_once("../domain/personas.php");
require_once("../bo/UsuarioBo.php");
require_once("../domain/Usuario.php");


//************************************************************
// Personas Controller 
//************************************************************

if (filter_input(INPUT_POST, 'quequiereHacerelsuaurio') != null) {
    $action = filter_input(INPUT_POST, 'quequiereHacerelsuaurio');

    try {
        $myPersonasBo = new PersonasBo();
        $myPersonas = Personas::createNullPersonas();
        $myUsuariosBo = new UsuarioBo();
        $myUsuarios= Usuario::createNullUsuario();

        //***********************************************************
        //choose the action
        //***********************************************************

        if ($action === "registrarse" or $action === "update_Usuario") {
            //se valida que los parametros hayan sido enviados por post
            echo("Aqui");
            if ((filter_input(INPUT_POST, 'PK_cedula') != null) && (filter_input(INPUT_POST, 'nombre') != null) && (filter_input(INPUT_POST, 'apellido1') != null) && (filter_input(INPUT_POST, 'apellido2') != null) && (filter_input(INPUT_POST, 'fecNacimiento') != null) && (filter_input(INPUT_POST, 'sexo') != null)) {
                //$personasguardar = Personas::createPersonas();
                $myPersonas->setPK_cedula(filter_input(INPUT_POST, 'PK_cedula'));
                $myPersonas->setnombre(filter_input(INPUT_POST, 'nombre'));
                $myPersonas->setapellido1(filter_input(INPUT_POST, 'apellido1'));
                $myPersonas->setapellido2(filter_input(INPUT_POST, 'apellido2'));
                $myPersonas->setfecNacimiento(filter_input(INPUT_POST, 'fecNacimiento'));
                $myPersonas->setsexo(filter_input(INPUT_POST, 'sexo'));
                $myPersonas->setLastUser('112540148');
                $myUsuarios->setidUsuario(filter_input(INPUT_POST, 'idUsuario'));
                $myUsuarios->setContrasenna(filter_input(INPUT_POST,'Contrasenna'));
                $myUsuarios->setPersona_IDCedula(filter_input(INPUT_POST,'PK_cedula'));
                $myUsuarios->setTipo_Usuario(filter_input(INPUT_POST,'Tipo_Usuario'));
                echo("ho");
                if ($action == "registrarse") {
                    $myPersonasBo->add($myPersonas);
                    $myUsuariosBo -> add($myUsuarios);
                    echo('M~Registro Incluido Correctamente');
                }
                if ($action == "update_personas") {
                    $myPersonasBo->update($myPersonas);
                    echo('M~Registro Modificado Correctamente');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "showAll_personas") {//accion de consultar todos los registros
            $resultDB   = $myPersonasBo->getAll();
            $json       = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if($resultDB->RecordCount() === 0){
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }

        //***********************************************************
        //***********************************************************

        
        if ($action === "show_personas") {//accion de mostrar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'PK_cedula') != null) {
                $myPersonas->setPK_cedula(filter_input(INPUT_POST, 'PK_cedula'));
                $myPersonas = $myPersonasBo->searchById($myPersonas);
                if ($myPersonas != null) {
                    echo json_encode(($myPersonas));
                } else {
                    echo('E~NO Existe un cliente con el ID especificado');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "delete_personas") {//accion de eliminar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'PK_cedula') != null) {
                $myPersonas->setPK_cedula(filter_input(INPUT_POST, 'PK_cedula'));
                $myPersonasBo->delete($myPersonas);
                echo('M~Registro Fue Eliminado Correctamente');
            }
        }

        //***********************************************************
        //se captura cualquier error generado
        //***********************************************************
    } catch (Exception $e) { //exception generated in the business object..
        echo("E~" . $e->getMessage());
    }
} else {
    echo('M~Parametros no enviados desde el formulario - Prueba'); //se codifica un mensaje para enviar
}
?>
