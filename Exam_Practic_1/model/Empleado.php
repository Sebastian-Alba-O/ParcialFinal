<?php
require_once 'Conexion.php';

class Empleado {
    public $id;
    public $nombre;
    public $salario_base;
    public $comision;

    public static function listar() {
        $conexion = new Conexion();
        $sql = "SELECT * FROM empleados";
        $result = $conexion->conn->query($sql);
        $empleados = [];
        while ($row = $result->fetch_assoc()) {
            $empleados[] = $row;
        }
        return $empleados;
    }

    public static function guardar($nombre, $salario_base, $comision) {
        $conexion = new Conexion();
        $stmt = $conexion->conn->prepare("INSERT INTO empleados (nombre, salario_base, comision) VALUES (?, ?, ?)");
        $stmt->bind_param("sdd", $nombre, $salario_base, $comision);
        return $stmt->execute();
    }
}
?>
