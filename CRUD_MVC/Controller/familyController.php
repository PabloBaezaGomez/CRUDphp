<?php

namespace CRUD\familyController;

require_once 'Model/product.php';
require_once 'Model/family.php';
require_once 'Model/stock.php';
require_once 'Model/store.php';

class FamilyController {

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
}

?>