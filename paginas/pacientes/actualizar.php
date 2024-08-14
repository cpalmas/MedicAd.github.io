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

// Obtener datos del formulario
$id = intval($_POST['id']);
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
$identificacion = $_POST['identificacion'];
$historial_medico = $_POST['historial_medico'];

// Actualizar registro en la base de datos
$sql = "UPDATE pacientes SET
    nombre='$nombre',
    apellido='$apellido',
    fecha_nacimiento='$fecha_nacimiento',
    sexo='$sexo',
    telefono='$telefono',
    correo='$correo',
    direccion='$direccion',
    ciudad='$ciudad',
    estado='$estado',
    codigo_postal='$codigo_postal',
    enfermedades_cronicas='$enfermedades_cronicas',
    alergias='$alergias',
    medicamentos='$medicamentos',
    historial_familiar='$historial_familiar',
    contacto_emergencia_nombre='$contacto_emergencia_nombre',
    contacto_emergencia_telefono='$contacto_emergencia_telefono',
    contacto_emergencia_relacion='$contacto_emergencia_relacion',
    identificacion='$identificacion',
    historial_medico='$historial_medico'
    WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Registro actualizado exitosamente.";
} else {
    echo "Error al actualizar el registro: " . $conn->error;
}

$conn->close();
?>
