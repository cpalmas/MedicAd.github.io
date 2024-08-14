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

// Recoger los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$especialidad = $_POST['especialidad'];
$numero_licencia = $_POST['numero_licencia'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$telefono = $_POST['telefono'];
$correo_electronico = $_POST['correo_electronico'];
$direccion = $_POST['direccion'];

// Insertar datos en la base de datos
$sql = "INSERT INTO doctores (nombre, apellido, especialidad, numero_licencia, fecha_nacimiento, telefono, correo_electronico, direccion)
        VALUES ('$nombre', '$apellido', '$especialidad', '$numero_licencia', '$fecha_nacimiento', '$telefono', '$correo_electronico', '$direccion')";

if ($db->query($sql) === TRUE) {
    echo "Nuevo doctor registrado con éxito.";
    header("Location: administracion_doctores.php"); // Redirige a la página de administración
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

$db->close();
?>
