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

// Actualizar registro en la base de datos
$sql = "UPDATE tratamientos SET
    diagnostico_principal='$diagnostico_principal',
    tipo_tratamiento='$tipo_tratamiento',
    medicacion='$medicacion',
    terapia='$terapia',
    otros_tratamientos='$otros_tratamientos',
    fecha_inicio='$fecha_inicio',
    duracion_tratamiento='$duracion_tratamiento',
    frecuencia_tratamiento='$frecuencia_tratamiento',
    mejoria='$mejoria',
    cambios_observados='$cambios_observados',
    cumplimiento_tratamiento='$cumplimiento_tratamiento',
    impedimentos='$impedimentos',
    efectos_secundarios='$efectos_secundarios',
    reduccion_dosis='$reduccion_dosis',
    ajustes_necessarios='$ajustes_necessarios',
    recomendaciones='$recomendaciones',
    proxima_cita_fecha='$proxima_cita_fecha',
    proxima_cita_hora='$proxima_cita_hora',
    comentarios_adicionales='$comentarios_adicionales'
    WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Registro actualizado exitosamente.";
} else {
    echo "Error al actualizar el registro: " . $conn->error;
}

$conn->close();
?>
