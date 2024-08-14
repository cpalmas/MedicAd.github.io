<?php
// Verificar que el formulario ha sido enviado y que se han pasado todos los datos necesarios
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $sexo = $_POST['sexo'];
    $alergias = $_POST['alergias'];
    $talla = $_POST['talla'];
    $peso = $_POST['peso'];
    $imc = $_POST['imc'];
    $temperatura = $_POST['temperatura'];
    $presion = $_POST['presion'];
    $diagnostico = $_POST['diagnostico'];
    $tratamiento = $_POST['tratamiento'];

    // Conexión a la base de datos
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'medicad';
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if ($db->connect_error) {
        die("Conexión fallida: " . $db->connect_error);
    }

    // Consulta para actualizar el registro en la base de datos
    $sql = "UPDATE recetas_medicas SET nombre = ?, edad = ?, sexo = ?, alergias = ?, talla = ?, peso = ?, imc = ?, temperatura = ?, presion = ?, diagnostico = ?, tratamiento = ? WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('sisssssssssi', $nombre, $edad, $sexo, $alergias, $talla, $peso, $imc, $temperatura, $presion, $diagnostico, $tratamiento, $id);

    if ($stmt->execute()) {
        // Redirigir a la página de la receta con un mensaje de éxito
        header("Location: modificacion_cons.php?id=$id&msg=success");
    } else {
        // Redirigir a la página de edición con un mensaje de error
        header("Location: modificacion_cons.php?id=$id&msg=error");
    }

    $stmt->close();
    $db->close();
} else {
    // Redirigir a la página de la receta con un mensaje de error si los datos no son válidos
    header("Location: consultas_medicas.php?msg=invalid");
}
?>
