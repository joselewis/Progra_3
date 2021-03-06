<?php

require_once("baseDomain.php");


class Personas extends BaseDomain implements \JsonSerializable{

    //attributes
    private $PK_cedula;
    private $nombre;
    private $apellido1;
    private $apellido2;
    private $fecNacimiento;
    private $sexo;
    private $observaciones;
    private $telefono;
    private $Correo;

    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullPersonas() {
        $instance = new self();
        return $instance;
    }

    public static function createPersonas($PK_cedula, $nombre, $apellido1, $apellido2, $fecNacimiento, $sexo,$Telefono,$Correo,$observaciones) {
        $instance = new self();
        $instance->PK_cedula        = $PK_cedula;
        $instance->nombre           =   $nombre;
        $instance->apellido1        =   $apellido1;
        $instance->apellido2        =   $apellido2;
        $instance->fecNacimiento = $fecNacimiento;
        $instance->sexo             =       $sexo;
        $instance->observaciones =  $observaciones;
        $instance->Telefono =            $Telefono;
        $instance->Correo =               $Correo;
        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getPK_cedula() {
        return $this->PK_cedula;
    }

    public function setPK_cedula($PK_cedula) {
        $this->PK_cedula = $PK_cedula;
    }

    /****************************************************************************/

    function getNombre() {
        return $this->nombre;
    }

    function setNombre($nombre){
        $this->nombre = $nombre;
    }

        /****************************************************************************/

    public function getApellido1() {
        return $this->apellido1;
    }

    public function setApellido1($apellido1) {
        $this->apellido1 = $apellido1;
    }

    /****************************************************************************/

    public function getApellido2() {
        return $this->apellido2;
    }

    public function setApellido2($apellido2) {
        $this->apellido2 = $apellido2;
    }

    /****************************************************************************/

    public function getFecNacimiento() {
        return $this->fecNacimiento;
    }

    public function setFecNacimiento($fecNacimiento) {
        $this->fecNacimiento = $fecNacimiento;
    }

    /****************************************************************************/

    public function getSexo() {
        return $this->sexo;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    /****************************************************************************/

    public function getObservaciones() {
        return $this->observaciones;
    }

    public function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;
    }
    
    function getTelefono() {
        return $this->telefono;
    }

   function setTelefono($telefono){
        $this->telefono = $telefono;
    }
    
    /****************************************************************************/
    
     function getCorreo() {
        return $this->Correo;
    }

    function setCorreo($Correo){
        $this->Correo = $Correo;
    }

        /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}