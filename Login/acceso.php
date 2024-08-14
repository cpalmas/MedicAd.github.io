<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medicad";

// Función para encriptar el texto con el método César
function encryptCesar($text, $shift = 3) {
    $result = '';
    for ($i = 0; $i < strlen($text); $i++) {
        $char = $text[$i];
        $code = ord($char);

        if (ctype_alpha($char)) {
            if (ctype_upper($char)) {
                $result .= chr((($code - 65 + $shift) % 26) + 65);
            } else {
                $result .= chr((($code - 97 + $shift) % 26) + 97);
            }
        } else if (ctype_digit($char)) {
            $result .= chr((($code - 48 + $shift) % 10) + 48);
        } else {
            $result .= $char; // No se encriptan otros caracteres
        }
    }
    return $result;
}

// Verificar si se envió el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar que los campos no estén vacíos
    if (!empty($_POST['l_correo']) && !empty($_POST['l_contraseña'])) {
        $correo = $_POST['l_correo'];
        $pass = $_POST['l_contraseña'];

        // Crear conexión
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Encriptar la contraseña ingresada con el método César
        $pass_encriptada = encryptCesar($pass);

        // Preparar y ejecutar consulta SQL
        $stmt = $conn->prepare("SELECT correo FROM registro WHERE correo=? AND contraseña=?");
        $stmt->bind_param("ss", $correo, $pass_encriptada);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $_SESSION['correo'] = $correo;
            echo '<script>alert("Iniciando Sesion"); window.location.href = "../Index/index.html";</script>';
            exit();
        } else {
            echo '<script>alert("Correo o contraseña incorrectos"); window.location.href = "Login.html";</script>';
        }

        $stmt->close();
        $conn->close();
    } else {
        echo '<script>alert("Completa todos los campos del formulario"); window.location.href = "Login.html";</script>';
    }
}
?>
