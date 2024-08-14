<?php
// Conexión a la base de datos
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'medicad';
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Verificar conexión
if ($db->connect_error) {
    die("Conexión fallida: " . $db->connect_error);
}

// Obtener el ID del registro
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Consultar el registro
    $query = "SELECT * FROM pacientes WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    
    if (!$row) {
        echo "Registro no encontrado.";
        exit;
    }
} else {
    echo "ID no especificado.";
    exit;
}

$db->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Paciente</title>
    <link rel="stylesheet" href="actualizar_pacientes.css">
</head>
<body>
    <h2>Actualizar Paciente</h2>
    <form action="actualizar.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($row['nombre']); ?>" required>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" value="<?php echo htmlspecialchars($row['apellido']); ?>" required>

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo htmlspecialchars($row['fecha_nacimiento']); ?>" required>

        <label for="sexo">Sexo:</label>
        <select id="sexo" name="sexo" required>
            <option value="femenino" <?php if ($row['sexo'] == 'femenino') echo 'selected'; ?>>Femenino</option>
            <option value="masculino" <?php if ($row['sexo'] == 'masculino') echo 'selected'; ?>>Masculino</option>
            <option value="otro" <?php if ($row['sexo'] == 'otro') echo 'selected'; ?>>Otro</option>
        </select>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" value="<?php echo htmlspecialchars($row['telefono']); ?>">

        <label for="correo">Correo Electrónico:</label>
        <input type="email" id="correo" name="correo" value="<?php echo htmlspecialchars($row['correo']); ?>">

        <label for="direccion">Dirección:</label>
        <textarea id="direccion" name="direccion" required><?php echo htmlspecialchars($row['direccion']); ?></textarea>

        <label for="ciudad">Ciudad:</label>
        <input type="text" id="ciudad" name="ciudad" value="<?php echo htmlspecialchars($row['ciudad']); ?>" required>

        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado" value="<?php echo htmlspecialchars($row['estado']); ?>" required>

        <label for="codigo_postal">Código Postal:</label>
        <input type="text" id="codigo_postal" name="codigo_postal" value="<?php echo htmlspecialchars($row['codigo_postal']); ?>">

        <label for="enfermedades_cronicas">Enfermedades Crónicas:</label>
        <textarea id="enfermedades_cronicas" name="enfermedades_cronicas"><?php echo htmlspecialchars($row['enfermedades_cronicas']); ?></textarea>

        <label for="alergias">Alergias:</label>
        <textarea id="alergias" name="alergias"><?php echo htmlspecialchars($row['alergias']); ?></textarea>

        <label for="medicamentos">Medicamentos:</label>
        <textarea id="medicamentos" name="medicamentos"><?php echo htmlspecialchars($row['medicamentos']); ?></textarea>

        <label for="historial_familiar">Historial Familiar:</label>
        <textarea id="historial_familiar" name="historial_familiar"><?php echo htmlspecialchars($row['historial_familiar']); ?></textarea>

        <label for="contacto_emergencia_nombre">Contacto de Emergencia - Nombre:</label>
        <input type="text" id="contacto_emergencia_nombre" name="contacto_emergencia_nombre" value="<?php echo htmlspecialchars($row['contacto_emergencia_nombre']); ?>" required>

        <label for="contacto_emergencia_telefono">Contacto de Emergencia - Teléfono:</label>
        <input type="text" id="contacto_emergencia_telefono" name="contacto_emergencia_telefono" value="<?php echo htmlspecialchars($row['contacto_emergencia_telefono']); ?>" required>

        <label for="contacto_emergencia_relacion">Contacto de Emergencia - Relación:</label>
        <input type="text" id="contacto_emergencia_relacion" name="contacto_emergencia_relacion" value="<?php echo htmlspecialchars($row['contacto_emergencia_relacion']); ?>" required>

        <label for="identificacion">Identificación:</label>
        <input type="text" id="identificacion" name="identificacion" value="<?php echo htmlspecialchars($row['identificacion']); ?>">

        <label for="historial_medico">Historial Médico:</label>
        <input type="text" id="historial_medico" name="historial_medico" value="<?php echo htmlspecialchars($row['historial_medico']); ?>">

        <input type="submit" value="Actualizar Registro">
    </form>
</body>
</html>
