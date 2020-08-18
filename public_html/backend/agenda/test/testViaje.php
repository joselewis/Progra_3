<?php
require_once ("../bo/viajeBo.php");
require_once ("../domain/viajes.php");

$obj_viaje = new Viajes();
$obj_viaje->setidViaje(1);
$obj_viaje->setUsuario_idUsuario("joselewis");
$obj_viaje->setLatitud_Origen(14,14);
$obj_viaje->setLongitud_Origen(13,131);
$obj_viaje->setLongitud_Destino(12,12);
$obj_viaje->setLatitud_Destino(11,11);

$bo_viaje = new ViajeBo();

$operacion = 1; //variable para pruebas

switch ($operacion) {
    case 1: //Prueba para guardar en la base de datos
        $bo_viaje->add($obj_viaje);
        echo("<h1>Prueba de agregar exitosa</h1>");
    break;

    case 2: //Prueba para modificar en la base de datos
        $bo_viaje->update($obj_viaje);
        echo("<h1>Prueba de modificar exitosa</h1>");
    break;

    case 3: //Prueba para eliminar en la base de datos
        $bo_viaje->delete($obj_viaje);
        echo("<h1>Prueba de eliminar exitosa</h1>");
    break;

    case 4: //Prueba para consultar en la base de datos
        $viajeConsultada = $bo_viaje->searchById($obj_viaje);
        echo("<h1>Prueba de consultar por ID exitosa exitosa</h1>");
        echo (json_encode($viajeConsultadaConsultada));
    break;

    case 5: //Prueba para consultar todos en la base de datos
        $resutlado = $bo_viaje->getAll();
        echo("<h1>Prueba de consultar todos los registros exitosa</h1>");
        echo (json_encode($resutlado->GetArray()));
    break;

    default:
    break;
}
