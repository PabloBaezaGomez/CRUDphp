<?php

require_once '../Model/store.php';

class storeController {

    public $page_title;
    public $view;
    private $noteObj;

    // Construct
    public function __construct(){
        $this->view = 'list_store';
        $this->page_title= '';
        $this->noteObj = new Store();

    }
    
    // List all stores
    public function list() {
        $this->page_title = 'Store list';
        return $this->storeObj->getStores();
    }


    // Load stores for edit

    public function edit($cod = null) {
        $this->page_title = 'Edit store';
        $this->view = 'edit_store';

        /*cod can from get param or method param */
        if(isset($_GET["cod"])) $cod = $_GET["cod"];
        return $this->storeObj->getStoreByCod($cod);

    }

    // Create or update stores
    public function save() {
        $this->view = 'edit_store';
        $this->page_title = 'Edit store';
        $cod = $this->storeObj->save($_POST);
        $result = $this->storeObj->getStoreByCod($cod);
        $_GET["response"] = true;
        return $result;
    }

    // Confirm delete
    public function confirmDelete() {
        $this->page_title = 'Delete store';
        $this->view = 'confirm_delete_store';
        return $this->storeObj->getStoreByCod($_GET["cod"]);
    }

    // Delete
    public function delete() {
        $this->page_title = 'Store list';
        $this->view = 'delete_store';
        return $this->storeObj->deleteStoreByCod($_POST["cod"]);
    }

}
