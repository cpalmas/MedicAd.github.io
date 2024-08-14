<?php
// Conexión a la base de datos
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'medicad';
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Conexión fallida: " . $db->connect_error);
}

// Verificar que se ha pasado un ID a través de la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // Si se ha enviado el formulario, actualizar la base de datos
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recuperar los datos del formulario
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $descuento = $_POST['descuento'];

        // Actualizar el producto en la base de datos
        $sql = "UPDATE productos SET nombre=?, precio=?, descripcion=?, descuento=? WHERE id=?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param('sdssi', $nombre, $precio, $descripcion, $descuento, $id);

        if ($stmt->execute()) {
            header("Location: administracion_prod.php?msg=success"); // Redirigir con mensaje de éxito
        } else {
            echo "<p>Error al actualizar el producto: " . $stmt->error . "</p>";
        }

        $stmt->close();
    }

    // Obtener los datos actuales del producto
    $sql = "SELECT nombre, precio, descripcion, descuento FROM productos WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "<p>No se encontraron datos para el ID proporcionado.</p>";
        exit;
    }

    $stmt->close();
} else {
    echo "<p>ID no válido.</p>";
    exit;
}

$db->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modificar Producto</title>
    <link rel="stylesheet" href="modificacion_prod.css">
    <script>
        function calcularPrecio() {
            var precioOriginal = parseFloat(document.getElementById('precio-original').value);
            var descuento = parseFloat(document.getElementById('descuento').value);
            if (!isNaN(precioOriginal) && !isNaN(descuento)) {
                var precioFinal = precioOriginal * (1 - (descuento / 100));
                document.getElementById('precio').value = precioFinal.toFixed(2);
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Modificar Producto</h2>
        <div class="form-container">
            <form action="modificacion_prod.php?id=<?php echo $id; ?>" method="post">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($row['nombre']); ?>" required>

                <label for="descuento">Descuento (%):</label>
                <input type="number" id="descuento" name="descuento" step="0.01" value="<?php echo htmlspecialchars($row['descuento']); ?>" oninput="calcularPrecio()">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" step="0.01" value="<?php echo htmlspecialchars($row['precio']); ?>" required>
                <input type="hidden" id="precio-original" value="<?php echo htmlspecialchars($row['precio']); ?>">

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" rows="4" required><?php echo htmlspecialchars($row['descripcion']); ?></textarea>

                <button type="submit">Actualizar</button>
            </form>
        </div>
    </div>
</body>
</html>
