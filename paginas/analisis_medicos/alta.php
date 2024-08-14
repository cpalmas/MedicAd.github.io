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
$tipo_analisis = $_POST['tipo_analisis'];
$glucosa = $_POST['glucosa'];
$urea = $_POST['urea'];
$creatinina = $_POST['creatinina'];
$acido_urico = $_POST['acido_urico'];
$colesterol = $_POST['colesterol'];
$trigliceridos = $_POST['trigliceridos'];
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

$query = "INSERT INTO analisis_medicos (
    paciente_id, doctor_id, tipo_analisis, glucosa, urea, creatinina, acido_urico, colesterol, trigliceridos, biometria_hematica, examen_orina, prueba_vih, prueba_vph, prueba_hepatitis, antigeno_prostatico, tele_torax, espirometria, electrocardiograma, otros_resultados, comentarios
) VALUES (
    '$paciente_id', '$doctor_id', '$tipo_analisis', '$glucosa', '$urea', '$creatinina', '$acido_urico', '$colesterol', '$trigliceridos', '$biometria_hematica', '$examen_orina', '$prueba_vih', '$prueba_vph', '$prueba_hepatitis', '$antigeno_prostatico', '$tele_torax', '$espirometria', '$electrocardiograma', '$otros_resultados', '$comentarios'
)";

if ($db->query($query) === TRUE) {
    echo "Nuevo análisis médico registrado correctamente";
} else {
    echo "Error: " . $query . "<br>" . $db->error;
}

$db->close();
?>
