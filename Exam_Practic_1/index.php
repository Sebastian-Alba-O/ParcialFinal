<?php
$accion = isset($_GET['accion']) ? $_GET['accion'] : 'listar';

require_once 'controller/EmpleadoController.php';
$controller = new EmpleadoController();

switch ($accion) {
    case 'registrar':
        $controller->registrar();
        break;
    case 'guardar':
        $controller->guardar();
        break;
    default:
        $controller->listar();
        break;
}
?>
