<?php

namespace controllers;

use model;

class FamilyController {

    public static function CRUDControllerFamilies() {
        require_once 'View/template/header.html';
        $families = \model\Family::getFamilies();
        require_once 'View/InsertFamily.php';
        require_once 'View/template/closeHeader.html';
        require_once 'View/listFamilies.php';
        require_once 'View/template/footer.html';
    }

    public static function insertFamily() {
        if (isset($_POST['insert_cod'])) {
            $name = trim($_POST['insert_name']);
            $cod = trim($_POST['insert_cod']);
            \model\Family::insertFamily($cod, $name);
        }
    }

    public static function deleteFamily() {
        if (isset($_POST['delete_code'])) {
            $prevCode = trim($_POST['delete_code']);
            \model\Family::deleteFamily($prevCode);
        }
    }

    public static function updateFamily() {
        if (isset($_POST['delete_code'])) {
            $prevCode = trim($_POST['delete_code']);
            $name = trim($_POST['name']);
            $cod = trim($_POST['cod']);
            \model\Family::updateFamily($prevCode, $cod, $name);
        }
    }
}

?>