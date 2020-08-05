<?php

class BaseDomain {

    //attributes
    private $lastUser;

    //constructors
    public function __construct() {
        
    }

    //properties
    public function getLastUser() {
        return $this->lastUser;
    }

    public function setLastUser($lastUser) {
        $this->lastUser = $lastUser;
    }

    /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    
    public function jsonSerialize() {
        return get_object_vars($this);
    }

}

//end of the class
?>