<?php

require_once 'db.php';

class Store
{


    public static function getStores()
    {
        $dwes = new PDO("mysql:host=localhost;dbname=dwes", "dwes", "dwes");
        $sql = "SELECT cod, name, tlf FROM store";
        $result = $dwes->query($sql);
        $stores = $result->fetchAll();
        unset($dwes);
        return $stores;
    }

    public static function updateStores($prevCode, $cod, $name, $tlf)
    {
        $dwes = new PDO("mysql:host=localhost;dbname=dwes", "dwes", "dwes");
        $sql = $dwes->prepare('UPDATE store SET cod=?, name=?, tlf=? WHERE store.cod=?');
        $sql->execute([$name, $cod, $tlf, $prevCode]);
        unset($dwes);
    }

    public static function deleteStores($cod)
    {
        $dwes = new PDO("mysql:host=localhost;dbname=dwes", "dwes", "dwes");
        $sql = $dwes->prepare('DELETE FROM stores WHERE store.cod = ?');
        $sql->execute([$cod]);
        unset($dwes);
    }

    public static function insertStores($cod, $name, $tlf)
    {
        $dwes = new PDO("mysql:host=localhost;dbname=dwes", "dwes", "dwes");
        $sql = $dwes->prepare('INSERT INTO store (cod, name, tlf) VALUES (?, ?, ?);');
        $sql->execute([$cod, $name, $tlf]);
        unset($dwes);
    }
}

