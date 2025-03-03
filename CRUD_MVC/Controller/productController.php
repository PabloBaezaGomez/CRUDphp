<?php

namespace CRUD\productController;

require_once 'Model/product.php';
require_once 'Model/family.php';
require_once 'Model/stock.php';
require_once 'Model/store.php';

class ProductController {

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
}
