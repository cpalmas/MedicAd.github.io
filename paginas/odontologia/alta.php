<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'medicad';
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Conexión fallida: " . $db->connect_error);
}

$paciente_id = $_POST['paciente_id'];
$doctor_id = $_POST['doctor_id'];
$fecha_cita_dental = $_POST['fecha_cita_dental'];
$historia_dental = $_POST['historia_dental'];
$habitos = $_POST['habitos'];
$motivo_consulta = $_POST['motivo_consulta'];
$duracion_sintomas = $_POST['duracion_sintomas'];
$localizacion_dolor = $_POST['localizacion_dolor'];
$observaciones = $_POST['observaciones'];
$estado_dientes = $_POST['estado_dientes'];
$estado_encias = $_POST['estado_encias'];
$diagnostico = $_POST['diagnostico'];
$procedimientos = $_POST['procedimientos'];
$materiales = $_POST['materiales'];
$instrucciones_post_tratamiento = $_POST['instrucciones_post_tratamiento'];
$radiografias = $_POST['radiografias'];
$resultados_pruebas = $_POST['resultados_pruebas'];
$recomendaciones = $_POST['recomendaciones'];
$proxima_cita = $_POST['proxima_cita'];
$comentarios_adicionales = $_POST['comentarios_adicionales'];

$query = "INSERT INTO odontologia (
    paciente_id, doctor_id, fecha_cita_dental, historia_dental, habitos, motivo_consulta, duracion_sintomas, localizacion_dolor, observaciones, estado_dientes, estado_encias, diagnostico, procedimientos, materiales, instrucciones_post_tratamiento, radiografias, resultados_pruebas, recomendaciones, proxima_cita, comentarios_adicionales
) VALUES (
    '$paciente_id', '$doctor_id', '$fecha_cita_dental', '$historia_dental', '$habitos', '$motivo_consulta', '$duracion_sintomas', '$localizacion_dolor', '$observaciones', '$estado_dientes', '$estado_encias', '$diagnostico', '$procedimientos', '$materiales', '$instrucciones_post_tratamiento', '$radiografias', '$resultados_pruebas', '$recomendaciones', '$proxima_cita', '$comentarios_adicionales'
)";

if ($db->query($query) === TRUE) {
    echo "Nueva consulta dental registrada correctamente";
} else {
    echo "Error: " . $query . "<br>" . $db->error;
}

$db->close();
?>
