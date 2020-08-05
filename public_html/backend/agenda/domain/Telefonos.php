<?php

require_once("baseDomain.php");


class Telefono extends BaseDomain implements \JsonSerializable{

    //attributes
    private $idTelefono;
    private $Fecha_Actualizacion;
    private $PK_cedula;


    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullTelefono() {
        $instance = new self();
        return $instance;
    }

    public static function createTelefono($idTelefono, $Fecha_Actualizacion, $PK_cedula) {
        $instance = new self();
        $instance->idTelefono        = $idTelefono;
        $instance->Fecha_Actualizacion           = $Fecha_Actualizacion;
        $instance->PK_cedula           = $PK_cedula;
        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getidTelefono() {
        return $this->idTelefono;
    }

    public function setidTelefono($idTelefono) {
        $this->idTelefono = $idTelefono;
    }

    /****************************************************************************/

    public function getFecha_Actualizacion() {
        return $this->Fecha_Actualizacion;
    }
    
    function getPK_cedula() {
        return $this->PK_cedula;
    }

    function setPK_cedula($PK_cedula)  {
        $this->PK_cedula = $PK_cedula;
    }

    public function setFecha_Actualizacion($Fecha_Actualizacion) {
        $this->Fecha_Actualizacion = $Fecha_Actualizacion;
    }

    /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    
    public function jsonSerialize() {
        return get_object_vars($this); 
    }

}

//nombre, cédula, factura adjunta