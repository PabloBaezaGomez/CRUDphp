<?php

$accion = filter_input(INPUT_GET, 'accion', FILTER_SANITIZE_SPECIAL_CHARS);

require_once 'Controller/CRUDController.php';

CRUD\controllers\Controllers::default();

switch ($accion) {
    case "moveProduct":
        CRUD\controllers\Controllers::CRUDControllerProducts();
        break;
    case "deleteProduct":
        CRUD\controllers\Controllers::deleteProduct();
        CRUD\controllers\Controllers::CRUDControllerProducts();
        break;
    case "updateProduct":
        CRUD\controllers\Controllers::updateProduct();
        CRUD\controllers\Controllers::CRUDControllerProducts();
        break;
    case "insertProduct":
        CRUD\controllers\Controllers::insertProduct();
        CRUD\controllers\Controllers::CRUDControllerProducts();
        break;
    case "moveFamily":
        CRUD\controllers\Controllers::CRUDControllerFamilies();
        break;
    case "deleteFamily":
        CRUD\controllers\Controllers::deleteFamily();
        CRUD\controllers\Controllers::CRUDControllerFamilies();
        break;
    case "updateFamily":
        CRUD\controllers\Controllers::updateFamily();
        CRUD\controllers\Controllers::CRUDControllerFamilies();
        break;
    case "insertFamily":
        CRUD\controllers\Controllers::insertFamily();
        CRUD\controllers\Controllers::CRUDControllerFamilies();
        break;
    case "moveStock":
        CRUD\controllers\Controllers::CRUDControllerStock();
        break;
    case "deleteStock":
        CRUD\controllers\Controllers::deleteStock();
        CRUD\controllers\Controllers::CRUDControllerStock();
        break;
    case "updateStock":
        CRUD\controllers\Controllers::updateStock();
        CRUD\controllers\Controllers::CRUDControllerStock();
        break;
    case "insertStock":
        CRUD\controllers\Controllers::insertStock();
        CRUD\controllers\Controllers::CRUDControllerStock();
        break;
    case "moveStore":
        CRUD\controllers\Controllers::CRUDControllerStore();
        break;
    case "deleteStore":
        CRUD\controllers\Controllers::deleteStore();
        CRUD\controllers\Controllers::CRUDControllerStore();
        break;
    case "updateStore":
        CRUD\controllers\Controllers::updateStore();
        CRUD\controllers\Controllers::CRUDControllerStore();
        break;
    case "insertStore":
        CRUD\controllers\Controllers::insertStore();
        CRUD\controllers\Controllers::CRUDControllerStore();
        break;
}


/*try {
    switch ($accion) {
        case "logout":
            Controladores::logout();
            Controladores::default($smarty);
            break;
        case "autenticar":
            Controladores::autenticar($smarty);            
            break;
        case "addtofav":
            Controladores::addtofav($smarty);
            break;
        case "listfavs":
            Controladores::listfavs($smarty);
            break;
        case "removefromfav":
            Controladores::removefromfav($smarty);
            break;
        default:
            Controladores::default($smarty);
            break;
    }
} catch (AppException $e) {
    ErrorController::handleException($e, $smarty);
}
*/