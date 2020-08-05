<?php

require_once ("../bo/facturacionBo.php");
require_once ("../domain/facturacion.php");

$obj_facturacion = new Facturacion();
$obj_facturacion->setidFacturacion(12345);
$obj_facturacion->setFecha_Registro("04082020");
$obj_facturacion->setMonto_Total('86767');
$obj_facturacion->setUsuario_idUsuario("joselewis");
$bo_facturacion = new FacturacionBo();

$operacion = 1; //variable para pruebas

switch ($operacion) {
    case 1: //Prueba para guardar en la base de datos
        $bo_facturacion->add($obj_facturacion);
        echo("<h1>Prueba de agregar exitosa</h1>");
    break;

    case 2: //Prueba para modificar en la base de datos
        $bo_facturacion->update($obj_facturacion);
        echo("<h1>Prueba de modificar exitosa</h1>");
    break;

    case 3: //Prueba para eliminar en la base de datos
        $bo_facturacion->delete($obj_facturacion);
        echo("<h1>Prueba de eliminar exitosa</h1>");
    break;

    case 4: //Prueba para consultar en la base de datos
        $facturacionConsultada = $bo_facturacion->searchById($obj_facturacion);
        echo("<h1>Prueba de consultar por ID exitosa exitosa</h1>");
        echo (json_encode($facturacionConsultada));
    break;

    case 5: //Prueba para consultar todos en la base de datos
        $resutlado = $bo_facturacion->getAll();
        echo("<h1>Prueba de consultar todos los registros exitosa</h1>");
        echo (json_encode($resutlado->GetArray()));
    break;

    default:
    break;
}