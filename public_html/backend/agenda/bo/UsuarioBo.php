<?php


require_once("../domain/Usuario.php");
require_once("../dao/UsuarioDao.php");

class UsuarioBo {

    private $UsuarioDao;

    public function __construct() {
        $this->UsuarioDao = new UsuarioDao();
    }

    public function getUsuarioDao() {
        return $this->UsuarioDao;
    }

    public function setUsuarioDao(UsuarioDao $UsuarioDao) {
        $this->UsuarioDao = $UsuarioDao;
    }

    //***********************************************************
    //Agregar un Usuario a la Base de datos
    //***********************************************************

    public function add(Usuario $Usuario) {
        try {
            if (!$this->UsuarioDao->exist($Usuario)) {
                $this->UsuarioDao->add($Usuario);
            } else {
                throw new Exception("El Usuario ya existe en la base de datos!!");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //Modificar a un Usuario de la Base de datos
    //***********************************************************

    public function update(Usuario $Usuario) {
        try {
            $this->UsuarioDao->update($Usuario);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //Eliminar a un usuario de la base de datos
    //***********************************************************

    public function delete(Usuario $Usuario) {
        try {
            $this->UsuarioDao->delete($Usuario);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //Consultar a un Usuario en la Base de Datos
    //***********************************************************

    public function searchById(Usuario $Usuario) {
        try {
            return $this->UsuarioDao->searchById($Usuario);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //Consultar a todos los usuarios de la base de datos
    //***********************************************************

    public function getAll() {
        try {
            return $this->UsuarioDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

}

//end of the class UsuarioBo
?>