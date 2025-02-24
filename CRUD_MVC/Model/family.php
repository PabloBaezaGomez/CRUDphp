<?php

class Family {
    /*
      The variables are both the table name
      and the conection to the database
     */

    private $cod;
    private $name;

    public function __construct($cod, $name) {
        $this->cod = $cod;
        $this->name = $name;
    }

    public function getCod() {
        return $this->cod;
    }

    public function getName() {
        return $this->name;
    }

    /*
      Select all the data from the table which name is
      stored in the class variable $table
     * returns all the data in the table
     */

    public static function getFamilies() {
        $sql = "SELECT * FROM family";
        $dwes = new PDO("mysql:host=localhost;dbname=dwes", "dwes", "dwes");
        $result = $dwes->query($sql);
        $families = $result->fetchAll();
        return $families;
    }

    /*
     * Receiving a code, selects all the data from
     * the family which cod is the same
     * Returns all the info in that row
     */

    public function getFamilyByCod($cod) {
        if (is_null($cod))
            return false;

        $sql = "SELECT * FROM " . $this->table . " WHERE cod = ?";
        $stmt = db::doSQL($sql, [$cod]);

        return $stmt->fetch();
    }

    /**
     * Receiving all the data needed, updates or create a row
     * @param type $family
     * @return cod of the family updated or created
     */
    public function saveFamily($family) {
        /* Set default values */
        $cod = $name = "";

        /* Check if exists */
        $exists = false;
        if (isset($family["cod"]) and $family["cod"] != '') {
            $actualFamily = $this->getFamilyByCod($family["cod"]);
            if (isset($actualFamily["cod"])) {
                $exists = true;
                /* Actual values */
                $prevCod = $actualFamily["cod"];
            }
        }

        /* Received values */
        if (isset($family["name"]))
            $name = $family["name"];
        if (isset($family["cod"]))
            $cod = $family["cod"];

        if ($cod == "" || $name == "") {
            return;
        }
        /* Database operations 
          if the family already exists, update the values
         *          */
        if ($exists) {
            $sql = "UPDATE " . $this->table . " SET name=?, cod=? WHERE cod=?";
            $stmt = db::doSQL($sql, [$name, $cod, $prevCod]);
        } else {
            /* If it doesn't, it creates a new one */
            $sql = "INSERT INTO " . $this->table . " (cod, name) values(?, ?)";
            $stmt = db::doSQL($sql, [$name, $cod]);
        }

        return $cod;
    }

    /* Deletes a family which key Value is the same as the one of the parametres */

    public function deleteFamilyByCod($cod) {
        $sql = "DELETE FROM " . $this->table . " WHERE cod = ?";
        return db::doSQL($sql, [$cod]);
    }
}
