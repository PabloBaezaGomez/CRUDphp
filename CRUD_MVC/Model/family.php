<?php

require_once 'db.php';

class Family
{
    public static function getFamilies()
    {
        $sql = "SELECT * FROM family";
        $dwes = new PDO("mysql:host=localhost;dbname=dwes", "dwes", "dwes");
        $result = $dwes->query($sql);
        $families = $result->fetchAll();
        return $families;
    }


    public static function updateFamily($prevCode, $cod, $name)
    {
        $dwes = new PDO("mysql:host=localhost;dbname=dwes", "dwes", "dwes");
        $sql = $dwes->prepare('UPDATE family SET cod=?, name=?  WHERE family.cod=?');
        $sql->execute([$cod, $name, $prevCode]);
        unset($dwes);
    }

    public static function deleteFamily($cod)
    {
        $dwes = new PDO("mysql:host=localhost;dbname=dwes", "dwes", "dwes");
        $sql = $dwes->prepare('DELETE FROM family WHERE family.cod = ?');
        $sql->execute([$cod]);
        unset($dwes);
    }

    public static function insertFamily($cod, $name)
    {
        $dwes = new PDO("mysql:host=localhost;dbname=dwes", "dwes", "dwes");
        $sql = $dwes->prepare('INSERT INTO family (cod, name) VALUES (?, ?);');
        $sql->execute([$cod, $name]);
        unset($dwes);
    }
}

?>
