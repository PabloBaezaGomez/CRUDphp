<?php

namespace controllers;

use model;

class ProductController {

    public static function CRUDControllerProducts() {
        require_once 'View/template/header.html';
        $families = \model\Family::getFamilies();
        require_once 'View/InsertProduct.php';
        require_once 'View/template/closeHeader.html';
        $products = \model\Product::getProductsDB();
        require_once 'View/listProducts.php';
        require_once 'View/template/footer.html';
    }

    public static function insertProduct() {
        if (isset($_POST['insert_name'])) {
            $shortName = trim($_POST['insert_name']);
            $rrp = trim($_POST['insert_RRP']);
            $cod = trim($_POST['insert_cod']);
            $desc = trim($_POST['insert_description']);
            $family = trim($_POST['insert_family']);
            \model\Product::insertProduct($cod, $shortName, $rrp, $desc, $family);
        }
    }

    public static function deleteProduct() {
        if (isset($_POST['delete_code'])) {
            $prevCode = trim($_POST['delete_code']);
            \model\Product::deleteProduct($prevCode);
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
            \model\Product::updateProduct($prevCode, $cod, $shortName, $rrp, $desc, $family);
        }
    }
}
