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
        CRUD\productController\ProductController::CRUDControllerProducts();
        break;
    case "deleteProduct":
        CRUD\productController\ProductController::deleteProduct();
        CRUD\productController\ProductController::CRUDControllerProducts();
        break;
    case "updateProduct":
        CRUD\productController\ProductController::updateProduct();
        CRUD\productController\ProductController::CRUDControllerProducts();
        break;
    case "insertProduct":
        CRUD\productController\ProductController::insertProduct();
        CRUD\productController\ProductController::CRUDControllerProducts();
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
