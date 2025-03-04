<?php

include __DIR__.'/vendor/autoload.php';

require_once 'exceptions/AppException.php';

$accion = filter_input(INPUT_GET, 'accion', FILTER_SANITIZE_SPECIAL_CHARS);

controllers\Controllers::default();

try {
    switch ($accion) {
        case "moveProduct":
            controllers\ProductController::CRUDControllerProducts();
            break;
        case "deleteProduct":
            controllers\ProductController::deleteProduct();
            controllers\ProductController::CRUDControllerProducts();
            break;
        case "updateProduct":
            controllers\ProductController::updateProduct();
            controllers\ProductController::CRUDControllerProducts();
            break;
        case "insertProduct":
            controllers\ProductController::insertProduct();
            controllers\ProductController::CRUDControllerProducts();
            break;
        case "moveFamily":
            controllers\FamilyController::CRUDControllerFamilies();
            break;
        case "deleteFamily":
            controllers\FamilyController::deleteFamily();
            controllers\FamilyController::CRUDControllerFamilies();
            break;
        case "updateFamily":
            controllers\FamilyController::updateFamily();
            controllers\FamilyController::CRUDControllerFamilies();
            break;
        case "insertFamily":
            controllers\FamilyController::insertFamily();
            controllers\FamilyController::CRUDControllerFamilies();
            break;
        case "moveStock":
            controllers\StockController::CRUDControllerStock();
            break;
        case "deleteStock":
            controllers\StockController::deleteStock();
            controllers\StockController::CRUDControllerStock();
            break;
        case "updateStock":
            controllers\StockController::updateStock();
            controllers\StockController::CRUDControllerStock();
            break;
        case "insertStock":
            controllers\StockController::insertStock();
            controllers\StockController::CRUDControllerStock();
            break;
        case "moveStore":
            controllers\StoreController::CRUDControllerStore();
            break;
        case "deleteStore":
            controllers\StoreController::deleteStore();
            controllers\StoreController::CRUDControllerStore();
            break;
        case "updateStore":
            controllers\StoreController::updateStore();
            controllers\StoreController::CRUDControllerStore();
            break;
        case "insertStore":
            controllers\StoreController::insertStore();
            controllers\StoreController::CRUDControllerStore();
            break;
    }
} catch (AppException $e) {
    ErrorController::handleException($e, $smarty);
}

controllers\Controllers::footer();