<?php

namespace controllers;

use model;

class StockController {

    public static function CRUDControllerStock() {
        $stocks = \model\Stock::getStocks();
        $products = \model\Product::getProductsDB();
        $stores = \model\Store::getStores();
        require_once 'View/InsertStock.php';
        require_once 'View/listStock.php';
    }

    public static function insertStock() {
        if (isset($_POST['insert_units'])) {
            $product = trim($_POST['insert_product']);
            $store = trim($_POST['insert_store']);
            $units = trim($_POST['insert_units']);
            \model\Stock::saveStock($product, $store, $units);
        }
    }

    public static function deleteStock() {
        if (isset($_POST['product'])) {
            $product = trim($_POST['product']);
            $store = trim($_POST['store']);
            \model\Stock::deleteStock($product, $store);
        }
    }

    public static function updateStock() {
        if (isset($_POST['product'])) {
            $product = trim($_POST['product']);
            $store = trim($_POST['store']);
            $units = trim($_POST['units']);
            \model\Stock::saveStock($product, $store, $units);
        }
    }
}
