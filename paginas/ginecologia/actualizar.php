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

// Actualizar registro en la base de datos
$sql = "UPDATE ginecologia SET
    fecha_cita_ginecologica='$fecha_cita_ginecologica',
    ultimo_examen='$ultimo_examen',
    menarca='$menarca',
    ciclidad_menstrual='$ciclidad_menstrual',
    embarazos_previos='$embarazos_previos',
    partos='$partos',
    abortos='$abortos',
    problemas_menstruales='$problemas_menstruales',
    motivo_consulta='$motivo_consulta',
    duracion_sintomas='$duracion_sintomas',
    localizacion_sintomas='$localizacion_sintomas',
    sintomas_actuales='$sintomas_actuales',
    cambios_ciclo_menstrual='$cambios_ciclo_menstrual',
    dolor_malestar='$dolor_malestar',
    resultados_examenes='$resultados_examenes',
    radiografias='$radiografias',
    resultados_pruebas='$resultados_pruebas',
    tratamiento_recomendado='$tratamiento_recomendado',
    recomendaciones='$recomendaciones',
    proxima_cita='$proxima_cita',
    hora_cita='$hora_cita',
    comentarios_adicionales='$comentarios_adicionales'
    WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Registro actualizado exitosamente.";
} else {
    echo "Error al actualizar el registro: " . $conn->error;
}

$conn->close();
?>
