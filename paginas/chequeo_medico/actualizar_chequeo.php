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
    $query = "SELECT * FROM chequeo_medico WHERE id = ?";
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
    $glucosa = $_POST['glucosa'];
    $urea = $_POST['urea'];
    $creatinina = $_POST['creatinina'];
    $acido_urico = $_POST['acido_urico'];
    $colesterol = $_POST['colesterol'];
    $trigliceridos = $_POST['trigliceridos'];
    $biometria_hematica = $_POST['biometria_hematica'];
    $examen_orina = $_POST['examen_orina'];
    $prueba_vih = $_POST['prueba_vih'];
    $prueba_vph = $_POST['prueba_vph'];
    $prueba_hepatitis = $_POST['prueba_hepatitis'];
    $antigeno_prostatico = $_POST['antigeno_prostatico'];
    $tele_torax = $_POST['tele_torax'];
    $espirometria = $_POST['espirometria'];
    $electrocardiograma = $_POST['electrocardiograma'];

    // Actualizar el registro
    $query = "UPDATE chequeo_medico SET paciente_id = ?, doctor_id = ?, glucosa = ?, urea = ?, creatinina = ?, acido_urico = ?, colesterol = ?, trigliceridos = ?, biometria_hematica = ?, examen_orina = ?, prueba_vih = ?, prueba_vph = ?, prueba_hepatitis = ?, antigeno_prostatico = ?, tele_torax = ?, espirometria = ?, electrocardiograma = ? WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("iiddiddssssssssssi", $paciente_id, $doctor_id, $glucosa, $urea, $creatinina, $acido_urico, $colesterol, $trigliceridos, $biometria_hematica, $examen_orina, $prueba_vih, $prueba_vph, $prueba_hepatitis, $antigeno_prostatico, $tele_torax, $espirometria, $electrocardiograma, $id);
    $stmt->execute();

    echo "Registro actualizado exitosamente.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Chequeo Médico</title>
    <link rel="stylesheet" href="actualizar_chequeo.css">
</head>
<body>
    <h2>Actualizar Chequeo Médico</h2>
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

        <label for="glucosa">Glucosa:</label>
        <input type="number" id="glucosa" name="glucosa" step="0.01" value="<?php echo htmlspecialchars($row['glucosa']); ?>">

        <label for="urea">Urea:</label>
        <input type="number" id="urea" name="urea" step="0.01" value="<?php echo htmlspecialchars($row['urea']); ?>">

        <label for="creatinina">Creatinina:</label>
        <input type="number" id="creatinina" name="creatinina" step="0.01" value="<?php echo htmlspecialchars($row['creatinina']); ?>">

        <label for="acido_urico">Ácido Úrico:</label>
        <input type="number" id="acido_urico" name="acido_urico" step="0.01" value="<?php echo htmlspecialchars($row['acido_urico']); ?>">

        <label for="colesterol">Colesterol:</label>
        <input type="number" id="colesterol" name="colesterol" step="0.01" value="<?php echo htmlspecialchars($row['colesterol']); ?>">

        <label for="trigliceridos">Triglicéridos:</label>
        <input type="number" id="trigliceridos" name="trigliceridos" step="0.01" value="<?php echo htmlspecialchars($row['trigliceridos']); ?>">

        <label for="biometria_hematica">Biometría Hemática:</label>
        <input type="text" id="biometria_hematica" name="biometria_hematica" value="<?php echo htmlspecialchars($row['biometria_hematica']); ?>">

        <label for="examen_orina">Examen de Orina:</label>
        <input type="text" id="examen_orina" name="examen_orina" value="<?php echo htmlspecialchars($row['examen_orina']); ?>">

        <label for="prueba_vih">Prueba VIH:</label>
        <input type="text" id="prueba_vih" name="prueba_vih" value="<?php echo htmlspecialchars($row['prueba_vih']); ?>">

        <label for="prueba_vph">Prueba VPH:</label>
        <input type="text" id="prueba_vph" name="prueba_vph" value="<?php echo htmlspecialchars($row['prueba_vph']); ?>">

        <label for="prueba_hepatitis">Prueba Hepatitis:</label>
        <input type="text" id="prueba_hepatitis" name="prueba_hepatitis" value="<?php echo htmlspecialchars($row['prueba_hepatitis']); ?>">

        <label for="antigeno_prostatico">Antígeno Prostático:</label>
        <input type="text" id="antigeno_prostatico" name="antigeno_prostatico" value="<?php echo htmlspecialchars($row['antigeno_prostatico']); ?>">

        <label for="tele_torax">Tele de Tórax:</label>
        <input type="text" id="tele_torax" name="tele_torax" value="<?php echo htmlspecialchars($row['tele_torax']); ?>">

        <label for="espirometria">Espirometría:</label>
        <input type="text" id="espirometria" name="espirometria" value="<?php echo htmlspecialchars($row['espirometria']); ?>">

        <label for="electrocardiograma">Electrocardiograma:</label>
        <input type="text" id="electrocardiograma" name="electrocardiograma" value="<?php echo htmlspecialchars($row['electrocardiograma']); ?>">

        <input type="submit" value="Actualizar Registro">
    </form>
</body>
</html>
