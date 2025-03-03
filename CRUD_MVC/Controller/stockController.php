<?php

namespace CRUD\stockController;

require_once 'Model/product.php';
require_once 'Model/family.php';
require_once 'Model/stock.php';
require_once 'Model/store.php';

class StockController {

    public static function CRUDControllerStock() {
        $stocks = \Stock::getStocks();
        $products = \Product::getProductsDB();
        $stores = \Store::getStores();
        require_once 'View/InsertStock.php';
        require_once 'View/listStock.php';
    }

    public static function insertStock() {
        if (isset($_POST['insert_units'])) {
            $product = trim($_POST['insert_product']);
            $store = trim($_POST['insert_store']);
            $units = trim($_POST['insert_units']);
            \Stock::saveStock($product, $store, $units);
        }
    }

    public static function deleteStock() {
        if (isset($_POST['product'])) {
            $product = trim($_POST['product']);
            $store = trim($_POST['store']);
            \Stock::deleteStock($product, $store);
        }
    }

    public static function updateStock() {
        if (isset($_POST['product'])) {
            $product = trim($_POST['product']);
            $store = trim($_POST['store']);
            $units = trim($_POST['units']);
            \Stock::saveStock($product, $store, $units);
        }
    }
}
