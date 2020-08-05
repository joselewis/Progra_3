<?php

require_once ("../domain/Telefonos.php");
require_once ("../dao/telefonoDao.php");

class TelefonoBo {

    private $telefonoDao;

    public function __construct() {
        $this->telefonoDao = new TelefonoDao();
    }

    public function getTelefonoDao() {
        return $this->telefonoDao;
    }

    public function setTelefonoDao(TelefonoDao $telefonoDao) {
        $this->telefonoDao = $telefonoDao;
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(Telefono $telefonos) {
        try {
            if (!$this->telefonoDao->exist($telefonos)) {
                $this->telefonoDao->add($telefonos);
            } else {
                throw new Exception("El teléfono ya existe en la base de datos!");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //modifica a una persona a la base de datos
    //***********************************************************

    public function update(Telefono $telefonos) {
        try {
            $this->telefonoDao->update($telefonos);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //eliminar a una persona a la base de datos
    //***********************************************************

    public function delete(Telefono $telefonos) {
        try {
            $this->telefonoDao->delete($telefonos);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consulta a una persona a la base de datos
    //***********************************************************

    public function searchByid(Telefono $telefonos) {
        try {
            return $this->telefonoDao->searchById($telefonos);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consultar todas las personas de la base de datos
    //***********************************************************

    public function getAll() {
        try {
            return $this->telefonoDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

}

?>