<?php
// controller/EmpleadoController.php
require_once __DIR__ . '/../model/Empleado.php';

class EmpleadoController {
    public function listar() {
        $empleados = Empleado::listar();
        require __DIR__ . '/../view/listar.php';
    }

    public function registrar() {
        require __DIR__ . '/../view/registrar.php';
    }

    public function guardar() {
        if (isset($_POST['nombre'], $_POST['salario_base'], $_POST['comision'])) {
            $nombre = $_POST['nombre'];
            $salario_base = floatval($_POST['salario_base']);
            $comision = floatval($_POST['comision']);
            Empleado::guardar($nombre, $salario_base, $comision);
        }
        header('Location: index.php');
        exit();
    }
}
?>
