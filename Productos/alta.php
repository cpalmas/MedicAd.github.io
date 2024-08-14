<?php
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
       

        // DB details
        $dbHost = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName = 'medicad'; // Cambia esto al nombre de tu base de datos

        // Crear conexión y seleccionar DB
        $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

        // Comprobar conexión
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $nombre = $_POST['nombre']; // Asegúrate de que el nombre del campo sea 'name'
        $precio = $_POST['precio']; // Asegúrate de que el nombre del campo sea 'price'
        $descripcion = $_POST['descripcion']; // Asegúrate de que el nombre del campo sea 'description'
        $descuento = $_POST['descuento']; // Asegúrate de que el nombre del campo sea 'discount'
        $dataTime = date("Y-m-d H:i:s");

        // Preparar y vincular
        $insert = $db->query("INSERT into productos (imagen, nombre, precio, descripcion, descuento, creacion) VALUES ('$imgContent', '$nombre', '$precio', '$descripcion', '$descuento', '$dataTime')");
     
        if ($insert) {
            echo '<script>alert("Producto subido correctamente"); window.location.href = "alta_prod.php";</script>';
        } else {
            echo '<script>alert("Fallo al subir producto"); window.location.href = "alta_prod.php";</script>';
        }

        // Cerrar declaración y conexión
        $stmt->close();
        $db->close();
    } else {
        echo '<script>alert("Por favor, selecciona un archivo de imagen válido para subir."); window.location.href = "alta_prod.php";</script>';
    }
}
?>
