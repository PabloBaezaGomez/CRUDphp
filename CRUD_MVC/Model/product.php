<?php

require_once 'db.php';

class Product {
    
    public static function getProductsDB() {
        $sql = "SELECT cod, short_name, description, RRP, family FROM product";
        $result = CRUD\DB::doSQL($sql);
        return $result;
    }

    public static function updateProduct($prevCode, $cod, $shortName, $rrp, $desc, $family) {
        $sql = 'UPDATE product SET short_name=:name, cod=:cod, description=:desc, RRP=:rrp, family=:family  WHERE product.cod=:prevCod';
        $result = CRUD\DB::doSQL($sql, ['name'=>$shortName,'cod'=>$cod,'desc'=>$desc,'rrp'=>$rrp,'family'=>$family,'prevCod'=>$prevCode]);
        return $result;
    }

    public static function deleteProduct($cod) {
        $sql = 'DELETE FROM product WHERE product.cod = :cod';
        $result = CRUD\DB::doSQL($sql, ['cod'=>$cod]);
        return $result;
    }

    public static function insertProduct($cod, $shortName, $rrp, $desc, $family) {
        $sql = 'INSERT INTO product (cod, short_name, description, RRP, family) VALUES (:cod, :name, :desc, :rrp, :family);';
        $result = CRUD\DB::doSQL($sql, ['cod'=>$cod,'name'=>$shortName,'desc'=>$desc,'rrp'=>$rrp,'family'=>$family]);
        return $result;
    }
}
