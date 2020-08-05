<?php

require_once("../../utlis/utils.php");
require_once("../../utlis/config.php");
require_once("../../utlis/connections/uia_agenda.php");
require_once("../domain/Usuario.php");


//this attribute enable to see the SQL's executed in the data base
$labAdodb->debug=true;

class UsuarioDao {

    public function __construct() {
        
    }

    //***********************************************************
    //agrega a un Usuario a la base de datos
    //***********************************************************

    public function add(Usuario $Usuario) {

        global $labAdodb;
        try {
            $sql = sprintf("insert into Usuario (idUsuario, Activo, Fecha_Registro, Fecha_Actualizacion, Personas_PK_cedula, Tipo_Usuario, Contrasenna) 
                                          values (%s,%s,%s,%s,%s,%s,%s)",
                    $labAdodb->Param("idUsuario"),
                    $labAdodb->Param("Activo"),
                    $labAdodb->Param("Fecha_Registro"),
                    $labAdodb->Param("Fecha_Actualizacion"),
                    $labAdodb->Param("Persona_IDCedula"),
                    $labAdodb->Param("Tipo_Usuario"),
                    $labAdodb->Param("Contrasenna"));
            $sqlParam = $labAdodb->Prepare($sql);

            $valores = array();

            $valores["idUsuario"]       = $Usuario->getidUsuario();
            $valores["Activo"]          = $Usuario->getActivo();
            $valores["Fecha_Registro"]       = $Usuario->getFecha_Registro();
            $valores["Fecha_Actualizacion"]       = $Usuario->getFecha_Actualizacion();
            $valores["Persona_IDCedula"]       = $Usuario->getPersona_IDCedula();
            $valores["Tipo_Usuario"]       = $Usuario->getTipo_Usuario();
            $valores["Contrasenna"]   = $Usuario->getContrasenna();

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
            $sql = sprintf("update Usuario set Activo = %s,
                                                Fecha_Registro = %s, 
                                                Fecha_Actualizacion = %s,
                                                Personas_PK_cedula = %s,
                                                Tipo_Usuario = %s,
                                                Contrasenna = %s
                            where idUsuario = %s",
                    $labAdodb->Param("Activo"),
                    $labAdodb->Param("Fecha_Registro"),
                    $labAdodb->Param("Fecha_Actualizacion"),
                    $labAdodb->Param("Persona_IDCedula"),
                    $labAdodb->Param("Tipo_Usuario"),
                    $labAdodb->Param("Contrasenna"),
                    $labAdodb->Param("idUsuario"));
            $sqlParam = $labAdodb->Prepare($sql);

            $valores = array();

            $valores["Activo"]          = $Usuario->getActivo();
            $valores["Fecha_Registro"]       = $Usuario->getFecha_Registro();
            $valores["Fecha_Actualizacion"]       = $Usuario->getFecha_Actualizacion();
            $valores["Persona_IDCedula"]       = $Usuario->getPersona_IDCedula();
            $valores["Tipo_Usuario"]       = $Usuario->getTipo_Usuario();
            $valores["Contrasenna"]   = $Usuario->getContrasenna();
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
                $returnUsuario->setActivo($resultSql->Fields("Activo"));
                $returnUsuario->setFecha_Registro($resultSql->Fields("Fecha_Registro   "));
                $returnUsuario->setFecha_Actualizacion($resultSql->Fields("Fecha_Actualizacion"));
                $returnUsuario->setPersonas_PK_cedula($resultSql->Fields("Personas_PK_cedula")); //POSIBLE ERROR
                $returnUsuario->setTipo_Usuario($resultSql->Fields("Tipo_Usuario"));
                $returnUsuario->setContrasenna($resultSql->Fields("Contrasenna"));
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
