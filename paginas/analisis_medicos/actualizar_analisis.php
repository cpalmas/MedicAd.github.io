<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "medicad";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del análisis desde la URL o el método GET
$id = intval($_GET['id']);

// Consultar los datos del análisis médico
$sql = "SELECT * FROM analisis_medicos WHERE id = $id";
$result = $conn->query($sql);

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    // Obtener los datos del análisis
    $row = $result->fetch_assoc();
} else {
    echo "No se encontraron resultados para el análisis médico especificado.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Análisis Médico</title>
    <link rel="stylesheet" href="actualizar.css">
</head>
<body>
    <h2>Actualizar Análisis Médico</h2>
    
    <form method="post" action="actualizar.php">
        <!-- Campo oculto para enviar el ID -->
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">

        <label for="tipo_analisis">Tipo de Análisis:</label>
        <input type="text" id="tipo_analisis" name="tipo_analisis" value="<?php echo htmlspecialchars($row['tipo_analisis']); ?>" required>

        <label for="glucosa">Glucosa:</label>
        <input type="number" step="0.01" id="glucosa" name="glucosa" value="<?php echo htmlspecialchars($row['glucosa']); ?>">

        <label for="urea">Urea:</label>
        <input type="number" step="0.01" id="urea" name="urea" value="<?php echo htmlspecialchars($row['urea']); ?>">

        <label for="creatinina">Creatinina:</label>
        <input type="number" step="0.01" id="creatinina" name="creatinina" value="<?php echo htmlspecialchars($row['creatinina']); ?>">

        <label for="acido_urico">Ácido Úrico:</label>
        <input type="number" step="0.01" id="acido_urico" name="acido_urico" value="<?php echo htmlspecialchars($row['acido_urico']); ?>">

        <label for="colesterol">Colesterol:</label>
        <input type="number" step="0.01" id="colesterol" name="colesterol" value="<?php echo htmlspecialchars($row['colesterol']); ?>">

        <label for="trigliceridos">Triglicéridos:</label>
        <input type="number" step="0.01" id="trigliceridos" name="trigliceridos" value="<?php echo htmlspecialchars($row['trigliceridos']); ?>">

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

        <label for="otros_resultados">Otros Resultados:</label>
        <textarea id="otros_resultados" name="otros_resultados"><?php echo htmlspecialchars($row['otros_resultados']); ?></textarea>

        <label for="comentarios">Comentarios:</label>
        <textarea id="comentarios" name="comentarios"><?php echo htmlspecialchars($row['comentarios']); ?></textarea>

        <button type="submit" class="la_button">Actualizar Registro</button>
    </form>
</body>
</html>
