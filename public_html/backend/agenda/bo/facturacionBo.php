<?php


require_once("../domain/personas.php");
require_once("../dao/facturacionDao.php");

class FacturacionBo {

    private $facturacionDao;

    public function __construct() {
        $this->facturacionDao = new FacturacionDao();
    }

    public function getFacturacionDao() {
        return $this->facturacionDao;
    }

    public function setFacturacionDao(FacturacionDao $facturacionDao) {
        $this->facturacionDao = $facturacionDao;
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(Facturacion $facturacion) {
        try {
            if (!$this->facturacionDao->exist($facturacion)) {
                $this->facturacionDao->add($facturacion);
            } else {
                throw new Exception("La Facturacion ya existe en la base de datos!!");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //modifica a una persona a la base de datos
    //***********************************************************

    public function update(Facturacion $facturacion) {
        try {
            $this->facturacionDao->update($facturacion);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //eliminar a una persona a la base de datos
    //***********************************************************

    public function delete(Facturacion $facturacion) {
        try {
            $this->facturacionDao->delete($facturacion);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consulta a una persona a la base de datos
    //***********************************************************

    public function searchById(Facturacion $facturacion) {
        try {
            return $this->facturacionDao->searchById($facturacion);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consultar todas las personas de la base de datos
    //***********************************************************

    public function getAll() {
        try {
            return $this->facturacionDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }
}
//end of the class PersonasBo
?>