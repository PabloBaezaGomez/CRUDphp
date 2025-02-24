<?php

$accion = filter_input(INPUT_GET, 'accion', FILTER_SANITIZE_SPECIAL_CHARS);

require_once 'Controller/CRUDController.php';

CRUD\controllers\Controllers::default();
if($accion == "moveProduct"){
    CRUD\controllers\Controllers::CRUDControllerProducts();
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