<?php


require_once("../domain/detalles.php");
require_once("../dao/detallesDao.php");

class DetallesBo {

    private $detallesDao;

    public function __construct() {
        $this->detallesDao = new DetallesDao();
    }

    public function getDetallesDao() {
        return $this->detallesDao;
    }

    public function setDetallesDao(DetallesDao $detallesDao) {
        $this->detallesDao = $detallesDao;
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(Detalles $detalles) {
        try {
            if (!$this->detallesDao->exist($detalles)) {
                $this->detallesDao->add($detalles);
            } else {
                throw new Exception("El Detalle ya existe en la base de datos.");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //modifica a una persona a la base de datos
    //***********************************************************

    public function update(Detalles $detalles) {
        try {
            $this->detallesDao->update($detalles);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //eliminar a una persona a la base de datos
    //***********************************************************

    public function delete(Detalles $detalles) {
        try {
            $this->detallesDao->delete($detalles);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consulta a una persona a la base de datos
    //***********************************************************

    public function searchById(Detalles $detalles) {
        try {
            return $this->detallesDao->searchById($detalles);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consultar todas las personas de la base de datos
    //***********************************************************

    public function getAll() {
        try {
            return $this->detallesDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }
}
//end of the class PersonasBo
?>