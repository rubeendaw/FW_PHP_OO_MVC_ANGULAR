<?php
require_once("paths.php");
require 'autoload.php';

// include(UTILS . "filters.inc.php");
include(UTILS . "utils.inc.php");
// include(UTILS . "response_code.inc.php");
include(UTILS . "upload.inc.php");
include(UTILS . "common.inc.php");
include(UTILS . "mail.inc.php");

if (PRODUCTION) { //estamos en producción
    ini_set('display_errors', '1');
    ini_set('error_reporting', E_ERROR | E_WARNING); //error_reporting(E_ALL) ;
    //error_reporting(E_ALL) ; | E_NOTICE --> commit E_NOTICE to use timeout userdao_country
} else {
    ini_set('display_errors', '0');
    ini_set('error_reporting', '0'); //error_reporting(0);
}

ob_start();
session_start();
$_SESSION['module'] = "";
// $_POST = json_decode(file_get_contents('php://input'), true);

function handlerRouter() {
    if (!empty($_GET['module'])) {
        $URI_module = $_GET['module'];
    } else {
        $URI_module = 'profile';
    }

    if (!empty($_GET['function'])) {
        $URI_function = $_GET['function'];
    } else {
        $URI_function = 'view_profile';
    }
    handlerModule($URI_module, $URI_function);
}

function handlerModule($URI_module, $URI_function) {
    $modules = simplexml_load_file('resources/modules.xml');
    $exist = false;

    foreach ($modules->module as $module) {
        if (($URI_module === (String) $module->uri)) {
            $exist = true;

            $path = MODULES_PATH . $URI_module . "/controller/controller_" . $URI_module . ".class.php";
            if (file_exists($path)) {
                require_once($path);
                $controllerClass = "controller_" . $URI_module;
                $obj = new $controllerClass;
            } else {
                //die($URI_module . ' - Controlador no encontrado');
                // require_once(VIEW_PATH_INC . "header.php");
                require_once(VIEW_PATH_INC . "top_page.php");
                require_once(VIEW_PATH_INC . "menu_no_auth.php");
                require_once(VIEW_PATH_INC . "footer.php");
                // showErrorPage(1, "", 'HTTP/1.0 400 Bad Request', 400);
                // require_once(VIEW_PATH_INC . "footer.html");
            }
            handlerfunction(((String) $module->name), $obj, $URI_function);
            break;
        }
    }
    if (!$exist) {
        //die($URI_module . ' - Controlador no encontrado');
        // require_once(VIEW_PATH_INC . "header.php");
        require_once(VIEW_PATH_INC . "top_page.php");
        require_once(VIEW_PATH_INC . "menu_no_auth.php");
        require_once(VIEW_PATH_INC . "footer.php");
        // showErrorPage(1, "", 'HTTP/1.0 400 Bad Request', 400);
        // require_once(VIEW_PATH_INC . "footer.html");
    }
}

function handlerFunction($module, $obj, $URI_function) {
    $functions = simplexml_load_file(MODULES_PATH . $module . "/resources/functions.xml");
    $exist = false;

    foreach ($functions->function as $function) {
        if (($URI_function === (String) $function->uri)) {
            $exist = true;
            $event = (String) $function->name;
            break;
        }
    }
    if (!$exist) {
        //die($URI_function . ' - Funci&oacute;n no encontrada');
        // require_once(VIEW_PATH_INC . "header.php");
        require_once(VIEW_PATH_INC . "top_page.php");
        require_once(VIEW_PATH_INC . "menu_no_auth.php");
        require_once(VIEW_PATH_INC . "footer.php");
        // showErrorPage(1, "", 'HTTP/1.0 400 Bad Request', 400);
        // require_once(VIEW_PATH_INC . "footer.html");
    } else {
        //$obj->$event();
        call_user_func(array($obj, $event));
    }
}

handlerRouter();
