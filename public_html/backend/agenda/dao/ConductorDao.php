<?php

require_once("../../utlis/utils.php");
require_once("../../utlis/config.php");
require_once("../../utlis/connections/uia_agenda.php");
require_once("../domain/Conductor.php");


//this attribute enable to see the SQL's executed in the data base
$labAdodb->debug=true;

class ConductorDao {

    public function __construct() {
        
    }

    //***********************************************************
    //Agrega a un conductor a la base de datos
    //***********************************************************

    public function add(Conductor $Conductor) {

        global $labAdodb;
        try {
            $sql = sprintf("insert into Conductor (idConductor, Placa_Conductor, Modelo_Carro, Usuario_idUsuario, Activo, Anno_Vehiculo) 
                                          values (%s,%s,%s,%s,%s,%s)",
                    $labAdodb->Param("idConductor"),
                    $labAdodb->Param("Placa_Conductor"),
                    $labAdodb->Param("Modelo_Carro"),
                    $labAdodb->Param("Usuario_idUsuario"),
                    $labAdodb->Param("Activo"),
                    $labAdodb->Param("Anno_Vehiculo"));
            $sqlParam = $labAdodb->Prepare($sql);

            $valores = array();

            $valores["idConductor"]       = $Conductor->getidConductor();
            $valores["Placa_Conductor"]          = $Conductor->getPlaca_Conductor();
            $valores["Modelo_Carro"]       = $Conductor->getModelo_Carro();
            $valores["Usuario_idUsuario"]       = $Conductor->getUsuario_idUsuario();
            $valores["Activo"]   = $Conductor->getActivo();
            $valores["Anno_Vehiculo"]            = $Conductor->getAnno_Vehiculo();

            $labAdodb->Execute($sqlParam, $valores) or die($labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase ConductorDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //Verificar si un Conductor existe en la Base de Datos
    //***********************************************************

    public function exist(Conductor $Conductor) {

        global $labAdodb;
        $exist = false;
        try {
            $sql = sprintf("select * from Conductor where  idConductor = %s ",
                            $labAdodb->Param("idConductor"));
            $sqlParam = $labAdodb->Prepare($sql);

            $valores = array();
            $valores["idConductor"] = $Conductor->getidConductor();

            $resultSql = $labAdodb->Execute($sqlParam, $valores) or die($labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase ConductorDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //Modificar a un Conductor en la Base de Datos
    //***********************************************************

    public function update(Conductor $Conductor) {

        global $labAdodb;
        try {
            $sql = sprintf("update Conductor set Placa_Conductor = %s, 
                                                Modelo_Carro = %s, 
                                                Usuario_idUsuario = %s, 
                                                Activo = %s, 
                                                Anno_Vehiculo = %s
                            where idConductor = %s",
                    $labAdodb->Param("Placa_Conductor"),
                    $labAdodb->Param("Modelo_Carro"),
                    $labAdodb->Param("Usuario_idUsuario"),
                    $labAdodb->Param("Activo"),
                    $labAdodb->Param("Anno_Vehiculo"),
                    $labAdodb->Param("idConductor"));
            $sqlParam = $labAdodb->Prepare($sql);

            $valores = array();

            $valores["Placa_Conductor"]          = $Conductor->getPlaca_Conductor();
            $valores["Modelo_Carro"]       = $Conductor->getModelo_Carro();
            $valores["Usuario_idUsuario"]       = $Conductor->getUsuario_idUsuario();
            $valores["Activo"]   = $Conductor->getActivo();
            $valores["Anno_Vehiculo"]            = $Conductor->getAnno_Vehiculo();
            $valores["idConductor"]       = $Conductor->getidconductor();
            $labAdodb->Execute($sqlParam, $valores) or die($labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase ConductorDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //Elimina a un Conductor de la Base de Datos
    //***********************************************************

    public function delete(Conductor $Conductor) {

        global $labAdodb;
        try {
            $sql = sprintf("delete from Conductor where  idConductor = %s",
                            $labAdodb->Param("idConductor"));
            $sqlParam = $labAdodb->Prepare($sql);

            $valores = array();

            $valores["idConductor"] = $Conductor->getidConductor();

            $labAdodb->Execute($sqlParam, $valores) or die($labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase ConductorDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //Buscar a un Conductor en la Base de Datos
    //***********************************************************

    public function searchById(Conductor $Conductor) {

        global $labAdodb;
        $returnConductor = null;
        try {
            $sql = sprintf("select * from Conductor where  idConductor = %s",
                            $labAdodb->Param("idConductor"));
            $sqlParam = $labAdodb->Prepare($sql);

            $valores = array();

            $valores["idConductor"] = $Conductor->getidConductor();

            $resultSql = $labAdodb->Execute($sqlParam, $valores) or die($labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnConductor = Conductor::createNullConductor();
                $returnConductor->setidConductor($resultSql->Fields("idConductor"));
                $returnConductor->setPlaca_Conductor($resultSql->Fields("Placa_Conductor"));
                $returnConductor->setModelo_Carro($resultSql->Fields("Modelo_Carro"));
                $returnConductor->setUsuario_idUsuario($resultSql->Fields("Usuario_idUsuario"));
                $returnConductor->setActivo($resultSql->Fields("Activo"));
                $returnConductor->setAnno_Vehiculo($resultSql->Fields("Anno_Vehiculo"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase ConductorDao), error:'.$e->getMessage());
        }
        return $returnConductor;
    }

    //***********************************************************
    //Obtener la informacion de los Conductores de la Base de Datos
    //***********************************************************
    
    public function getAll() {

        global $labAdodb;
        try {
            $sql = sprintf("select * from Conductor");
            $resultSql = $labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase ConductorDao), error:'.$e->getMessage());
        }
    }

}
