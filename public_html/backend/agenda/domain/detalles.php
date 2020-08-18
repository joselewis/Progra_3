<?php
require_once("baseDomain.php");

class Detalles extends BaseDomain implements \JsonSerializable{

    //attributes
    private $idDetalle_Factura;
    private $SubTotal;
    private $IVA;
    private $Descuento;
    private $Facturacion_idFacturacion;
    private $Viaje_idViaje;

    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullDetalles() {
        $instance = new self();
        return $instance;
    }

    public static function createDetalles($idDetalle_Factura, $Subtotal, $IVA, $Descuento, $Facturacion_idFacturacion, $Viaje_idViaje) {
        $instance = new self();
        $instance->idDetalle_Factura             = $idDetalle_Factura;
        $instance->SubTotal                      = $Subtotal;
        $instance->IVA                           = $IVA;
        $instance->Descuento                     = $Descuento;
        $instance->Facturacion_idFacturacion     = $Facturacion_idFacturacion;
        $instance->Viaje_idViaje                 = $Viaje_idViaje;
        return $instance;
    }

    //************
    //*properties*
    //************
    function getIdDetalle_Factura() {
        return $this->idDetalle_Factura;
    }

    function setIdDetalle_Factura($idDetalle_Factura) {
        $this->idDetalle_Factura = $idDetalle_Factura;
    }
    
    function getSubTotal() {
        return $this->SubTotal;
    }

    function setSubTotal($SubTotal) {
        $this->SubTotal = $SubTotal;
    }

    function getIVA() {
        return $this->IVA;
    }

    function setIVA($IVA) {
    $this->IVA = $IVA;
    }

    function getDescuento() {
        return $this->Descuento;
    }
    
    function setDescuento($Descuento) {
        $this->Descuento = $Descuento;
    }
    function getFacturacion_idFacturacion() {
        return $this->Facturacion_idFacturacion;
    }
    
    function setFacturacion_idFacturacion($Facturacion_idFacturacion) {
        $this->Facturacion_idFacturacion = $Facturacion_idFacturacion;
    }
    
    function getViaje_idViaje() {
        return $this->Viaje_idViaje;
    }

    function setViaje_idViaje($Viaje_idViaje){
        $this->Viaje_idViaje = $Viaje_idViaje;
    }

    //*************************
    //*Convertir el obj a JSON*
    //*************************   

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}