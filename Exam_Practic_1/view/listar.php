<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Empleados</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h2>Listado de Empleados</h2>
        <a href="index.php?accion=registrar" style="float:right; margin-bottom: 16px;">Registrar nuevo empleado</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Salario Base</th>
                    <th>Comisión (%)</th>
                    <th>Salario Total</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($empleados)): ?>
                    <tr><td colspan="5">No hay empleados registrados.</td></tr>
                <?php else: ?>
                    <?php foreach ($empleados as $emp): ?>
                        <tr>
                            <td><?= $emp['id'] ?></td>
                            <td><?= htmlspecialchars($emp['nombre']) ?></td>
                            <td>$<?= number_format($emp['salario_base'], 2) ?></td>
                            <td><?= number_format($emp['comision_pct'], 2) ?>%</td>
                            <td>$<?= number_format($emp['salario_base'] + ($emp['salario_base'] * $emp['comision_pct'] / 100), 2) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
