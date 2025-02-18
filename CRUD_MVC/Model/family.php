<?php

class Family {

    private $table = 'family';
    private $conection;
    
    public function __construct() {
        
    }

    public function getConnection() {
        $dbObj = new Db();
        $this->conection = $dbObj->conection;
    }
    
    public function getFamilies() {
        $this->getConnection();
        $sql = "SELECT * FROM " . $this->table;
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    public function getFamilyByCod($cod) {
        if (is_null($cod))
            return false;
        $this->getConection();
        $sql = "SELECT * FROM " . $this->table . " WHERE cod = ?";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute([$cod]);

        return $stmt->fetch();
    }
    
    public function saveFamily($family) {
        $this->getConection();

        /* Set default values */
        $cod = $name = "";

        /* Check if exists */
        $exists = false;
        if (isset($param["cod"]) and $param["cod"] != '') {
            $actualFamily = $this->getFamilyByCod($param["cod"]);
            if (isset($actualFamily["cod"])) {
                $exists = true;
                /* Actual values */
                $prevCod = $actualFamily["cod"];
            }
        }

        /* Received values */
        if (isset($param["name"]))
            $name = $param["name"];
        if (isset($param["cod"]))
            $cod = $param["cod"];

        if($cod == "" || $name == ""){
            return;
        }
        /* Database operations */
        if ($exists) {
            $sql = "UPDATE " . $this->table . " SET name=?, cod=? WHERE cod=?";
            $stmt = $this->conection->prepare($sql);
            $res = $stmt->execute([$name, $cod, $prevCod]);
        } else {
            $sql = "INSERT INTO " . $this->table . " (cod, name) values(?, ?)";
            $stmt = $this->conection->prepare($sql);
            $stmt->execute([$cod, $name]);
        }

        return $cod;
    }
    
    public function deleteFamilyByCod($cod) {
        $this->getConection();
        $sql = "DELETE FROM " . $this->table . " WHERE cod = ?";
        $stmt = $this->conection->prepare($sql);
        return $stmt->execute([$cod]);
    }
}
