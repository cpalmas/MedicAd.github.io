<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'medicad';
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Conexión fallida: " . $db->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Obtener el registro actual
    $query = "SELECT * FROM doctores WHERE id_doc = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
} else {
    echo "ID no especificado.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $especialidad = $_POST['especialidad'];
    $numero_licencia = $_POST['numero_licencia'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $telefono = $_POST['telefono'];
    $correo_electronico = $_POST['correo_electronico'];
    $direccion = $_POST['direccion'];

    // Actualizar el registro
    $query = "UPDATE doctores SET nombre = ?, apellido = ?, especialidad = ?, numero_licencia = ?, fecha_nacimiento = ?, telefono = ?, correo_electronico = ?, direccion = ? WHERE id_doc = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("ssssssssi", $nombre, $apellido, $especialidad, $numero_licencia, $fecha_nacimiento, $telefono, $correo_electronico, $direccion, $id);
    $stmt->execute();

    echo "Registro actualizado exitosamente.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Doctor</title>
    <link rel="stylesheet" href="actualizar_doctor.css">
</head>
<body>
    <h2>Actualizar Doctor</h2>
    <form method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($row['nombre']); ?>" required>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" value="<?php echo htmlspecialchars($row['apellido']); ?>" required>

        <label for="especialidad">Especialidad:</label>
        <input type="text" id="especialidad" name="especialidad" value="<?php echo htmlspecialchars($row['especialidad']); ?>">

        <label for="numero_licencia">Número de Licencia:</label>
        <input type="text" id="numero_licencia" name="numero_licencia" value="<?php echo htmlspecialchars($row['numero_licencia']); ?>" required>

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo htmlspecialchars($row['fecha_nacimiento']); ?>">

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" value="<?php echo htmlspecialchars($row['telefono']); ?>">

        <label for="correo_electronico">Correo Electrónico:</label>
        <input type="email" id="correo_electronico" name="correo_electronico" value="<?php echo htmlspecialchars($row['correo_electronico']); ?>">

        <label for="direccion">Dirección:</label>
        <textarea id="direccion" name="direccion" rows="4"><?php echo htmlspecialchars($row['direccion']); ?></textarea>

        <input type="submit" value="Actualizar">
    </form>
</body>
</html>
