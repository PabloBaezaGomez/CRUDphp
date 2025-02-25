<?php

namespace CRUD\controllers;

require_once 'Model/product.php';
require_once 'Model/family.php';
require_once 'Model/stock.php';
require_once 'Model/store.php';

class Controllers {

    public static function default() {
        // show buttons
        require_once 'View/buttonFamily.php';
        require_once 'View/buttonProduct.php';
        require_once 'View/buttonStock.php';
        require_once 'View/buttonStore.php';
    }

    //Table Products
    public static function CRUDControllerProducts() {
        $families = \Family::getFamilies();
        require_once 'View/InsertProduct.php';
        $products = \Product::getProductsDB();
        require_once 'View/listProducts.php';
    }

    public static function insertProduct() {
        if (isset($_POST['insert_name'])) {
            $shortName = trim($_POST['insert_name']);
            $rrp = trim($_POST['insert_RRP']);
            $cod = trim($_POST['insert_cod']);
            $desc = trim($_POST['insert_description']);
            $family = trim($_POST['insert_family']);
            \Product::insertProduct($cod, $shortName, $rrp, $desc, $family);
        }
    }

    public static function deleteProduct() {
        if (isset($_POST['delete_code'])) {
            $prevCode = trim($_POST['delete_code']);
            \Product::deleteProduct($prevCode);
        }
    }

    public static function updateProduct() {
        if (isset($_POST['delete_code'])) {
            $prevCode = trim($_POST['delete_code']);
            $shortName = trim($_POST['short_name']);
            $rrp = trim($_POST['rrp']);
            $cod = trim($_POST['cod']);
            $desc = trim($_POST['description']);
            $family = trim($_POST['family']);
            \Product::updateProduct($prevCode, $cod, $shortName, $rrp, $desc, $family);
        }
    }
    
    //Table Families
    public static function CRUDControllerFamilies() {
        $families = \Family::getFamilies();
        require_once 'View/InsertFamily.php';
        require_once 'View/listFamilies.php';
    }

    public static function insertFamily() {
        if (isset($_POST['insert_cod'])) {
            $name = trim($_POST['insert_name']);
            $cod = trim($_POST['insert_cod']);
            \Family::insertFamily($cod, $name);
        }
    }

    public static function deleteFamily() {
        if (isset($_POST['delete_code'])) {
            $prevCode = trim($_POST['delete_code']);
            \Family::deleteFamily($prevCode);
        }
    }

    public static function updateFamily() {
        if (isset($_POST['delete_code'])) {
            $prevCode = trim($_POST['delete_code']);
            $name = trim($_POST['name']);
            $cod = trim($_POST['cod']);
            \Family::updateFamily($prevCode, $cod, $name);
        }
    }
    
    //Table Stock
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
    //Table Stores
}
