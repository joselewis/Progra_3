<?php

require_once("baseDomain.php");


class Conductor extends BaseDomain implements \JsonSerializable{

    //attributes
    private $idConductor;
    private $Placa_Conductor;
    private $Modelo_Carro;
    private $Usuario_idUsuario;
    private $Activo;
    private $Anno_Vehiculo;

    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullConductor() {
        $instance = new self();
        return $instance;
    }

    public static function createConductor($idConductor, $Placa_Conductor, $Modelo_Carro, $Usuario_idUsuario, $Activo, $Anno_Vehiculo) {
        $instance = new self();
        $instance->idConductor        = $idConductor;
        $instance->Placa_Conductor           = $Placa_Conductor;
        $instance->Modelo_Carro        = $Modelo_Carro;
        $instance->Usuario_idUsuario        = $Usuario_idUsuario;
        $instance->Activo    =  $Activo;
        $instance->Anno_Vehiculo             = $Anno_Vehiculo;
        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getidConductor() {
        return $this->idConductor;
    }

    public function setidConductor($idConductor) {
        $this->idConductor = $idConductor;
    }

    /****************************************************************************/

    public function getPlaca_Conductor() {
        return $this->Placa_Conductor;
    }

    public function setPlaca_Conductor($Placa_Conductor) {
        $this->Placa_Conductor = $Placa_Conductor;
    }

    /****************************************************************************/

    public function getModelo_Carro() {
        return $this->Modelo_Carro;
    }

    public function setModelo_Carro($Modelo_Carro) {
        $this->Modelo_Carro = $Modelo_Carro;
    }

    /****************************************************************************/

    public function getUsuario_idUsuario() {
        return $this->Usuario_idUsuario;
    }

    public function setUsuario_idUsuario($Usuario_idUsuario) {
        $this->Usuario_idUsuario = $Usuario_idUsuario;
    }

    /****************************************************************************/

    public function getActivo() {
        return $this->Activo;
    }

    public function setActivo($Activo) {
        $this->Activo = $Activo;
    }

    /****************************************************************************/

    public function getAnno_Vehiculo() {
        return $this->Anno_Vehiculo;
    }

    public function setAnno_Vehiculo($Anno_Vehiculo) {
        $this->Anno_Vehiculo = $Anno_Vehiculo;
    }

    /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}