<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = ""; // Cambia esta línea si tienes una contraseña para MySQL
$dbname = "medicad";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Preparar y vincular
$stmt = $conn->prepare("INSERT INTO recetas_medicas (nombre, edad, sexo, alergias, talla, peso, imc, temperatura, presion, diagnostico, tratamiento) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sisssssssss", $nombre, $edad, $sexo, $alergias, $talla, $peso, $imc, $temperatura, $presion, $diagnostico, $tratamiento);

// Obtener los valores del formulario
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

// Ejecutar la declaración
if ($stmt->execute()) {
    echo '<script>alert("Receta subida correctamente"); window.location.href = "consulta_medica.php";</script>';
} else {
    echo '<script>alert("Fallo al subir receta"); window.location.href = "consulta_medica.php";</script>';
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
