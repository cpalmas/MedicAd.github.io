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
$diagnostico_principal = $_POST['diagnostico_principal'];
$tipo_tratamiento = $_POST['tipo_tratamiento'];
$medicacion = $_POST['medicacion'];
$terapia = $_POST['terapia'];
$otros_tratamientos = $_POST['otros_tratamientos'];
$fecha_inicio = $_POST['fecha_inicio'];
$duracion_tratamiento = $_POST['duracion_tratamiento'];
$frecuencia_tratamiento = $_POST['frecuencia_tratamiento'];
$mejoria = $_POST['mejoria'];
$cambios_observados = $_POST['cambios_observados'];
$cumplimiento_tratamiento = $_POST['cumplimiento_tratamiento'];
$impedimentos = $_POST['impedimentos'];
$efectos_secundarios = $_POST['efectos_secundarios'];
$reduccion_dosis = $_POST['reduccion_dosis'];
$ajustes_necessarios = $_POST['ajustes_necessarios'];
$recomendaciones = $_POST['recomendaciones'];
$proxima_cita_fecha = $_POST['proxima_cita_fecha'];
$proxima_cita_hora = $_POST['proxima_cita_hora'];
$comentarios_adicionales = $_POST['comentarios_adicionales'];

$query = "INSERT INTO tratamientos (
    paciente_id, doctor_id, diagnostico_principal, tipo_tratamiento, medicacion, terapia, otros_tratamientos, fecha_inicio, duracion_tratamiento, frecuencia_tratamiento, mejoria, cambios_observados, cumplimiento_tratamiento, impedimentos, efectos_secundarios, reduccion_dosis, ajustes_necessarios, recomendaciones, proxima_cita_fecha, proxima_cita_hora, comentarios_adicionales
) VALUES (
    '$paciente_id', '$doctor_id', '$diagnostico_principal', '$tipo_tratamiento', '$medicacion', '$terapia', '$otros_tratamientos', '$fecha_inicio', '$duracion_tratamiento', '$frecuencia_tratamiento', '$mejoria', '$cambios_observados', '$cumplimiento_tratamiento', '$impedimentos', '$efectos_secundarios', '$reduccion_dosis', '$ajustes_necessarios', '$recomendaciones', '$proxima_cita_fecha', '$proxima_cita_hora', '$comentarios_adicionales'
)";

if ($db->query($query) === TRUE) {
    echo "Nuevo tratamiento registrado correctamente";
} else {
    echo "Error: " . $query . "<br>" . $db->error;
}

$db->close();
?>
