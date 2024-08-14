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
$fecha_cita_ginecologica = $_POST['fecha_cita_ginecologica'];
$ultimo_examen = $_POST['ultimo_examen'];
$menarca = $_POST['menarca'];
$ciclidad_menstrual = $_POST['ciclidad_menstrual'];
$embarazos_previos = $_POST['embarazos_previos'];
$partos = $_POST['partos'];
$abortos = $_POST['abortos'];
$problemas_menstruales = $_POST['problemas_menstruales'];
$motivo_consulta = $_POST['motivo_consulta'];
$duracion_sintomas = $_POST['duracion_sintomas'];
$localizacion_sintomas = $_POST['localizacion_sintomas'];
$sintomas_actuales = $_POST['sintomas_actuales'];
$cambios_ciclo_menstrual = $_POST['cambios_ciclo_menstrual'];
$dolor_malestar = $_POST['dolor_malestar'];
$resultados_examenes = $_POST['resultados_examenes'];
$radiografias = $_POST['radiografias'];
$resultados_pruebas = $_POST['resultados_pruebas'];
$tratamiento_recomendado = $_POST['tratamiento_recomendado'];
$recomendaciones = $_POST['recomendaciones'];
$proxima_cita = $_POST['proxima_cita'];
$hora_cita = $_POST['hora_cita'];
$comentarios_adicionales = $_POST['comentarios_adicionales'];

$query = "INSERT INTO ginecologia (
    paciente_id, doctor_id, fecha_cita_ginecologica, ultimo_examen, menarca, ciclidad_menstrual, embarazos_previos, partos, abortos, problemas_menstruales, motivo_consulta, duracion_sintomas, localizacion_sintomas, sintomas_actuales, cambios_ciclo_menstrual, dolor_malestar, resultados_examenes, radiografias, resultados_pruebas, tratamiento_recomendado, recomendaciones, proxima_cita, hora_cita, comentarios_adicionales
) VALUES (
    '$paciente_id', '$doctor_id', '$fecha_cita_ginecologica', '$ultimo_examen', '$menarca', '$ciclidad_menstrual', '$embarazos_previos', '$partos', '$abortos', '$problemas_menstruales', '$motivo_consulta', '$duracion_sintomas', '$localizacion_sintomas', '$sintomas_actuales', '$cambios_ciclo_menstrual', '$dolor_malestar', '$resultados_examenes', '$radiografias', '$resultados_pruebas', '$tratamiento_recomendado', '$recomendaciones', '$proxima_cita', '$hora_cita', '$comentarios_adicionales'
)";

if ($db->query($query) === TRUE) {
    echo "Cita ginecológica registrada correctamente";
} else {
    echo "Error: " . $query . "<br>" . $db->error;
}

$db->close();
?>
