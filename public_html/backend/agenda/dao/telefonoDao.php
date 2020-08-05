<?php

require_once("../../utlis/utils.php");
require_once("../../utlis/config.php");
require_once("../../utlis/connections/uia_agenda.php");
require_once("../domain/Telefonos.php");


//this attribute enable to see the SQL's executed in the data base
$labAdodb->debug=true;

class TelefonoDao {

    public function __construct() {
        
    }

    //***********************************************************
    //agrega un teléfono a la base de datos
    //***********************************************************

    public function add(Telefono $telefonos) {

        global $labAdodb;
        try {
            $sql = sprintf("insert into telefono (idTelefono, Fecha_Actualizacion, Personas_PK_cedula) 
                                          values (%s,CURDATE(),%s)",
                    $labAdodb->Param("idTelefono"),
                    $labAdodb->Param("PK_cedula"));
            $sqlParam = $labAdodb->Prepare($sql);

            $valores = array();

            $valores["idTelefono"]       = $telefonos->getidTelefono();
            $valores["PK_cedula"]        = $telefonos->getPK_cedula();

            $labAdodb->Execute($sqlParam, $valores) or die($labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase TelefonoDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si una persona existe en la base de datos por ID
    //***********************************************************

    public function exist(Telefono $telefonos) {

        global $labAdodb;
        $exist = false;
        try {
            $sql = sprintf("select * from telefono where  idTelefono = %s ",
                            $labAdodb->Param("idTelefono"));
            $sqlParam = $labAdodb->Prepare($sql);

            $valores = array();
            $valores["idTelefono"] = $telefonos->getidTelefono();

            $resultSql = $labAdodb->Execute($sqlParam, $valores) or die($labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase TelefonoDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //modifica una persona en la base de datos
    //***********************************************************

    public function update(Telefono $telefonos) {

        global $labAdodb;
        try {
            $sql = sprintf("update telefono set idTelefono = %s, 
                                              Fecha_Actualizacion = CURDATE()
                            where Personas_PK_cedula = %s",
                    
                    $labAdodb->Param("Fecha_Actualizacion"),
                    $labAdodb->Param("idTelefono"),
                    $labAdodb->Param("PK_cedula"));
                   
            $sqlParam = $labAdodb->Prepare($sql);

            $valores = array();

            
            $valores["idTelefono"]       = $telefonos->getidTelefono();
            $valores["PK_cedula"]       = $telefonos->getPK_cedula();
            $labAdodb->Execute($sqlParam, $valores) or die($labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase TelefonoDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //elimina una persona en la base de datos
    //***********************************************************

    public function delete(Telefono $telefonos) {

        global $labAdodb;
        try {
            $sql = sprintf("delete from telefono where  idTelefono = %s",
                            $labAdodb->Param("idTelefono"));
            $sqlParam = $labAdodb->Prepare($sql);

            $valores = array();

            $valores["idTelefono"] = $telefonos->getidTelefono();

            $labAdodb->Execute($sqlParam, $valores) or die($labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase TelefonoDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a una persona en la base de datos
    //***********************************************************

    public function searchById(Telefono $telefonos) {

        global $labAdodb;
        $returnTelefono = null;
        try {
            $sql = sprintf("select * from telefono where  idTelefono = %s",
                            $labAdodb->Param("idTelefono"));
            $sqlParam = $labAdodb->Prepare($sql);

            $valores = array();

            $valores["idTelefono"] = $telefonos->getidTelefono();

            $resultSql = $labAdodb->Execute($sqlParam, $valores) or die($labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnTelefono = Telefono::createNullTelefono();
                $returnTelefono->setidTelefono($resultSql->Fields("idTelefono"));
                $returnTelefono->setFecha_Actualizacion($resultSql->Fields("Fecha_Actualizacion"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase TelefonoDao), error:'.$e->getMessage());
        }
        return $returnTelefono;
    }

    //***********************************************************
    //obtiene la información de las personas en la base de datos
    //***********************************************************
    
    public function getAll() {

        global $labAdodb;
        try {
            $sql = sprintf("select * from telefono");
            $resultSql = $labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase TelefonoDao), error:'.$e->getMessage());
        }
    }

}
