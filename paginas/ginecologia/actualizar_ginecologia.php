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

// Obtener el ID del registro a actualizar
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Obtener el registro actual
    $query = "SELECT * FROM ginecologia WHERE id = ?";
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
    <title>Actualizar Ginecología</title>
    <link rel="stylesheet" href="actualizar.css">
</head>
<body>
    <h2>Actualizar Ginecología</h2>
    <form method="post" action="actualizar.php">
        <!-- Campo oculto para ID -->
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">

        <label for="fecha_cita_ginecologica">Fecha de Cita Ginecológica:</label>
        <input type="datetime-local" id="fecha_cita_ginecologica" name="fecha_cita_ginecologica" value="<?php echo htmlspecialchars(date('Y-m-d\TH:i', strtotime($row['fecha_cita_ginecologica']))); ?>">

        <label for="ultimo_examen">Último Examen:</label>
        <input type="date" id="ultimo_examen" name="ultimo_examen" value="<?php echo htmlspecialchars($row['ultimo_examen']); ?>">

        <label for="menarca">Menarca:</label>
        <input type="number" id="menarca" name="menarca" value="<?php echo htmlspecialchars($row['menarca']); ?>">

        <label for="ciclidad_menstrual">Ciclidad Menstrual:</label>
        <input type="text" id="ciclidad_menstrual" name="ciclidad_menstrual" value="<?php echo htmlspecialchars($row['ciclidad_menstrual']); ?>">

        <label for="embarazos_previos">Embarazos Previos:</label>
        <input type="number" id="embarazos_previos" name="embarazos_previos" value="<?php echo htmlspecialchars($row['embarazos_previos']); ?>">

        <label for="partos">Partos:</label>
        <input type="number" id="partos" name="partos" value="<?php echo htmlspecialchars($row['partos']); ?>">

        <label for="abortos">Abortos:</label>
        <input type="number" id="abortos" name="abortos" value="<?php echo htmlspecialchars($row['abortos']); ?>">

        <label for="problemas_menstruales">Problemas Menstruales:</label>
        <textarea id="problemas_menstruales" name="problemas_menstruales" rows="4"><?php echo htmlspecialchars($row['problemas_menstruales']); ?></textarea>

        <label for="motivo_consulta">Motivo de Consulta:</label>
        <textarea id="motivo_consulta" name="motivo_consulta" rows="4" required><?php echo htmlspecialchars($row['motivo_consulta']); ?></textarea>

        <label for="duracion_sintomas">Duración de Síntomas:</label>
        <input type="text" id="duracion_sintomas" name="duracion_sintomas" value="<?php echo htmlspecialchars($row['duracion_sintomas']); ?>">

        <label for="localizacion_sintomas">Localización de Síntomas:</label>
        <input type="text" id="localizacion_sintomas" name="localizacion_sintomas" value="<?php echo htmlspecialchars($row['localizacion_sintomas']); ?>">

        <label for="sintomas_actuales">Síntomas Actuales:</label>
        <textarea id="sintomas_actuales" name="sintomas_actuales" rows="4"><?php echo htmlspecialchars($row['sintomas_actuales']); ?></textarea>

        <label for="cambios_ciclo_menstrual">Cambios en el Ciclo Menstrual:</label>
        <textarea id="cambios_ciclo_menstrual" name="cambios_ciclo_menstrual" rows="4"><?php echo htmlspecialchars($row['cambios_ciclo_menstrual']); ?></textarea>

        <label for="dolor_malestar">Dolor o Malestar:</label>
        <textarea id="dolor_malestar" name="dolor_malestar" rows="4"><?php echo htmlspecialchars($row['dolor_malestar']); ?></textarea>

        <label for="resultados_examenes">Resultados de Exámenes:</label>
        <textarea id="resultados_examenes" name="resultados_examenes" rows="4"><?php echo htmlspecialchars($row['resultados_examenes']); ?></textarea>

        <label for="radiografias">Radiografías:</label>
        <input type="text" id="radiografias" name="radiografias" value="<?php echo htmlspecialchars($row['radiografias']); ?>">

        <label for="resultados_pruebas">Resultados de Pruebas:</label>
        <input type="text" id="resultados_pruebas" name="resultados_pruebas" value="<?php echo htmlspecialchars($row['resultados_pruebas']); ?>">

        <label for="tratamiento_recomendado">Tratamiento Recomendado:</label>
        <textarea id="tratamiento_recomendado" name="tratamiento_recomendado" rows="4"><?php echo htmlspecialchars($row['tratamiento_recomendado']); ?></textarea>

        <label for="recomendaciones">Recomendaciones:</label>
        <textarea id="recomendaciones" name="recomendaciones" rows="4"><?php echo htmlspecialchars($row['recomendaciones']); ?></textarea>

        <label for="proxima_cita">Próxima Cita:</label>
        <input type="date" id="proxima_cita" name="proxima_cita" value="<?php echo htmlspecialchars($row['proxima_cita']); ?>">

        <label for="hora_cita">Hora de Cita:</label>
        <input type="time" id="hora_cita" name="hora_cita" value="<?php echo htmlspecialchars($row['hora_cita']); ?>">

        <label for="comentarios_adicionales">Comentarios Adicionales:</label>
        <textarea id="comentarios_adicionales" name="comentarios_adicionales" rows="4"><?php echo htmlspecialchars($row['comentarios_adicionales']); ?></textarea>

         <button type="submit" class="la_button">Actualizar Registro</button>
    </form>
</body>
</html>
