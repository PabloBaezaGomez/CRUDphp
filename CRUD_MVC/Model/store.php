<?php

namespace CRUD\model;
use CRUD\Db;


class Store
{

    private $cod;
    private $name;

    private $tlf;

    // Construct
    public function __construct($cod, $name, $tlf)
    {
        $this->cod = $cod;
        $this->name = $name;
        $this->tlf = $tlf;
    }

    public function getCod()
    {
        return $this->cod;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getTlf()
    {
        return $this->tlf;
    }

    // Select all the data, returns all the data in the table
    public static function getStores()
    {
        $sql = "SELECT * FROM store";
        $stmt = db::doSQL($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    // Selects the data by the store cod
    public function getStoreByCod($cod)
    {
        if (is_null($cod))
            return false;

        $sql = "SELECT * FROM " . $this->table . " WHERE cod = ?";
        $stmt = db::doSQL($sql, [$cod]);

        return $stmt->fetch();
    }

    public function saveStore($store)
    {
        $cod = $name = $tlf = "";

        $exists = false;

        if (isset($store["cod"]) and $store["cod"] != '') {
            $actualStore = $this->getStoreByCod($store["cod"]);
            if (isset($actualStore["cod"])) {
                $exists = true;
                $prevCod = $actualStore["cod"];
            }
        }

        // Received values
        if (isset($store["name"]))
            $name = $store["name"];
        if (isset($store["cod"]))
            $cod = $store["cod"];
        if (isset($store["tlf"]))
            $tlf = $store["tlf"];

        if ($cod == "" || $name == "" || $tlf == "") {
            return;
        }

        // Database operations if the family already exists, update the values
        if ($exists) {
            $sql = "UPDATE " . $this->table . "SET name=?, cod=?, tlf=? WHERE cod=?";
            $stmt = db::doSQL($sql, [$name, $cod, $prevCod]);

        } else {
            // If it doesn't, it creates a new one
            $sql = "INSERT INTO".$this->table."(cod,name,tlf) values(?, ?, ?)";
            $stmt = db::doSQL($sql, [$name, $cod, $tlf]);
        }

        return $cod;

    }

    // Deletes a store which key Value is the same as the one of the parametres
    public function deleteStoreByCod($cod) {
        $sql = "DELETE FROM " . $this->table . " WHERE cod = ?";
        return db::doSQL($sql, [$cod]);
    }
}
