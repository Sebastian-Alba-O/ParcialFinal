<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Empleados</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h2>Listado de Empleados</h2>
    <a href="index.php?accion=registrar">Registrar nuevo empleado</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Salario Base</th>
            <th>Comisión (%)</th>
            <th>Salario Total</th>
        </tr>
        <?php foreach ($empleados as $emp): ?>
        <tr>
            <td><?= $emp['id'] ?></td>
            <td><?= htmlspecialchars($emp['nombre']) ?></td>
            <td>$<?= number_format($emp['salario_base'], 2) ?></td>
            <td><?= number_format($emp['comision'], 2) ?>%</td>
            <td>$<?= number_format($emp['salario_base'] + ($emp['salario_base'] * $emp['comision'] / 100), 2) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
