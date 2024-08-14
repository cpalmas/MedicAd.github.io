<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'medicad';
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Conexión fallida: " . $db->connect_error);
}

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$sexo = $_POST['sexo'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$ciudad = $_POST['ciudad'];
$estado = $_POST['estado'];
$codigo_postal = $_POST['codigo_postal'];
$enfermedades_cronicas = $_POST['enfermedades_cronicas'];
$alergias = $_POST['alergias'];
$medicamentos = $_POST['medicamentos'];
$historial_familiar = $_POST['historial_familiar'];
$contacto_emergencia_nombre = $_POST['contacto_emergencia_nombre'];
$contacto_emergencia_telefono = $_POST['contacto_emergencia_telefono'];
$contacto_emergencia_relacion = $_POST['contacto_emergencia_relacion'];

$query = "INSERT INTO pacientes (nombre, apellido, fecha_nacimiento, sexo, telefono, correo, direccion, ciudad, estado, codigo_postal, enfermedades_cronicas, alergias, medicamentos, historial_familiar, contacto_emergencia_nombre, contacto_emergencia_telefono, contacto_emergencia_relacion) VALUES ('$nombre', '$apellido', '$fecha_nacimiento', '$sexo', '$telefono', '$correo', '$direccion', '$ciudad', '$estado', '$codigo_postal', '$enfermedades_cronicas', '$alergias', '$medicamentos', '$historial_familiar', '$contacto_emergencia_nombre', '$contacto_emergencia_telefono', '$contacto_emergencia_relacion')";

if ($db->query($query) === TRUE) {
    echo "Nuevo paciente registrado correctamente";
} else {
    echo "Error: " . $query . "<br>" . $db->error;
}

$db->close();
?>
