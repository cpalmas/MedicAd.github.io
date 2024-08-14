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
$tipo_analisis = $_POST['tipo_analisis'];
$glucosa = floatval($_POST['glucosa']);
$urea = floatval($_POST['urea']);
$creatinina = floatval($_POST['creatinina']);
$acido_urico = floatval($_POST['acido_urico']);
$colesterol = floatval($_POST['colesterol']);
$trigliceridos = floatval($_POST['trigliceridos']);
$biometria_hematica = $_POST['biometria_hematica'];
$examen_orina = $_POST['examen_orina'];
$prueba_vih = $_POST['prueba_vih'];
$prueba_vph = $_POST['prueba_vph'];
$prueba_hepatitis = $_POST['prueba_hepatitis'];
$antigeno_prostatico = $_POST['antigeno_prostatico'];
$tele_torax = $_POST['tele_torax'];
$espirometria = $_POST['espirometria'];
$electrocardiograma = $_POST['electrocardiograma'];
$otros_resultados = $_POST['otros_resultados'];
$comentarios = $_POST['comentarios'];

// Actualizar registro en la base de datos
$sql = "UPDATE analisis_medicos SET
    tipo_analisis='$tipo_analisis',
    glucosa='$glucosa',
    urea='$urea',
    creatinina='$creatinina',
    acido_urico='$acido_urico',
    colesterol='$colesterol',
    trigliceridos='$trigliceridos',
    biometria_hematica='$biometria_hematica',
    examen_orina='$examen_orina',
    prueba_vih='$prueba_vih',
    prueba_vph='$prueba_vph',
    prueba_hepatitis='$prueba_hepatitis',
    antigeno_prostatico='$antigeno_prostatico',
    tele_torax='$tele_torax',
    espirometria='$espirometria',
    electrocardiograma='$electrocardiograma',
    otros_resultados='$otros_resultados',
    comentarios='$comentarios'
    WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Registro actualizado exitosamente.";
} else {
    echo "Error al actualizar el registro: " . $conn->error;
}

$conn->close();
?>
