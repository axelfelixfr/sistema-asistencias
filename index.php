<?php
ob_start();
/*
require_once 'controllers/UsuarioController.php';
require_once 'controllers/NotaController.php';
*/
session_start();
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'views/layout/header.php';

function show_error(){
    $error = new errorController();
    $error->index();
}

// Controlador frontal, se encarga de cargar un fichero, una acción en función de lo que llega por la URL

// Primero comprobamos el controller que llega por la URL
if(isset($_GET['controller'])){
    $nombre_controlador = $_GET['controller'].'Controller';
    // Le concatenamos la palabra "Controller" para hacer más corta la URL
}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
    $nombre_controlador = controller_default;
} else {
    show_error();
    exit();
    // La función exit() es para parar la ejecución si falla el primer IF y no ejecute lo de abajo
}

// Después comprobamos la clase
if(class_exists($nombre_controlador)){
    $controlador = new $nombre_controlador();
    
    if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
        $action = $_GET['action'];
        $controlador->$action();
    }elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
        $action_default = action_default;
        $controlador->$action_default(); 
    } else{
        show_error();
        }
} else {
    show_error();
}

require_once 'views/layout/footer.php';
ob_end_flush();