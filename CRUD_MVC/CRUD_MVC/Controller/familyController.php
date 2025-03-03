<?php

require_once '../Model/family.php';

class familyController {
    
    public $page_title;
    public $view;

    public function __construct() {
        $this->view = 'list_family';
        $this->page_title = '';
        $this->familyObj = new Family();
    }

    /* List all familys */

    public function list() {
        $this->page_title = 'Families list';
        return $this->familyObj->getFamilies();
    }

    /* Load family for edit */

    public function edit($id = null) {
        $this->page_title = 'Edit family';
        $this->view = 'edit_family';
        /* Id can from get param or method param */
        if (isset($_GET["cod"]))
            $cod = $_GET["cod"];
        return $this->familyObj->getFamilyByCod($cod);
    }

    /* Create or update family */

    public function save() {
        $this->view = 'edit_family';
        $this->page_title = 'Edit family';
        $cod = $this->familyObj->save($_POST);
        $result = $this->familyObj->getFamilyByCod($cod);
        $_GET["response"] = true;
        return $result;
    }

    /* Confirm to delete */

    public function confirmDelete() {
        $this->page_title = 'Delete Family';
        $this->view = 'confirm_delete_family';
        return $this->familyObj->getFamilyByCod($_GET["cod"]);
    }

    /* Delete */

    public function delete() {
        $this->page_title = 'Family list';
        $this->view = 'delete_family';
        return $this->familyObj->deleteFamilyByCod($_POST["cod"]);
    }
}