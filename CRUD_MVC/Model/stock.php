<?php

require_once 'db.php';

class Stock {

    public static function getStocks() {
        $sql = "SELECT * FROM stock";
        $stocks = CRUD\DB::doSQL($sql);
        return $stocks;
    }

    public static function getStockByProduct($product) {
        if (is_null($product)){
            return false;
        }
        $sql = ("SELECT * FROM stock WHERE product = :product");
        $result = CRUD\DB::doSQL($sql, ['product'=>$product]);
        return $result;
    }

    public static function saveStock($product, $store, $units) {
        // Check if stock exists
        $sql = "SELECT * FROM stock WHERE product = :product AND store = :store";
        $exists = CRUD\DB::doSQL($sql, ['product'=>$product,'store'=>$store]);
        if ($exists) {
            // Update existing stock
            $sql = "UPDATE stock SET units = :units WHERE product = :product AND store = :store";
            $product = CRUD\DB::doSQL($sql, ['units'=>$units,'product'=>$product,'store'=>$store]);
        } else {
            // Insert new stock
            $sql = $dwes->prepare("INSERT INTO stock (product, store, units) VALUES (:product, :store, :units)");
            $product = CRUD\DB::doSQL($sql, ['product'=>$product,'store'=>$store,'units'=>$units]);
        }
        return $product;
    }

    public static function deleteStock($product, $store) {
        $sql = $dwes->prepare("DELETE FROM stock WHERE product = :product AND store = :store");
        $result = CRUD\DB::doSQL($sql, ['product'=>$product,'store'=>$store]);
        return $result;
    }
}
