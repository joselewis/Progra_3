<?php

require_once("../../utlis/utils.php");
require_once("../../utlis/config.php");
require_once("../../utlis/connections/uia_agenda.php");
require_once("../domain/facturacion.php");


//this attribute enable to see the SQL's executed in the data base
//$labAdodb->debug=true;

class FacturacionDao {

    public function __construct() {
        
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(Facturacion $facturacion) {

        global $labAdodb;
        try {
            $sql = sprintf("insert into Facturacion (idFacturacion, Fecha_Registro, Monto_Total, Detalle_Factura_idDetalle_Factura) 
                                             values (%s,CURDATE(),%s,%s)",
                    $labAdodb->Param("idFacturacion"),
            //        $labAdodb->Param("Fecha_Registro"),
                    $labAdodb->Param("Monto_Total"),
                    $labAdodb->Param("Detalle_Factura_idDetalle_Factura"));
            $sqlParam = $labAdodb->Prepare($sql);

            $valores = array();

            $valores["idFacturacion"]     = $facturacion->getidFacturacion();
         //   $valores["Fecha_Registro"]    = $facturacion->getFecha_Registro();
            $valores["Monto_Total"]       = $facturacion->getMonto_Total();
            $valores["Detalle_Factura_idDetalle_Factura"] = $facturacion->getDetalle_Factura_idDetalle_Factura();

            $labAdodb->Execute($sqlParam, $valores) or die($labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase FacturacionDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si una persona existe en la base de datos por ID
    //***********************************************************

    public function exist(Facturacion $facturacion) {

        global $labAdodb;
        $exist = false;
        try {
            $sql = sprintf("select * from Facturacion where  idFacturacion = %s ",
                            $labAdodb->Param("idFacturacion"));
            $sqlParam = $labAdodb->Prepare($sql);
            $valores = array();
            $valores["idFacturacion"] = $facturacion->getidFacturacion();
            $resultSql = $labAdodb->Execute($sqlParam, $valores) or die($labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase FacturacionDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //modifica una persona en la base de datos
    //***********************************************************

    public function update(Facturacion $facturacion) {

        global $labAdodb;
        try {
            $sql = sprintf("update Facturacion set idFacturacion = %s, 
                                                Fecha_Registro = CURDATE(), 
                                                Monto_Total = %s, 
                                                Detalle_Factura_idDetalle_Factura = %s, 
                            where idFacturacion = %s",
                    $labAdodb->Param("Fecha_Registro"),
                    $labAdodb->Param("Monto_Total"),
                    $labAdodb->Param("Detalle_Factura_idDetalle_Factura"));
            $sqlParam = $labAdodb->Prepare($sql);

            $valores = array();

            $valores["Fecha_Registro"]          = $facturacion->getFecha_Registro();
            $valores["Monto_Total"]       = $facturacion->getMonto_Total();
            $valores["Detalle_Factura_idDetalle_Factura"]       = $facturacion->getDetalle_Factura_idDetalle_Factura();
            $valores["idFacturacion"]       = $facturacion->getidFacturacion();
            $labAdodb->Execute($sqlParam, $valores) or die($labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase FacturacionDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //elimina una persona en la base de datos
    //***********************************************************

    public function delete(Facturacion $facturacion) {

        global $labAdodb;
        try {
            $sql = sprintf("delete from Facturacion where idFacturacion = %s",
                            $labAdodb->Param("idFacturacion"));
            $sqlParam = $labAdodb->Prepare($sql);
            $valores = array();
            $valores["id_Facturacion"] = $facturacion->getidFacturacion();
            $labAdodb->Execute($sqlParam, $valores) or die($labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase FacturacionDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a una persona en la base de datos
    //***********************************************************

    public function searchById(Facturacion $facturacion) {

        global $labAdodb;
        $returnFacturacion = null;
        try {
            $sql = sprintf("select * from Facturacion where idFacturacion = %s",
                            $labAdodb->Param("idFacturacion"));
            $sqlParam = $labAdodb->Prepare($sql);
            $valores = array();
            $valores["idFacturacion"] = $facturacion->getidFacturacion();
            $resultSql = $labAdodb->Execute($sqlParam, $valores) or die($labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnFacturacion = Facturacion::createNullFacturacion();
                $returnFacturacion->setidFacturacion($resultSql->Fields("idFacturacion"));
                $returnFacturacion->setFecha_Registro($resultSql->Fields("Fecha_Registro"));
                $returnFacturacion->setMonto_Total($resultSql->Fields("Monto_Total"));
                $returnFacturacion->setDetalle_Factura_idDetalle_Factura($resultSql->Fields("Detalle_Factura_idDetalle_Factura"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase FacturacionDao), error:'.$e->getMessage());
        }
        return $returnFacturacion;
    }

    //***********************************************************
    //obtiene la información de las personas en la base de datos
    //***********************************************************
    
    public function getAll() {

        global $labAdodb;
        try {
            $sql = sprintf("select * from Facturacion");
            $resultSql = $labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase FacturacionDao), error:'.$e->getMessage());
        }
    }
}