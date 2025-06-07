<?php
require_once 'conexion.php';

class Empleado {
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
        $stmt = $conexion->conn->prepare("INSERT INTO empleados (nombre, salario_base, comision_pct) VALUES (?, ?, ?)");
        $stmt->bind_param("sdd", $nombre, $salario_base, $comision);
        return $stmt->execute();
    }
}
?>