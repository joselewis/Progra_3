<?php

require_once ("../bo/UsuarioBo.php");
require_once ("../domain/Usuario.php");

$obj_Usuario = new Usuario();
$obj_Usuario->setidUsuario("joselewis");
$obj_Usuario->setPersona_IDCedula(116160613);
$obj_Usuario->setTipo_Usuario('Usuario');
$obj_Usuario->setContrasenna("12345");
$obj_Usuario->setLat(1,1);
$obj_Usuario->setLong(1,2);

$bo_Usuario = new UsuarioBo();

$operacion = 1; //variable para pruebas

switch ($operacion) {
    case 1: //Prueba para guardar en la base de datos
        $bo_Usuario->add($obj_Usuario);
        echo("<h1>Prueba de agregar exitosa</h1>");
    break;

    case 2: //Prueba para modificar en la base de datos
        $bo_Usuario->update($obj_Usuario);
        echo("<h1>Prueba de modificar exitosa</h1>");
    break;

    case 3: //Prueba para eliminar en la base de datos
        $bo_Usuario->delete($obj_Usuario);
        echo("<h1>Prueba de eliminar exitosa</h1>");
    break;

    case 4: //Prueba para consultar en la base de datos
        $UsuarioConsulta = $bo_Usuario->searchById($obj_Usuario);
        echo("<h1>Prueba de consultar por ID exitosa exitosa</h1>");
        echo (json_encode($UsuarioConsulta));
    break;

    case 5: //Prueba para consultar todos en la base de datos
        $resutlado = $bo_Usuario->getAll();
        echo("<h1>Prueba de consultar todos los registros exitosa</h1>");
        echo (json_encode($resutlado->GetArray()));
    break;

    default:
    break;
}
