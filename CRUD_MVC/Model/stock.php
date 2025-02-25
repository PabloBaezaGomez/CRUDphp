<?php

require_once 'db.php';

class Stock {

    public static function getStocks() {
        $dwes = new PDO("mysql:host=localhost;dbname=dwes", "dwes", "dwes");
        $sql = "SELECT * FROM stock";
        $result = $dwes->query($sql);
        $stocks = $result->fetchAll();
        unset($dwes);
        return $stocks;
    }

    public static function getStockByProduct($product) {
        if (is_null($product)) return false;
        
        $dwes = new PDO("mysql:host=localhost;dbname=dwes", "dwes", "dwes");
        $sql = $dwes->prepare("SELECT * FROM stock WHERE product = ?");
        $sql->execute([$product]);
        $result = $sql->fetch();
        unset($dwes);
        return $result;
    }

    public static function saveStock($product, $store, $units) {
        $dwes = new PDO("mysql:host=localhost;dbname=dwes", "dwes", "dwes");
        
        // Check if stock exists
        $sql = $dwes->prepare("SELECT * FROM stock WHERE product = ? AND store = ?");
        $sql->execute([$product, $store]);
        $exists = $sql->fetch();

        if ($exists) {
            // Update existing stock
            $sql = $dwes->prepare("UPDATE stock SET units = ? WHERE product = ? AND store = ?");
            $sql->execute([$units, $product, $store]);
        } else {
            // Insert new stock
            $sql = $dwes->prepare("INSERT INTO stock (product, store, units) VALUES (?, ?, ?)");
            $sql->execute([$product, $store, $units]);
        }
        
        unset($dwes);
        return $product;
    }

    public static function deleteStock($product, $store) {
        $dwes = new PDO("mysql:host=localhost;dbname=dwes", "dwes", "dwes");
        $sql = $dwes->prepare("DELETE FROM stock WHERE product = ? AND store = ?");
        $sql->execute([$product, $store]);
        unset($dwes);
    }
}
