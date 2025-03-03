<?php

require_once 'db.php';

class Store
{

    public static function getStores()
    {
        $sql = "SELECT cod, name, tlf FROM store";
        $result = CRUD\DB::doSQL($sql);
        return $result;
    }

    public static function updateStores($prevCode, $cod, $name, $tlf)
    {
        $sql = 'UPDATE store SET cod=:cod, name=:name, tlf=:tlf WHERE store.cod=:prevCode';
        $result = CRUD\DB::doSQL($sql, ['cod'=>$cod,'name'=>$name,'tlf'=>$tlf,'prevCode'=>$prevCode]);
        return $result;
    }

    public static function deleteStores($cod)
    {
        $sql = 'DELETE FROM store WHERE store.cod = :cod';
        $result = CRUD\DB::doSQL($sql, ['cod'=>$cod]);
        return $result;
    }

    public static function insertStores($cod, $name, $tlf)
    {
        $sql = 'INSERT INTO store (cod, name, tlf) VALUES (:cod, :name, :tlf);';
        $result = CRUD\DB::doSQL($sql, ['cod'=>$cod,'name'=>$name,'tlf'=>$tlf]);
    }
}