<?php

require_once("../../utlis/utils.php");
require_once("../../utlis/config.php");
require_once("../../utlis/connections/uia_agenda.php");
require_once("../domain/viajes.php");


//this attribute enable to see the SQL's executed in the data base
//$labAdodb->debug=true;

class ViajeDao {

    public function __construct() {
        
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(Viajes $viaje) {

        global $labAdodb;
        try {
            $sql = sprintf("insert into Viaje (idViaje, Usuario_idUsuario, Latitud_Origen, Longitud_Origen, Longitud_Destino, Latitud_Destino) 
                                          values (%s,%s,%s,%s,%s,%s)",
                    $labAdodb ->Param ("idViaje"),
                    $labAdodb ->Param ("Usuario_idUsuario"),
                    $labAdodb ->Param ("Latitud_Origen"),
                    $labAdodb ->Param ("Longitud_Origen"),
                    $labAdodb ->Param ("Longitud_Destino"),
                    $labAdodb ->Param ("Latitud_Destino"));
            $sqlParam = $labAdodb->Prepare($sql);

            $valores = array();

            $valores["idViaje"]       = $viaje->getidViaje();
            $valores["Usuario_idUsuario"]   = $viaje->getUsuario_idUsuario();
            $valores["Latitud_Origen"]            = $viaje->getLatitud_Origen();
            $valores["Longitud_Origen"]   = $viaje->getLongitud_Origen();
            $valores["Longitud_Destino"]        = $viaje->getLongitud_Destino();
            $valores["Latitud_Destino"]        = $viaje->getLatitud_Destino();

            $labAdodb->Execute($sqlParam, $valores) or die($labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase viajeDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si una persona existe en la base de datos por ID
    //***********************************************************

    public function exist(Viajes $viaje) {

        global $labAdodb;
        $exist = false;
        try {
            $sql = sprintf("select * from Viaje where  idViaje = %s ",
                            $labAdodb->Param("idViaje"));
            $sqlParam = $labAdodb->Prepare($sql);

            $valores = array();
            $valores["idViaje"] = $viaje->getidViaje();

            $resultSql = $labAdodb->Execute($sqlParam, $valores) or die($labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase viajeDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //modifica una persona en la base de datos
    //***********************************************************

    public function update(Viajes $viaje) {

        global $labAdodb;
        try {
            $sql = sprintf("update Viaje set Ubicacion_Actual = %s, 
                                                Longitud_Origen = %s, 
                                                Longitud_Destino = %s, 
                                                Latitud_Destino = %s
                                                 
                            where idViaje = %s",
                    
                    $labAdodb->Param("Latitud_Origen"),
                    $labAdodb->Param("Longitud_Origen"),
                    $labAdodb->Param("Longitud_Destino"),
                    $labAdodb->Param("Latitud_Destino"),
                    $labAdodb->Param("idViaje"));
            $sqlParam = $labAdodb->Prepare($sql);

            $valores = array();

            $valores["Latitud_Origen"]   = $viaje->getLatitud_Origen();
            $valores["Longitud_Origen"]            = $viaje->getLongitud_Origen();
            $valores["Longitud_Destino"]   = $viaje->getLongitud_Destino();
            $valores["Latitud_Destino"]        = $viaje->getLatitud_Destino();
            $valores["idViaje"]       = $viaje->getidViaje();
            $labAdodb->Execute($sqlParam, $valores) or die($labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase viajeDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //elimina una persona en la base de datos
    //***********************************************************

    public function delete(Viajes $viaje) {

        global $labAdodb;
        try {
            $sql = sprintf("delete from Viaje where  idViaje = %s",
                            $labAdodb->Param("idViaje"));
            $sqlParam = $labAdodb->Prepare($sql);

            $valores = array();

            $valores["idViaje"] = $viaje->getidViaje();

            $labAdodb->Execute($sqlParam, $valores) or die($labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase viajeDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a una persona en la base de datos
    //***********************************************************

    public function searchById(Viajes $viaje) {

        global $labAdodb;
        $returnviaje = null;
        try {
            $sql = sprintf("select * from Viaje where  idViaje = %s",
                            $labAdodb->Param("idViaje"));
            $sqlParam = $labAdodb->Prepare($sql);

            $valores = array();

            $valores["idViaje"] = $viaje->getidViaje();

            $resultSql = $labAdodb->Execute($sqlParam, $valores) or die($labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnviaje = Viaje::createNullViaje();
                $returnviaje->setidViaje($resultSql->Fields("idViaje"));
                $returnviaje->setLatitud_Origen($resultSql->Fields("Latitud_Origen"));
                $returnviaje->setLongitud_Origen($resultSql->Fields("Longitud_Origen"));
                $returnviaje->setLongitud_Destino($resultSql->Fields("Longitud_Destino"));
            }   $returnviaje->setLatitud_Destino($resultSql->Fields("Latitud_Destino")); 
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase viajeDao), error:'.$e->getMessage());
        }
        return $returnviaje;
    }

    //***********************************************************
    //obtiene la información de las personas en la base de datos
    //***********************************************************
    
    public function getAll() {

        global $labAdodb;
        try {
            $sql = sprintf("select * from Viaje");
            $resultSql = $labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase viajeDao), error:'.$e->getMessage());
        }
    }

}
