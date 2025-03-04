<?php

namespace controllers;

class Controllers {

    public static function default() {
        require_once 'View/template/header.html';
        // show buttons
        require_once 'View/buttonFamily.php';
        require_once 'View/buttonProduct.php';
        require_once 'View/buttonStock.php';
        require_once 'View/buttonStore.php';
        require_once 'View/template/closeHeader.html';
    }
    
    public static function footer() {
        
        require_once 'View/template/footer.html';
    }
}
