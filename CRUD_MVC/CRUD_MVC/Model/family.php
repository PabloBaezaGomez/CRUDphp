<?php

require_once 'db.php';

class Family
{
    public static function getFamilies()
    {
        $sql = "SELECT * FROM family";
        $families = CRUD\DB::doSQL($sql);
        return $families;
    }


    public static function updateFamily($prevCode, $cod, $name)
    {
        $sql = 'UPDATE family SET cod=:cod, name=:name WHERE family.cod=:prevCode';
        $result = CRUD\DB::doSQL($sql, ['cod'=>$cod,'name'=>$name,'prevCode'=>$prevCode]);
        return $result;
    }

    public static function deleteFamily($cod)
    {
        $sql = 'DELETE FROM family WHERE family.cod = :cod';
        $result = CRUD\DB::doSQL($sql, ['cod'=>$cod]);
        return $result;
    }

    public static function insertFamily($cod, $name)
    {
        $sql = 'INSERT INTO family (cod, name) VALUES (:cod, :name);';
        $result = CRUD\DB::doSQL($sql, ['cod'=>$cod,'name'=>$name]);
        return $result;
    }
}

?>