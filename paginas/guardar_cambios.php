<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medicad";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$id = intval($_POST['id']);
$categoria = $_POST['categoria'];
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$sexo = $_POST['sexo'];
$numero_telefonico = $_POST['numero_telefonico'];
$correo_electronico = $_POST['correo_electronico'];
$lugar_residencia = $_POST['lugar_residencia'];
$motivo = $_POST['motivo'];
$historia = $_POST['historia'];
$enfermedades = $_POST['enfermedades'];
$cirugias = $_POST['cirugias'];
$alergias = $_POST['alergias'];
$medicamentos = $_POST['medicamentos'];
$vacunaciones = $_POST['vacunaciones'];
$antecedentes_familiares = $_POST['antecedentes_familiares'];
$menarca = $_POST['menarca'];
$ciclo = $_POST['ciclo'];
$embarazos = $_POST['embarazos'];
$ultima_menstruacion = $_POST['ultima_menstruacion'];
$tabaquismo = $_POST['tabaquismo'];
$consumo_alcohol = $_POST['consumo_alcohol'];
$uso_drogas = $_POST['uso_drogas'];
$actividad_fisica = $_POST['actividad_fisica'];
$dieta = $_POST['dieta'];
$sueno = $_POST['sueno'];
$antecedentes_psicosociales = $_POST['antecedentes_psicosociales'];


$sql = "UPDATE pacientes SET
    categoria='$categoria',
    nombre='$nombre',
    edad='$edad',
    sexo='$sexo',
    numero_telefonico='$numero_telefonico',
    correo_electronico='$correo_electronico',
    lugar_residencia='$lugar_residencia',
    motivo='$motivo',
    historia='$historia',
    enfermedades='$enfermedades',
    cirugias='$cirugias',
    alergias='$alergias',
    medicamentos='$medicamentos',
    vacunaciones='$vacunaciones',
    antecedentes_familiares='$antecedentes_familiares',
    menarca='$menarca',
    ciclo='$ciclo',
    embarazos='$embarazos',
    ultima_menstruacion='$ultima_menstruacion',
    tabaquismo='$tabaquismo',
    consumo_alcohol='$consumo_alcohol',
    uso_drogas='$uso_drogas',
    actividad_fisica='$actividad_fisica',
    dieta='$dieta',
    sueno='$sueno',
    antecedentes_psicosociales='$antecedentes_psicosociales'
    WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Registro actualizado exitosamente"); window.location.href = "mostrar_pacientes.php";</script>';
    exit();
} else {
    echo "Error actualizando el registro: " . $conn->error;
}


$conn->close();
?>
