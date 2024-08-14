<?php
// Habilitar la visualización de errores para facilitar la depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Conectar a la base de datos
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'medicad';
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Conexión fallida: " . $db->connect_error);
}

// Obtener el ID del producto desde la solicitud GET
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($product_id > 0) {
    // Preparar la consulta SQL para eliminar el registro
    $query = "DELETE FROM productos WHERE id = ?";
    
    $stmt = $db->prepare($query);
    
    if ($stmt === false) {
        die("Error al preparar la consulta: " . $db->error);
    }
    
    // Enlazar el parámetro del ID
    $stmt->bind_param("i", $product_id);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo '<script>alert("Producto eliminado correctamente."); window.location.href = "administracion_prod.php";</script>';
    } else {
        echo '<script>alert("Fallo al eliminar el producto."); window.location.href = "administracion_prod.php";</script>';
        echo "Error: " . $stmt->error;
    }

    // Cerrar declaración y conexión
    $stmt->close();
} else {
    echo "<p class='error'>ID de producto no válido.</p>";
}

$db->close();
?>
