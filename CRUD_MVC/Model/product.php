<?php

require_once 'db.php';

class Product {

    public static function getProducts() {
        $dwes = new PDO("mysql:host=localhost;dbname=dwes", "dwes", "dwes");
        $sql = "SELECT cod, short_name, description, RRP, family FROM product";
        $result = $dwes->query($sql);
        $products = $result->fetchAll();
        unset($dwes);
        return $products;
    }

    public static function updateProduct($prevCode, $cod, $shortName, $rrp, $desc, $family) {
        $dwes = new PDO("mysql:host=localhost;dbname=dwes", "dwes", "dwes");
        $sql = $dwes->prepare('UPDATE product SET short_name=?, cod=?, description=?, RRP=?, family=?  WHERE product.cod=?');
        $sql->execute([$shortName, $cod, $desc, $rrp, $family, $prevCode]);
        unset($dwes);
    }

    public static function deleteProduct($cod) {
        $dwes = new PDO("mysql:host=localhost;dbname=dwes", "dwes", "dwes");
        $sql = $dwes->prepare('DELETE FROM product WHERE product.cod = ?');
        $sql->execute([$cod]);
        unset($dwes);
    }

    public static function insertProduct($cod, $shortName, $rrp, $desc, $family) {
        $dwes = new PDO("mysql:host=localhost;dbname=dwes", "dwes", "dwes");
        $sql = $dwes->prepare('INSERT INTO product (cod, short_name, description, RRP, family) VALUES (?, ?, ?, ?, ?);');
        $sql->execute([$cod, $shortName, $desc, $rrp, $family]);
        unset($dwes);
    }
}
