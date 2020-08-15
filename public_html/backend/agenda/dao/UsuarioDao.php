<?php

require_once("../../utlis/utils.php");
require_once("../../utlis/config.php");
require_once("../../utlis/connections/uia_agenda.php");
require_once("../domain/Usuario.php");


//this attribute enable to see the SQL's executed in the data base
//$labAdodb->debug=true;

class UsuarioDao {

    public function __construct() {
        
    }

    //***********************************************************
    //agrega a un Usuario a la base de datos
    //***********************************************************

    public function add(Usuario $Usuario) {

        global $labAdodb;
        try {
            $sql = sprintf("insert into Usuario (idUsuario, Contrasenna, Personas_PK_cedula, Tipo_Usuario, Ubicacion_Lat,Ubicacion_Long ) 
                                          values (%s,%s,%s,%s,%s,%s)",
                    $labAdodb->Param("idUsuario"),
                    $labAdodb->Param("Contrasenna"),
                    $labAdodb->Param("Persona_IDCedula"),
                    $labAdodb->Param("Tipo_Usuario"),
                    $labAdodb->Param("Lat"),
                    $labAdodb->Param("Long"));
            $sqlParam = $labAdodb->Prepare($sql);

            $valores = array();

            $valores["idUsuario"]       = $Usuario->getidUsuario();
            $valores["Contrasenna"]       = $Usuario->getContrasenna();
            $valores["Persona_IDCedula"]       = $Usuario->getPersona_IDCedula();
            $valores["Tipo_Usuario"]   = $Usuario->getTipo_Usuario();
            $valores["Lat"]   = $Usuario->getLat();
            $valores["Long"]   = $Usuario->getLong();

            $labAdodb->Execute($sqlParam, $valores) or die($labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase UsuarioDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si una persona existe en la base de datos por ID
    //***********************************************************

    public function exist(Usuario $Usuario) {

        global $labAdodb;
        $exist = false;
        try {
            $sql = sprintf("select * from Usuario where  idUsuario = %s ",
                            $labAdodb->Param("idUsuario"));
            $sqlParam = $labAdodb->Prepare($sql);

            $valores = array();
            $valores["idUsuario"] = $Usuario->getidUsuario();

            $resultSql = $labAdodb->Execute($sqlParam, $valores) or die($labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase UsuarioDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //modifica a un usuario en la base de datos
    //***********************************************************

    public function update(Usuario $Usuario) {

        global $labAdodb;
        try {
            $sql = sprintf("update Usuario set  Contrasenna = %s,
                                                Personas_PK_cedula = %s,
                                                Tipo_Usuario = %s,
                           where idUsuario = %s",
                    $labAdodb->Param("Contrasenna"),
                    $labAdodb->Param("Persona_IDCedula"),
                    $labAdodb->Param("Tipo_Usuario"),
                    $labAdodb->Param("idUsuario"));
            $sqlParam = $labAdodb->Prepare($sql);

            $valores = array();

            $valores["Contrasenna"]       = $Usuario->getContrasenna();
            $valores["Persona_IDCedula"]       = $Usuario->getPersona_IDCedula();
            $valores["Tipo_Usuario"]   = $Usuario->getTipo_Usuario();
            $valores["idUsuario"]       = $Usuario->getidUsuario();
            $labAdodb->Execute($sqlParam, $valores) or die($labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase UsuarioDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //Eliminar a un usuario de la base de datos 
    //***********************************************************

    public function delete(Usuario $Usuario) {

        global $labAdodb;
        try {
            $sql = sprintf("delete from Usuario where  idUsuario = %s",
                            $labAdodb->Param("idUsuario"));
            $sqlParam = $labAdodb->Prepare($sql);

            $valores = array();

            $valores["idUsuario"] = $Usuario->getidUsuario();

            $labAdodb->Execute($sqlParam, $valores) or die($labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase UsuarioDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //Buscar a un Usuario en la Base de Datos
    //***********************************************************

    public function searchById(Usuario $Usuario) {

        global $labAdodb;
        $returnUsuario = null;
        try {
            $sql = sprintf("select * from Usuario where  idUsuario = %s",
                            $labAdodb->Param("Usuario"));
            $sqlParam = $labAdodb->Prepare($sql);

            $valores = array();

            $valores["idUsuario"] = $Usuario->getidUsuario();

            $resultSql = $labAdodb->Execute($sqlParam, $valores) or die($labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnUsuario = Usuario::createNullUsuario();
                $returnUsuario->setidUsuario($resultSql->Fields("idUsuario"));
                $returnUsuario->setContrasenna($resultSql->Fields("Contrasenna"));
                $returnUsuario->setPersonas_PK_cedula($resultSql->Fields("Personas_PK_cedula"));
                $returnUsuario->setTipo_Usuario($resultSql->Fields("Tipo_Usuario"));
                
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase UsuarioDao), error:'.$e->getMessage());
        }
        return $returnUsuario;
    }

    //***********************************************************
    //Consultar a todos los usuarios de la Base de Datos
    //***********************************************************
    
    public function getAll() {

        global $labAdodb;
        try {
            $sql = sprintf("select * from Usuario");
            $resultSql = $labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase UsuarioDao), error:'.$e->getMessage());
        }
    }

}
