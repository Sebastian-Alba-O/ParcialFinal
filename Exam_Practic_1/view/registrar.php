<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Empleado</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h2>Registrar Empleado</h2>
        <form action="index.php?accion=guardar" method="post">
            <label>Nombre:</label>
            <input type="text" name="nombre" required>
            <label>Salario Base:</label>
            <input type="number" name="salario_base" step="0.01" required>
            <label>Comisión (%):</label>
            <input type="number" name="comision" step="0.01" required>
            <input type="submit" value="Registrar">
        </form>
        <a href="index.php">Volver al listado</a>
    </div>
</body>
</html>
