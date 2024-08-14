<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medicad";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Variables del formulario
    $categoria = $_POST['categoria'];
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $sexo = $_POST['sexo'];
    $numero_telefonico = $_POST['estado_civil'];
    $correo_electronico = $_POST['ocupacion'];
    $lugar_residencia = $_POST['residencia'];
    $motivo = $_POST['motivo'];
    $historia = $_POST['historia'];
    $enfermedades = $_POST['enfermedades'];
    $cirugias = $_POST['cirugias'];
    $alergias = $_POST['alergias'];
    $medicamentos = $_POST['medicamentos'];
    $vacunaciones = $_POST['vacunaciones'];
    $antecedentes_familiares = $_POST['familiares'];
    $menarca = $_POST['menarca'];
    $ciclo = $_POST['ciclo'];
    $embarazos = $_POST['embarazos'];
    $ultima_menstruacion = $_POST['ultima_menstruacion'];
    $tabaquismo = $_POST['tabaquismo'];
    $consumo_alcohol = $_POST['alcohol'];
    $uso_drogas = $_POST['drogas'];
    $actividad_fisica = $_POST['actividad'];
    $dieta = $_POST['dieta'];
    $sueno = $_POST['sueno'];
    $antecedentes_psicosociales = $_POST['psicosociales'];

   
    $sql = "INSERT INTO pacientes (categoria, nombre, edad, sexo, numero_telefonico, correo_electronico, lugar_residencia, motivo, historia, enfermedades, cirugias, alergias, medicamentos, vacunaciones, antecedentes_familiares, menarca, ciclo, embarazos, ultima_menstruacion, tabaquismo, consumo_alcohol, uso_drogas, actividad_fisica, dieta, sueno, antecedentes_psicosociales)
            VALUES ('$categoria', '$nombre', $edad, '$sexo', '$numero_telefonico', '$correo_electronico', '$lugar_residencia', '$motivo', '$historia', '$enfermedades', '$cirugias', '$alergias', '$medicamentos', '$vacunaciones', '$antecedentes_familiares', '$menarca', '$ciclo', '$embarazos', '$ultima_menstruacion', '$tabaquismo', '$consumo_alcohol', '$uso_drogas', '$actividad_fisica', '$dieta', '$sueno', '$antecedentes_psicosociales')";

   
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Usuario registrado correctamente"); window.location.href = "datos.html";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Cerrar conexión
$conn->close();
?>
