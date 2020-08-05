<?php

require_once ("../bo/ConductorBo.php");
require_once ("../domain/Conductor.php");

$obj_Conductor = new Conductor();
$obj_Conductor->setidConductor(10005);
$obj_Conductor->setPlaca_Conductor("XFM1145");
$obj_Conductor->setModelo_Carro("Toyota Corrolla");
$obj_Conductor->setUsuario_idUsuario("joselewis");
$obj_Conductor->setActivo(1);
$obj_Conductor->setAnno_Vehiculo(2018);

$bo_Conductor = new ConductorBo();

$operacion = 1; //variable para pruebas

switch ($operacion) {
    case 1: //Prueba para guardar en la base de datos
        $bo_Conductor->add($obj_Conductor);
        echo("<h1>Prueba de agregar exitosa</h1>");
    break;

    case 2: //Prueba para modificar en la base de datos
        $bo_Conductor->update($obj_Conductor);
        echo("<h1>Prueba de modificar exitosa</h1>");
    break;

    case 3: //Prueba para eliminar en la base de datos
        $bo_Conductor->delete($obj_Conductor);
        echo("<h1>Prueba de eliminar exitosa</h1>");
    break;

    case 4: //Prueba para consultar en la base de datos
        $ConductorConsulta = $bo_Conductor->searchById($obj_Conductor);
        echo("<h1>Prueba de consultar por ID exitosa exitosa</h1>");
        echo (json_encode($ConductorConsulta));
    break;

    case 5: //Prueba para consultar todos en la base de datos
        $resutlado = $bo_Conductor->getAll();
        echo("<h1>Prueba de consultar todos los registros exitosa</h1>");
        echo (json_encode($resutlado->GetArray()));
    break;

    default:
    break;
}
