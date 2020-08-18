<?php

require_once("baseDomain.php");


class Facturacion extends BaseDomain implements \JsonSerializable{

    //attributes
    private $idFacturacion;
    private $Fecha_Registro;
    private $Monto_Total;
    private $Detalle_Factura_idDetalle_Factura;

    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullFacturacion() {
        $instance = new self();
        return $instance;
    }

    public static function createFacturacion($idFacturacion, $Fecha_Registro, $Monto_Total, $Detalle_Factura_idDetalle_Factura) {
        $instance = new self();
        $instance->idFacturacion        = $idFacturacion;
        $instance->Fecha_Registro           = $Fecha_Registro;
        $instance->Monto_Total        = $Monto_Total;
        $instance->Detalle_Factura_idDetalle_Factura        = $Detalle_Factura_idDetalle_Factura;
        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getidFacturacion() {
        return $this->idFacturacion;
    }

    public function setidFacturacion($idFacturacion) {
        $this->idFacturacion = $idFacturacion;
    }

    public function getFecha_Registro() {
        return $this->Fecha_Registro;
    }

    public function setFecha_Registro($Fecha_Registro) {
        $this->Fecha_Registro = $Fecha_Registro;
    }

    public function getMonto_Total() {
        return $this->Monto_Total;
    }

    public function setMonto_Total($Monto_Total) {
        $this->Monto_Total = $Monto_Total;
    }

    public function getDetalle_Factura_idDetalle_Factura() {
        return $this->Detalle_Factura_idDetalle_Factura;
    }

    public function setDetalle_Factura_idDetalle_Factura($Detalle_Factura_idDetalle_Factura) {
        $this->Detalle_Factura_idDetalle_Factura = $Detalle_Factura_idDetalle_Factura;
    }

    /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    public function jsonSerialize() {
        return get_object_vars($this);
    }
}