<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medicad";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


if(isset($_POST['id'])) {
    $id = intval($_POST['id']);

    
    $sql = "DELETE FROM pacientes WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Registro eliminado correctamente."); window.location.href = "mostrar_pacientes.php";</script>';
    } else {
        echo '<script>alert("Error al eliminar el registro: "); window.location.href = "mostrar_pacientes.php";</script>';
    }
} else {
    echo '<script>alert("ID de paciente no proporcionado."); window.location.href = "mostrar_pacientes.php";</script>';
}


$conn->close();
?>
