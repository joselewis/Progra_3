<?php

require_once("baseDomain.php");


class Viajes extends BaseDomain implements \JsonSerializable{

    //attributes
    private $idViaje;
    private $Ubicacion_Actual;
    private $Ubicacion_Destino;
    private $Usuario_idUsuario;
    private $Latitud_Origen;
    private $Longitud_Origen;
    private $Longitud_Destino;
    private $Latitud_Destino;

    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullViaje() {
        $instance = new self();
        return $instance;
    }

    public static function createViaje($idViaje, $Ubicacion_Actual, $Ubicacion_Destino, $Usuario_idUsuario, $Latitud_Origen, $Longitud_Origen, $Longitud_Destino, $Latitud_Destino) {
        $instance = new self();
        $instance->idViaje        = $idViaje;
        $instance->Ubicacion_Actual           = $Ubicacion_Actual;
        $instance->Ubicacion_Destino       = $Ubicacion_Destino;
        $instance->Usuario_idUsuario    = $Usuario_idUsuario;
        $instance->Latitud_Origen             = $Latitud_Origen;
        $instance->Longitud_Origen    = $Longitud_Origen;
        $instance->Longitud_Destino    = $Longitud_Destino;
        $instance->Latitud_Destino             = $Latitud_Destino;
        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getidViaje() {
        return $this->idViaje;
    }

    public function setidViaje($idViaje) {
        $this->idViaje = $idViaje;
    }

    /****************************************************************************/

    public function getUbicacion_Actual() {
        return $this->Ubicacion_Actual;
    }

    public function setUbicacion_Actual($Ubicacion_Actual) {
        $this->Ubicacion_Actual = $Ubicacion_Actual;
    }

    /****************************************************************************/

    public function getUbicacion_Destino() {
        return $this->Ubicacion_Destino;
    }

    public function setUbicacion_Destino($Ubicacion_Destino) {
        $this->Ubicacion_Destino = $Ubicacion_Destino;
    }

    /****************************************************************************/

    public function getUsuario_idUsuario() {
        return $this->Usuario_idUsuario;
    }

    public function setUsuario_idUsuario($Usuario_idUsuario) {
        $this->Usuario_idUsuario = $Usuario_idUsuario;
    }

    /****************************************************************************/

    public function getLatitud_Origen() {
        return $this->Latitud_Origen;
    }

    public function setLatitud_Origen($Latitud_Origen) {
        $this->Latitud_Origen = $Latitud_Origen;
    }

    /****************************************************************************/

    public function getLongitud_Origen() {
        return $this->Longitud_Origen;
    }

    public function setLongitud_Origen($Longitud_Origen) {
        $this->Longitud_Origen = $Longitud_Origen;
    }

    /****************************************************************************/

    public function getLongitud_Destino() {
        return $this->Longitud_Destino;
    }

    public function setLongitud_Destino($Longitud_Destino) {
        $this->Longitud_Destino = $Longitud_Destino;
    }
  
     /****************************************************************************/
    
    function getLatitud_Destino() {
        return $this->Latitud_Destino;
    }

    function setLatitud_Destino($Latitud_Destino) {
        $this->Latitud_Destino = $Latitud_Destino;
    }
    
    /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    
    public function jsonSerialize() {
        return get_object_vars($this);
    }

}