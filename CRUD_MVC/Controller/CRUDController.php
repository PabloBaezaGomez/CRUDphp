<?php

namespace CRUD\controllers;

require_once 'Model/product.php';
require_once 'Model/family.php';

class Controllers {

    public static function default() {
        // show buttons
        require_once 'View/buttonFamily.php';
        require_once 'View/buttonProduct.php';
        require_once 'View/buttonStock.php';
        require_once 'View/buttonStore.php';
    }

    public static function CRUDControllerProducts() {
        $families = \Family::getFamilies();
        require_once 'View/InsertProduct.php';
        $products = \Product::getProducts();
        require_once 'View/listProducts.php';
    }

    public static function insertProduct() {
        $shortName = trim($_POST['insert_name']);
        $rrp = trim($_POST['insert_RRP']);
        $cod = trim($_POST['insert_cod']);
        $desc = trim($_POST['insert_description']);
        $family = trim($_POST['insert_family']);
        \Product::insertProduct($cod, $shortName, $rrp, $desc, $family);
    }

    public static function deleteProduct() {
        $prevCode = trim($_POST['delete_code']);
        \Product::deleteProduct($prevCode);
    }

    public static function updateProduct() {
        $prevCode = trim($_POST['delete_code']);
        $shortName = trim($_POST['short_name']);
        $rrp = trim($_POST['rrp']);
        $cod = trim($_POST['cod']);
        $desc = trim($_POST['description']);
        $family = trim($_POST['family']);
        \Product::updateProduct($prevCode, $cod, $shortName, $rrp, $desc, $family);
    }
}
