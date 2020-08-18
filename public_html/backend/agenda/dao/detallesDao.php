<?php

require_once("../../utlis/utils.php");
require_once("../../utlis/config.php");
require_once("../../utlis/connections/uia_agenda.php");
require_once("../domain/detalles.php");
//this attribute enable to see the SQL's executed in the data base
$labAdodb->debug=true;
class DetallesDao {

    public function __construct() {        
    }
    //*****************************************
    //*agrega a una persona a la base de datos*
    //*****************************************
    public function add(Detalles $detalles) {
        global $labAdodb;
        try {
            $sql = sprintf("insert into Detalles (idDetalle_Factura, SubTotal, IVA, Descuento, Facturacion_idFacturacion, Viaje_idViaje) 
                                          values (%s,%s, %s,%s,%s,%s)",
                    $labAdodb->Param("idDetalle_Facura"),
                    $labAdodb->Param("SubTotal"),
                    $labAdodb->Param("IVA"),
                    $labAdodb->Param("Descuento"),
                    $labAdodb->Param("Facturacion_idFacturacion"),
                    $labAdodb->Param("Viaje_idViaje"));
            $sqlParam = $labAdodb->Prepare($sql);
            $valores = array();
            $valores["idDetalle_Factura"]           = $detalles->getidDetalle_Factura();
            $valores["SubTotal"]                    = $detalles->getSubTotal();
            $valores["IVA"]                         = $detalles->getIVA();
            $valores["Descuento"]                   = $detalles->getDescuento();
            $valores["Facturacion_idFacturacion"]   = $detalles->getFacturacion_idFacturacion();
            $valores["Viaje_idViaje"]               = $detalles->getViaje_idViaje();
            $labAdodb->Execute($sqlParam, $valores) or die($labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase DetallesDao), error:'.$e->getMessage());
        }
    }
    //***********************************************************
    //verifica si una persona existe en la base de datos por ID
    //***********************************************************

    public function exist(Detalles $detalles) {

        global $labAdodb;
        $exist = false;
        try {
            $sql = sprintf("select * from Detalles where idDetalle_Factura = %s ",
                            $labAdodb->Param("idDetalle_Factura"));
            $sqlParam = $labAdodb->Prepare($sql);
            $valores = array();
            $valores["idDetalle_Factura"] = $detalles->getidDetalle_Factura();
            $resultSql = $labAdodb->Execute($sqlParam, $valores) or die($labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase DetallesDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //modifica una persona en la base de datos
    //***********************************************************

    public function update(Detalles $detalles) {

        global $labAdodb;
        try {
            $sql = sprintf("update Detalles set SubTotal = %s, IVA = %s, Descuento = %s, Facturacion_idFacturacion = %s, Viaje_idViaje = %s, "
                ."where idDetalle_Factura = %s",
                $labAdodb->Param("SubTotal"),
                $labAdodb->Param("IVA"),
                $labAdodb->Param("Descuento"),
                $labAdodb->Param("Facturacion_idFacturacion"),
                $labAdodb->Param("Viaje_idViaje"),
                $labAdodb->Param("idDetalle_Factura"));
            $sqlParam = $labAdodb->Prepare($sql);
            $valores = array();

            $valores["SubTotal"]                    = $detalles->getSubTotal();
            $valores["IVA"]                         = $detalles->getIVA();
            $valores["Descuento"]                   = $detalles->getDescuento();
            $valores["Facturación_idFacturacion"]   = $detalles->getFacturacion_idFacturacion();
            $valores["Viaje_idViaje"]               = $detalles->getViaje_idViaje();
            $valores["idDetalle_Factura"]           = $detalles->getidDetalle_Factura();
            $labAdodb->Execute($sqlParam, $valores) or die($labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase DetallesDao), error:'.$e->getMessage());
        }
    }

    //*****************************************
    //*elimina una persona en la base de datos*
    //*****************************************
    public function delete(Detalles $detalles) {

        global $labAdodb;
        try {
            $sql = sprintf("delete from Detalles where idDetalle_Factura = %s",
                            $labAdodb->Param("idDetalle_Factura"));
            $sqlParam = $labAdodb->Prepare($sql);
            $valores = array();
            $valores["idDetalle_Factura"] = $detalles->getidDetalle_Factura();

            $labAdodb->Execute($sqlParam, $valores) or die($labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase DetallesDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a una persona en la base de datos
    //***********************************************************

    public function searchById(Detalles $detalles) {

        global $labAdodb;
        $returnDetalles = null;
        try {
            $sql = sprintf("select * from Detalle_Factura where idDetalle_Factura = %s",
                            $labAdodb->Param("idDetalle_Factura"));
            $sqlParam = $labAdodb->Prepare($sql);
            $valores = array();
            $valores["idDetalle_Factura"] = $detalles->getidDetalle_Factura();

            $resultSql = $labAdodb->Execute($sqlParam, $valores) or die($labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnDetalles = Detalles::createNullDetalles();
                $returnDetalles->setidDetalle_Factura($resultSql->Fields("idDetalle_Factura"));
                $returnDetalles->setIVA($resultSql->Fields("IVA"));
                $returnDetalles->setDescuento($resultSql->Fields("Descuento"));
                $returnDetalles->setFacturacion_idFacturacion($resultSql->Fields("Facturacion_idFacturacion"));
                $returnDetalles->setViaje_idViaje($resultSql->Fields("Viaje_idViaje"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase DetallesDao), error:'.$e->getMessage());
        }
        return $returnDetalles;
    }
    //***********************************************************
    //obtiene la información de las personas en la base de datos
    //***********************************************************    
    public function getAll() {

        global $labAdodb;
        try {
            $sql = sprintf("select * from Detalles");
            $resultSql = $labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase DetallesDao), error:'.$e->getMessage());
        }
    }
}