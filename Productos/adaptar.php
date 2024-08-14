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

// Verificar si se ha enviado una solicitud POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener el ID del producto desde el formulario
    $product_id = isset($_POST['id']) ? intval($_POST['id']) : 0;

    // Recoger datos del formulario
    $nombre = isset($_POST['nombre']) ? $db->real_escape_string($_POST['nombre']) : '';
    $precio = isset($_POST['precio']) ? floatval($_POST['precio']) : 0.0;
    $descripcion = isset($_POST['descripcion']) ? $db->real_escape_string($_POST['descripcion']) : '';
    $descuento = isset($_POST['descuento']) ? intval($_POST['descuento']) : 0;

    // Manejar imagen si se ha subido una nueva
    $imgContent = null;
    if (!empty($_FILES['image']['tmp_name'])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = file_get_contents($image);
        } else {
            echo "<p class='error'>El archivo subido no es una imagen válida.</p>";
            exit;
        }
    }

    // Construir la consulta SQL
    $query = "UPDATE productos SET nombre = ?, precio = ?, descripcion = ?, descuento = ?";
    
    if ($imgContent !== null) {
        $query .= ", imagen = ?";
    }
    
    $query .= " WHERE id = ?";

    // Preparar la consulta
    $stmt = $db->prepare($query);

    if ($stmt === false) {
        die("Error al preparar la consulta: " . $db->error);
    }

    // Enlazar los parámetros y ejecutar la consulta
    if ($imgContent !== null) {
        // Enviar los datos binarios de la imagen
        $stmt->bind_param("sdssi", $nombre, $precio, $descripcion, $descuento, $product_id);
        $stmt->send_long_data(4, $imgContent); // Enviar imagen como parámetro largo
    } else {
        // Asignar los parámetros sin la imagen
        $stmt->bind_param("sdsi", $nombre, $precio, $descripcion, $descuento, $product_id);
    }

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo '<script>alert("Producto actualizado correctamente."); window.location.href = "vista_prod.php";</script>';
    } else {
        echo '<script>alert("Fallo al actualizar producto."); window.location.href = "vista_prod.php";</script>';
        echo "Error: " . $stmt->error;
    }

    // Cerrar declaración y conexión
    $stmt->close();
    $db->close();
} else {
    echo "<p class='error'>Solicitud no válida.</p>";
}
?>
