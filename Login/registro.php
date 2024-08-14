<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medicad";

if (isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['contraseña'])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $pass = $_POST['contraseña'];

    if (empty($nombre) || empty($correo) || empty($pass)) {
        echo '<script>alert("Por favor, completa todos los campos del formulario."); window.location.href = "Login.html";</script>';
        exit();
    }

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $stmt_check = $conn->prepare("SELECT correo FROM registro WHERE correo=?");
    $stmt_check->bind_param("s", $correo);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        echo '<script>alert("El correo electrónico ingresado ya está registrado. Por favor, utiliza otro correo."); window.location.href = "Login.html";</script>';
    } else {
        $stmt_insert = $conn->prepare("INSERT INTO registro (nombre, correo, contraseña) VALUES (?, ?, ?)");
        $stmt_insert->bind_param("sss", $nombre, $correo, $pass);

        if ($stmt_insert->execute()) {
            echo '<script>alert("Registro exitoso"); window.location.href = "Login.html";</script>';
            exit();
        } else {
            echo "Error al registrar: " . $stmt_insert->error;
        }

        $stmt_insert->close();
    }

    $stmt_check->close();
    $conn->close();
} else {
    echo '<script>alert("Por favor, completa todos los campos del formulario."); window.location.href = "registro.html";</script>';
}
?>
