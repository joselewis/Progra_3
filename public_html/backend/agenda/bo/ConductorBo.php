<?php


require_once("../domain/Conductor.php");
require_once("../dao/ConductorDao.php");

class ConductorBo {

    private $ConductorDao;

    public function __construct() {
        $this->ConductorDao = new ConductorDao();
    }

    public function getConductorDao() {
        return $this->ConductorDao;
    }

    public function setConductorDao(ConductorDao $ConductorDao) {
        $this->ConductorDao = $ConductorDao;
    }

    //***********************************************************
    //Agregar un Conductor a la Base de Datos
    //***********************************************************

    public function add(Conductor $Conductor) {
        try {
            if (!$this->ConductorDao->exist($Conductor)) {
                $this->ConductorDao->add($Conductor);
            } else {
                throw new Exception("El Conductor ya existe en la base de datos!!");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //Modificar a un Conductor en la Base de Datos
    //***********************************************************

    public function update(Conductor $Conductor) {
        try {
            $this->ConductorDao->update($Conductor);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //Eliminar a un Conductor de la Base de Datos
    //***********************************************************

    public function delete(Conductor $Conductor) {
        try {
            $this->ConductorDao->delete($Conductor);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consulta a una persona a la base de datos
    //***********************************************************

    public function searchById(Conductor $Conductor) {
        try {
            return $this->ConductorDao->searchById($Conductor);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //Consultar por todos los conductores de la base de datos
    //***********************************************************

    public function getAll() {
        try {
            return $this->ConductorDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

}

//end of the class ConductorBo
?>