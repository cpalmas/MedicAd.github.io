<?php
if (!empty($_GET['id'])) {
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'medicad';
    
    // Create connection and select DB
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    
    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    
    // Prepare and execute query
    $id = intval($_GET['id']);
    $query = $db->prepare("SELECT imagen FROM productos WHERE id = ?");
    $query->bind_param("i", $id);
    $query->execute();
    $result = $query->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Set header for image content type
        header("Content-Type: image/jpeg");
        echo $row['imagen'];
    } else {
        echo 'Image not found...';
    }
    
    $query->close();
    $db->close();
} else {
    echo 'Invalid request.';
}
?>
