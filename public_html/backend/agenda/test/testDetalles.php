<?php

require_once ("../bo/detallesBo.php");
require_once ("../domain/detalles.php");

$obj_detalles = new Detalles();
$obj_detalles->setidDetalle_Factura(116160613);
$obj_detalles->setSubTotal(10,5);
$obj_detalles->setIVA(5,2);
$obj_detalles->setDescuento(15,2);
$obj_detalles->setFacturacion_idFacturacion(1);
$obj_detalles->setViaje_idViaje(1);
$bo_detalles = new DetallesBo();

$operacion = 1; //variable para pruebas

switch ($operacion) {
    case 1: //Prueba para guardar en la base de datos
        $bo_detalles->add($obj_detalles);
        echo("<h1>Prueba de agregar exitosa</h1>");
    break;

    case 2: //Prueba para modificar en la base de datos
        $bo_detalles->update($obj_detalles);
        echo("<h1>Prueba de modificar exitosa</h1>");
    break;

    case 3: //Prueba para eliminar en la base de datos
        $bo_detalles->delete($obj_detalles);
        echo("<h1>Prueba de eliminar exitosa</h1>");
    break;

    case 4: //Prueba para consultar en la base de datos
        $detallesConsultada = $bo_detalles->searchById($obj_detalles);
        echo("<h1>Prueba de consultar por ID exitosa exitosa</h1>");
        echo (json_encode($detallesConsultadaConsultada));
    break;

    case 5: //Prueba para consultar todos en la base de datos
        $resutlado = $bo_detalles->getAll();
        echo("<h1>Prueba de consultar todos los registros exitosa</h1>");
        echo (json_encode($resutlado->GetArray()));
    break;
    default:
    break;
}
