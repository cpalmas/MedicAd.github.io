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
    $query = "SELECT * FROM odontologia WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
} else {
    echo "ID no especificado.";
    exit;
}

// Obtener pacientes y doctores para los dropdowns
$pacientesQuery = "SELECT id, nombre, apellido FROM pacientes";
$doctoresQuery = "SELECT id_doc, nombre, apellido FROM doctores";
$pacientesResult = $db->query($pacientesQuery);
$doctoresResult = $db->query($doctoresQuery);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener datos del formulario
    $paciente_id = $_POST['paciente_id'];
    $doctor_id = $_POST['doctor_id'];
    $historia_dental = $_POST['historia_dental'];
    $habitos = $_POST['habitos'];
    $motivo_consulta = $_POST['motivo_consulta'];
    $duracion_sintomas = $_POST['duracion_sintomas'];
    $localizacion_dolor = $_POST['localizacion_dolor'];
    $observaciones = $_POST['observaciones'];
    $estado_dientes = $_POST['estado_dientes'];
    $estado_encias = $_POST['estado_encias'];
    $diagnostico = $_POST['diagnostico'];
    $procedimientos = $_POST['procedimientos'];
    $materiales = $_POST['materiales'];
    $instrucciones_post_tratamiento = $_POST['instrucciones_post_tratamiento'];
    $radiografias = $_POST['radiografias'];
    $resultados_pruebas = $_POST['resultados_pruebas'];
    $recomendaciones = $_POST['recomendaciones'];
    $proxima_cita = $_POST['proxima_cita'];
    $comentarios_adicionales = $_POST['comentarios_adicionales'];

    // Actualizar el registro
    $query = "UPDATE odontologia SET paciente_id = ?, doctor_id = ?, historia_dental = ?, habitos = ?, motivo_consulta = ?, duracion_sintomas = ?, localizacion_dolor = ?, observaciones = ?, estado_dientes = ?, estado_encias = ?, diagnostico = ?, procedimientos = ?, materiales = ?, instrucciones_post_tratamiento = ?, radiografias = ?, resultados_pruebas = ?, recomendaciones = ?, proxima_cita = ?, comentarios_adicionales = ? WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("iisssssssssssssssssi", $paciente_id, $doctor_id, $historia_dental, $habitos, $motivo_consulta, $duracion_sintomas, $localizacion_dolor, $observaciones, $estado_dientes, $estado_encias, $diagnostico, $procedimientos, $materiales, $instrucciones_post_tratamiento, $radiografias, $resultados_pruebas, $recomendaciones, $proxima_cita, $comentarios_adicionales, $id);
    $stmt->execute();

    echo "Registro actualizado exitosamente.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Odontología</title>
    <link rel="stylesheet" href="actualizar_odontologia.css">
</head>
<body>
    <h2>Actualizar Odontología</h2>
    <form method="post">
        <label for="paciente_id">Paciente:</label>
        <select id="paciente_id" name="paciente_id" required>
            <?php while ($paciente = $pacientesResult->fetch_assoc()): ?>
                <option value="<?php echo $paciente['id']; ?>" <?php if ($row['paciente_id'] == $paciente['id']) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($paciente['nombre'] . ' ' . $paciente['apellido']); ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label for="doctor_id">Doctor:</label>
        <select id="doctor_id" name="doctor_id" required>
            <?php while ($doctor = $doctoresResult->fetch_assoc()): ?>
                <option value="<?php echo $doctor['id_doc']; ?>" <?php if ($row['doctor_id'] == $doctor['id_doc']) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($doctor['nombre'] . ' ' . $doctor['apellido']); ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label for="historia_dental">Historia Dental:</label>
        <textarea id="historia_dental" name="historia_dental" rows="4"><?php echo htmlspecialchars($row['historia_dental']); ?></textarea>

        <label for="habitos">Hábitos:</label>
        <textarea id="habitos" name="habitos" rows="4"><?php echo htmlspecialchars($row['habitos']); ?></textarea>

        <label for="motivo_consulta">Motivo de Consulta:</label>
        <textarea id="motivo_consulta" name="motivo_consulta" rows="4"><?php echo htmlspecialchars($row['motivo_consulta']); ?></textarea>

        <label for="duracion_sintomas">Duración de Síntomas:</label>
        <input type="text" id="duracion_sintomas" name="duracion_sintomas" value="<?php echo htmlspecialchars($row['duracion_sintomas']); ?>">

        <label for="localizacion_dolor">Localización del Dolor:</label>
        <input type="text" id="localizacion_dolor" name="localizacion_dolor" value="<?php echo htmlspecialchars($row['localizacion_dolor']); ?>">

        <label for="observaciones">Observaciones:</label>
        <textarea id="observaciones" name="observaciones" rows="4"><?php echo htmlspecialchars($row['observaciones']); ?></textarea>

        <label for="estado_dientes">Estado de los Dientes:</label>
        <textarea id="estado_dientes" name="estado_dientes" rows="4"><?php echo htmlspecialchars($row['estado_dientes']); ?></textarea>

        <label for="estado_encias">Estado de las Encías:</label>
        <textarea id="estado_encias" name="estado_encias" rows="4"><?php echo htmlspecialchars($row['estado_encias']); ?></textarea>

        <label for="diagnostico">Diagnóstico:</label>
        <textarea id="diagnostico" name="diagnostico" rows="4"><?php echo htmlspecialchars($row['diagnostico']); ?></textarea>

        <label for="procedimientos">Procedimientos:</label>
        <textarea id="procedimientos" name="procedimientos" rows="4"><?php echo htmlspecialchars($row['procedimientos']); ?></textarea>

        <label for="materiales">Materiales:</label>
        <textarea id="materiales" name="materiales" rows="4"><?php echo htmlspecialchars($row['materiales']); ?></textarea>

        <label for="instrucciones_post_tratamiento">Instrucciones Post-Tratamiento:</label>
        <textarea id="instrucciones_post_tratamiento" name="instrucciones_post_tratamiento" rows="4"><?php echo htmlspecialchars($row['instrucciones_post_tratamiento']); ?></textarea>

        <label for="radiografias">Radiografías:</label>
        <input type="text" id="radiografias" name="radiografias" value="<?php echo htmlspecialchars($row['radiografias']); ?>">

        <label for="resultados_pruebas">Resultados de Pruebas:</label>
        <input type="text" id="resultados_pruebas" name="resultados_pruebas" value="<?php echo htmlspecialchars($row['resultados_pruebas']); ?>">

        <label for="recomendaciones">Recomendaciones:</label>
        <textarea id="recomendaciones" name="recomendaciones" rows="4"><?php echo htmlspecialchars($row['recomendaciones']); ?></textarea>

        <label for="proxima_cita">Próxima Cita:</label>
        <input type="date" id="proxima_cita" name="proxima_cita" value="<?php echo htmlspecialchars($row['proxima_cita']); ?>">

        <label for="comentarios_adicionales">Comentarios Adicionales:</label>
        <textarea id="comentarios_adicionales" name="comentarios_adicionales" rows="4"><?php echo htmlspecialchars($row['comentarios_adicionales']); ?></textarea>

        <input type="submit" value="Actualizar Registro">
    </form>
</body>
</html>
