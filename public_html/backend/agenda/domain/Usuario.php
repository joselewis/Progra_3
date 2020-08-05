<?php

require_once("baseDomain.php");


class Usuario extends BaseDomain implements \JsonSerializable{

    //attributes
    private $idUsuario;
    private $Activo;
    private $Fecha_Registro;
    private $Fecha_Actualizacion;
    private $Contrasenna;
    private $Persona_IDCedula;
    private $Tipo_Usuario;
    

    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullUsuario() {
        $instance = new self();
        return $instance;
    }

    public static function createUsuario($idUsuario, $Activo, $Fecha_Registro, $Fecha_Actualizacion, $Persona_IDCedula, $Tipo_Usuario, $Contrasenna) {
        $instance = new self();
        $instance->idUsuario        = $idUsuario;
        $instance->Activo           = $Activo;
        $instance->Fecha_Registro        = $Fecha_Registro;
        $instance->Fecha_Actualizacion        = $Fecha_Actualizacion;
        $instance->Persona_IDCedula        = $Persona_IDCedula;
        $instance->idCat_Rol_Usuario        = $Tipo_Usuario;
        $instance->Contrasenna    = $Contrasenna;
        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getidUsuario() {
        return $this->idUsuario;
    }

    public function setidUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    /****************************************************************************/

    public function getActivo() {
        return $this->Activo;
    }

    public function setActivo($Activo) {
            $this->Activo = $Activo;
    }
    
    /****************************************************************************/

    public function getFecha_Registro() {
        return $this->Fecha_Registro;
    }

    public function setFecha_Registro($Fecha_Registro) {
            $this->Fecha_Registro = $Fecha_Registro;
    }

    /****************************************************************************/

    public function getFecha_Actualizacion() {
        return $this->Fecha_Actualizacion;
    }

    public function setFecha_Actualizacion($Fecha_Actualizacion) {
        $this->Fecha_Actualizacion = $Fecha_Actualizacion;
    }
    
    /****************************************************************************/

    public function getPersona_IDCedula() {
        return $this->Persona_IDCedula;
    }

    public function setPersona_IDCedula($Persona_IDCedula) {
        $this->Persona_IDCedula = $Persona_IDCedula;
    }

    /****************************************************************************/

    function getTipo_Usuario() {
        return $this->Tipo_Usuario;
    }

    function setTipo_Usuario($Tipo_Usuario) {
        $this->Tipo_Usuario = $Tipo_Usuario;
    }
    
    /****************************************************************************/

    public function getContrasenna() {
        return $this->Contrasenna;
    }

    public function setContrasenna($Contrasenna) {
        $this->Contrasenna = $Contrasenna;
    }

    /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}