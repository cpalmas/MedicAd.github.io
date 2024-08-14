<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Receta Médica</title>
    <link rel="stylesheet" href="receta_medica.css"> <!-- Asegúrate de que este archivo esté correctamente vinculado -->
</head>
<body>
    <div class="container">
        <center>
            <div class="header">
                <h1>RECETA MEDICA</h1>
                <p class="date"><?php echo date('d-m-Y'); ?></p>
            </div>
        </center>
        <div class="doctor-info">
            <p>DR. MIGUEL ORONA
               Ced. Prof. 0000 0000
               Universidad Tecnológica del Valle de Toluca
               Santa María Atarasquillo, México
            </p>
        </div>
        <hr>
        <?php
        // Conexión a la base de datos
        $dbHost = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName = 'medicad';
        $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

        if ($db->connect_error) {
            die("Conexión fallida: " . $db->connect_error);
        }

        // Verificar que se ha pasado un ID a través de la URL
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = intval($_GET['id']);

            // Consulta para obtener los datos de la receta médica
            $sql = "SELECT * FROM recetas_medicas WHERE id = ?";
            $stmt = $db->prepare($sql);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                ?>
                <form>
                    <label for="nombre">Nombre completo del paciente: <?php echo htmlspecialchars($row['nombre']); ?></label><br>

                    <div class="row">
                        <div class="column">
                            <label for="edad">Edad: <?php echo htmlspecialchars($row['edad']); ?></label><br>
                        </div>
                        <div class="column">
                            <label for="sexo" >sexo: <?php echo htmlspecialchars($row['sexo']); ?></label>
                        
                        </div>
                        <div class="column">
                            <label for="alergias">Alergias: <?php echo htmlspecialchars($row['alergias']); ?></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="column">
                            <label for="talla">Talla: <?php echo htmlspecialchars($row['talla']); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Peso: <?php echo htmlspecialchars($row['peso']); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IMC: <?php echo htmlspecialchars($row['imc']); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Temperatura: <?php echo htmlspecialchars($row['temperatura']); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Presión arterial: <?php echo htmlspecialchars($row['presion']); ?></label>
                        </div>
                        
                    </div><br>

                    <label for="diagnostico">Diagnóstico:</label>
                    <textarea id="diagnostico" name="diagnostico" rows="4" readonly><?php echo htmlspecialchars($row['diagnostico']); ?></textarea>

                    <label for="tratamiento">Tratamiento:</label>
                    <textarea id="tratamiento" name="tratamiento" rows="4" readonly><?php echo htmlspecialchars($row['tratamiento']); ?></textarea>
                    
                    <center>
                    <div class="signature">
                        <label for="firma">Firma:</label>
                        <img src="firma.jpg" alt="Firma del Doctor">
                    </div></center>

                    <div class="buttons">
                        <button type="button" onclick="window.print();">Imprimir</button>
                    </div>
                </form>
                <?php
            } else {
                echo "<p>No se encontraron datos para el ID proporcionado.</p>";
            }

            $stmt->close();
        } else {
            echo "<p>ID no válido.</p>";
        }

        $db->close();
        ?>
    </div>
</body>
</html>
