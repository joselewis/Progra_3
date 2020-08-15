<?php

require_once("baseDomain.php");


class Usuario extends BaseDomain implements \JsonSerializable{

    //attributes
    private $idUsuario;
    private $Contrasenna;
    private $Persona_IDCedula;
    private $Tipo_Usuario;
    private $Lat;
    private $Long;

    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullUsuario() {
        $instance = new self();
        return $instance;
    }

    public static function createUsuario($idUsuario, $Persona_IDCedula, $Tipo_Usuario, $Contrasenna,$Lat,$Long) {
        $instance = new self();
        $instance->idUsuario        = $idUsuario;
        $instance->Contrasenna    = $Contrasenna;
        $instance->Persona_IDCedula        = $Persona_IDCedula;
        $instance->idCat_Rol_Usuario        = $Tipo_Usuario;
        $instance->Lat = $Lat;
        $instance->Long = $Long; 
        
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
    
    function getLat() {
        return $this->Lat;
    }

    function setLat($Lat) {
        $this->Lat = $Lat;
    }
    
    
     /****************************************************************************/
   
    function getLong() {
        return $this->Long;
    }

    function setLong($Long) {
        $this->Long = $Long;
    }

        /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}