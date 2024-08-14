<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'medicad';
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if ($db->connect_error) {
        die("Conexión fallida: " . $db->connect_error);
    }

    $sql = "DELETE FROM tratamientos WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        header("Location: administracion_tratamientos.php?msg=success");
    } else {
        header("Location: administracion_tratamientos.php?msg=error");
    }

    $stmt->close();
    $db->close();
} else {
    header("Location: administracion_tratamientos.php?msg=invalid");
}
?>
