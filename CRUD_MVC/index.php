<?php

$accion = filter_input(INPUT_GET, 'accion', FILTER_SANITIZE_SPECIAL_CHARS);

require_once 'Controller/CRUDController.php';
require_once 'Controller/familyController.php';
require_once 'Controller/productController.php';
require_once 'Controller/stockController.php';
require_once 'Controller/storeController.php';

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
        CRUD\familyController\FamilyController::CRUDControllerFamilies();
        break;
    case "deleteFamily":
        CRUD\familyController\FamilyController::deleteFamily();
        CRUD\familyController\FamilyController::CRUDControllerFamilies();
        break;
    case "updateFamily":
        CRUD\familyController\FamilyController::updateFamily();
        CRUD\familyController\FamilyController::CRUDControllerFamilies();
        break;
    case "insertFamily":
        CRUD\familyController\FamilyController::insertFamily();
        CRUD\familyController\FamilyController::CRUDControllerFamilies();
        break;
    case "moveStock":
        CRUD\stockController\StockController::CRUDControllerStock();
        break;
    case "deleteStock":
        CRUD\stockController\StockController::deleteStock();
        CRUD\stockController\StockController::CRUDControllerStock();
        break;
    case "updateStock":
        CRUD\stockController\StockController::updateStock();
        CRUD\stockController\StockController::CRUDControllerStock();
        break;
    case "insertStock":
        CRUD\stockController\StockController::insertStock();
        CRUD\stockController\StockController::CRUDControllerStock();
        break;
    case "moveStore":
        CRUD\storeController\StoreController::CRUDControllerStore();
        break;
    case "deleteStore":
        CRUD\storeController\StoreController::deleteStore();
        CRUD\storeController\StoreController::CRUDControllerStore();
        break;
    case "updateStore":
        CRUD\storeController\StoreController::updateStore();
        CRUD\storeController\StoreController::CRUDControllerStore();
        break;
    case "insertStore":
        CRUD\storeController\StoreController::insertStore();
        CRUD\storeController\StoreController::CRUDControllerStore();
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