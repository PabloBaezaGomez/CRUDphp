<?php

namespace CRUD\storeController;

require_once 'Model/product.php';
require_once 'Model/family.php';
require_once 'Model/stock.php';
require_once 'Model/store.php';

class StoreController {

    public static function CRUDControllerStore() {
        $stores = \Store::getStores();
        require_once 'View/InsertStore.php';
        require_once 'View/listStore.php';
    }

    public static function insertStore() {
        if (isset($_POST['insert_cod'])) {
            $cod = trim($_POST['insert_cod']);
            $name = trim($_POST['insert_name']);
            $tlf = trim($_POST['insert_tlf']);
            \Store::insertStores($cod, $name, $tlf);
        }
    }

    public static function deleteStore() {
        if (isset($_POST['delete_code'])) {
            $cod = trim($_POST['delete_code']);
            \Store::deleteStores($cod);
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
            \Store::updateStores($prevCode, $cod, $name, $tlf);
        }
    }
}

?>