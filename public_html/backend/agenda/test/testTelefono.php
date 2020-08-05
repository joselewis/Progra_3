<?php

require_once ("../bo/telefonoBo.php");
require_once ("../domain/Telefonos.php");

$obj_telefono = new Telefono();
$obj_telefono->setidTelefono(88008800);
$obj_telefono->setPK_cedula(116160613);

$bo_telefono = new TelefonoBo();

$operacion = 1; //variable para pruebas

switch ($operacion) {
    case 1: //Prueba para guardar en la base de datos
        $bo_telefono->add($obj_telefono);
        echo("<h1>Prueba de agregar exitosa</h1>");
    break;

    case 2: //Prueba para modificar en la base de datos
        $bo_telefono->update($obj_telefono);
        echo("<h1>Prueba de modificar exitosa</h1>");
    break;

    case 3: //Prueba para eliminar en la base de datos
        $bo_telefono->delete($obj_telefono);
        echo("<h1>Prueba de eliminar exitosa</h1>");
    break;

    case 4: //Prueba para consultar en la base de datos
        $telefonoConsultada = $bo_telefono->searchById($bo_telefono);
        echo("<h1>Prueba de consultar por ID exitosa exitosa</h1>");
        echo (json_encode($telefonoConsultada));
    break;

    case 5: //Prueba para consultar todos en la base de datos
        $resutlado = $bo_telefono->getAll();
        echo("<h1>Prueba de consultar todos los registros exitosa</h1>");
        echo (json_encode($resutlado->GetArray()));
    break;

    default:
    break;
}
