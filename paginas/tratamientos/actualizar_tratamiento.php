<?php
// Configuración de la base de datos
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'medicad';
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Verificar conexión
if ($db->connect_error) {
    die("Conexión fallida: " . $db->connect_error);
}

// Obtener el ID del tratamiento a actualizar
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Obtener el registro actual
    $query = "SELECT * FROM tratamientos WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
} else {
    echo "ID no especificado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Tratamiento</title>
    <link rel="stylesheet" href="actualizar.css">
</head>
<body>
    <div class="container">
        <h2>Actualizar Tratamiento</h2>
        <form action="actualizar.php" method="post">
            
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

            <div class="form-group">
                <label for="diagnostico_principal">Diagnóstico Principal:</label>
                <textarea id="diagnostico_principal" name="diagnostico_principal" required><?php echo htmlspecialchars($row['diagnostico_principal']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="tipo_tratamiento">Tipo de Tratamiento:</label>
                <textarea id="tipo_tratamiento" name="tipo_tratamiento"><?php echo htmlspecialchars($row['tipo_tratamiento']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="medicacion">Medicación:</label>
                <textarea id="medicacion" name="medicacion"><?php echo htmlspecialchars($row['medicacion']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="terapia">Terapia:</label>
                <textarea id="terapia" name="terapia"><?php echo htmlspecialchars($row['terapia']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="otros_tratamientos">Otros Tratamientos:</label>
                <textarea id="otros_tratamientos" name="otros_tratamientos"><?php echo htmlspecialchars($row['otros_tratamientos']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="fecha_inicio">Fecha de Inicio:</label>
                <input type="date" id="fecha_inicio" name="fecha_inicio" value="<?php echo htmlspecialchars($row['fecha_inicio']); ?>">
            </div>

            <div class="form-group">
                <label for="duracion_tratamiento">Duración del Tratamiento:</label>
                <input type="text" id="duracion_tratamiento" name="duracion_tratamiento" value="<?php echo htmlspecialchars($row['duracion_tratamiento']); ?>">
            </div>

            <div class="form-group">
                <label for="frecuencia_tratamiento">Frecuencia del Tratamiento:</label>
                <input type="text" id="frecuencia_tratamiento" name="frecuencia_tratamiento" value="<?php echo htmlspecialchars($row['frecuencia_tratamiento']); ?>">
            </div>

            <div class="form-group">
                <label for="mejoria">Mejoría:</label>
                <textarea id="mejoria" name="mejoria"><?php echo htmlspecialchars($row['mejoria']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="cambios_observados">Cambios Observados:</label>
                <textarea id="cambios_observados" name="cambios_observados"><?php echo htmlspecialchars($row['cambios_observados']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="cumplimiento_tratamiento">Cumplimiento del Tratamiento:</label>
                <input type="text" id="cumplimiento_tratamiento" name="cumplimiento_tratamiento" value="<?php echo htmlspecialchars($row['cumplimiento_tratamiento']); ?>">
            </div>

            <div class="form-group">
                <label for="impedimentos">Impedimentos:</label>
                <textarea id="impedimentos" name="impedimentos"><?php echo htmlspecialchars($row['impedimentos']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="efectos_secundarios">Efectos Secundarios:</label>
                <textarea id="efectos_secundarios" name="efectos_secundarios"><?php echo htmlspecialchars($row['efectos_secundarios']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="reduccion_dosis">Reducción de Dosis:</label>
                <textarea id="reduccion_dosis" name="reduccion_dosis"><?php echo htmlspecialchars($row['reduccion_dosis']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="ajustes_necessarios">Ajustes Necesarios:</label>
                <textarea id="ajustes_necessarios" name="ajustes_necessarios"><?php echo htmlspecialchars($row['ajustes_necessarios']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="recomendaciones">Recomendaciones:</label>
                <textarea id="recomendaciones" name="recomendaciones"><?php echo htmlspecialchars($row['recomendaciones']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="proxima_cita_fecha">Próxima Cita - Fecha:</label>
                <input type="date" id="proxima_cita_fecha" name="proxima_cita_fecha" value="<?php echo htmlspecialchars($row['proxima_cita_fecha']); ?>">
            </div>

            <div class="form-group">
                <label for="proxima_cita_hora">Próxima Cita - Hora:</label>
                <input type="time" id="proxima_cita_hora" name="proxima_cita_hora" value="<?php echo htmlspecialchars($row['proxima_cita_hora']); ?>">
            </div>

            <div class="form-group">
                <label for="comentarios_adicionales">Comentarios Adicionales:</label>
                <textarea id="comentarios_adicionales" name="comentarios_adicionales"><?php echo htmlspecialchars($row['comentarios_adicionales']); ?></textarea>
            </div>

            <div class="form-group">
                <button class="la_button" type="submit">Actualizar Registro</button>
            </div>
        </form>
    </div>
</body>
</html>
