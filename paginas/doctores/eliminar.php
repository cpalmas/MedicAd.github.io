<?php
// Verificar que se ha pasado un ID a través de la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']); // Usar el nombre correcto del parámetro

    // Conexión a la base de datos
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'medicad';
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if ($db->connect_error) {
        die("Conexión fallida: " . $db->connect_error);
    }

    // Iniciar una transacción
    $db->begin_transaction();

    try {
        // Eliminar registros dependientes si es necesario
        $sql = "DELETE FROM chequeo_medico WHERE doctor_id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();

        // Eliminar el registro del doctor
        $sql = "DELETE FROM doctores WHERE id_doc = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();

        // Confirmar la transacción
        $db->commit();
        
        // Redirigir a la página de la tabla con un mensaje de éxito
        header("Location: administracion_doctores.php?msg=success");
    } catch (Exception $e) {
        // Si hay un error, revertir la transacción
        $db->rollback();
        
        // Redirigir a la página de la tabla con un mensaje de error
        header("Location: administracion_doctores.php?msg=error");
    }

    $db->close();
} else {
    // Redirigir a la página de la tabla con un mensaje de error si no se ha proporcionado un ID válido
    header("Location: administracion_doctores.php?msg=invalid");
}
?>
