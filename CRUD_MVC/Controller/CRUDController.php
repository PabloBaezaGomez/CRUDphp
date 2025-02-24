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
        require_once 'View/InsertProduct.php';
        $products = \Product::getProducts();
        require_once 'View/listProducts.php';
        
    }
}
