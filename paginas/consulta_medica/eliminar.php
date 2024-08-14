<?php
// Verificar que se ha pasado un ID a través de la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // Conexión a la base de datos
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'medicad';
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if ($db->connect_error) {
        die("Conexión fallida: " . $db->connect_error);
    }

    // Consulta para eliminar el registro
    $sql = "DELETE FROM recetas_medicas WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        // Redirigir a la página de la tabla con un mensaje de éxito
        header("Location: administracion_cons.php?msg=success");
    } else {
        // Redirigir a la página de la tabla con un mensaje de error
        header("Location: administracion_cons.php?msg=error");
    }

    $stmt->close();
    $db->close();
} else {
    // Redirigir a la página de la tabla con un mensaje de error si no se ha proporcionado un ID válido
    header("Location: administracion_cons.php?msg=invalid");
}
?>
