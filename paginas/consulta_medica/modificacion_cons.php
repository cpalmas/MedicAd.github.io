<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Receta Médica</title>
    <link rel="stylesheet" href="receta_medica.css">
</head>
<body>
    <div class="container">
        <center>
            <div class="header">
                <h1>EDITAR RECETA MEDICA</h1>
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
                <form action="modificacion.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <label for="nombre">Nombre completo del paciente:</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($row['nombre']); ?>" required>

                    <div class="row">
                        <div class="column">
                            <label for="edad">Edad:</label>
                            <input type="number" id="edad" name="edad" value="<?php echo htmlspecialchars($row['edad']); ?>" required>
                        </div>
                        <div class="column">
                            <label for="sexo">Sexo:</label>
                            <select id="sexo" name="sexo" required>
                                <option value="Masculino" <?php echo ($row['sexo'] == 'Masculino') ? 'selected' : ''; ?>>Masculino</option>
                                <option value="Femenino" <?php echo ($row['sexo'] == 'Femenino') ? 'selected' : ''; ?>>Femenino</option>
                            </select>
                        </div>
                        <div class="column">
                            <label for="alergias">Alergias:</label>
                            <input type="text" id="alergias" name="alergias" value="<?php echo htmlspecialchars($row['alergias']); ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="column">
                            <label for="talla">Talla:</label>
                            <input type="text" id="talla" name="talla" value="<?php echo htmlspecialchars($row['talla']); ?>" required>
                        </div>
                        <div class="column">
                            <label for="peso">Peso:</label>
                            <input type="text" id="peso" name="peso" value="<?php echo htmlspecialchars($row['peso']); ?>" required>
                        </div>
                        <div class="column">
                            <label for="imc">IMC:</label>
                            <input type="text" id="imc" name="imc" value="<?php echo htmlspecialchars($row['imc']); ?>" required>
                        </div>
                        <div class="column">
                            <label for="temperatura">Temperatura:</label>
                            <input type="text" id="temperatura" name="temperatura" value="<?php echo htmlspecialchars($row['temperatura']); ?>" required>
                        </div>
                        <div class="column">
                            <label for="presion">Presión arterial:</label>
                            <input type="text" id="presion" name="presion" value="<?php echo htmlspecialchars($row['presion']); ?>" required>
                        </div>
                    </div>

                    <label for="diagnostico">Diagnóstico:</label>
                    <textarea id="diagnostico" name="diagnostico" rows="4" required><?php echo htmlspecialchars($row['diagnostico']); ?></textarea>

                    <label for="tratamiento">Tratamiento:</label>
                    <textarea id="tratamiento" name="tratamiento" rows="4" required><?php echo htmlspecialchars($row['tratamiento']); ?></textarea>

                    <center>
                    <div class="buttons">
                        <button type="submit">Guardar cambios</button>
                        <button type="button" onclick="window.history.back();">Cancelar</button>
                    </div>
                    </center>
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
