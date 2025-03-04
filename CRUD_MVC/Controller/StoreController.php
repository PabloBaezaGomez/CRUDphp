<?php

namespace controllers;

use model;

class StoreController {

    public static function CRUDControllerStore() {
        require_once 'View/template/header.html';
        $stores = \model\Store::getStores();
        require_once 'View/InsertStore.php';
        require_once 'View/template/closeHeader.html';
        require_once 'View/listStore.php';
        require_once 'View/template/footer.html';
    }

    public static function insertStore() {
        if (isset($_POST['insert_cod'])) {
            $cod = trim($_POST['insert_cod']);
            $name = trim($_POST['insert_name']);
            $tlf = trim($_POST['insert_tlf']);
            \model\Store::insertStores($cod, $name, $tlf);
        }
    }

    public static function deleteStore() {
        if (isset($_POST['delete_code'])) {
            $cod = trim($_POST['delete_code']);
            \model\Store::deleteStores($cod);
        }
    }

    public static function updateStore() {
        if (isset($_POST['cod'])) {
            $cod = trim($_POST['cod']);
            $name = trim($_POST['name']);
            if (isset($_POST['tlf'])) {
                $tlf = trim($_POST['tlf']);
            } else {
                $tlf = null;
            }
            $prevCode = trim($_POST['delete_code']);
            \model\Store::updateStores($prevCode, $cod, $name, $tlf);
        }
    }
}

?>