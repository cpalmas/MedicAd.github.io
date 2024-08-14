<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Alta de Cita Ginecológica</title>
    <link rel="stylesheet" href="alta.css">
    <link rel="stylesheet" href="../encabezado.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 
</head>
<body>

<header>
            <div class="container-hero">
                <div class="hero">
                 <div class="customer-support">
                        <i class="fa-solid fa-headset"></i>
                        <div class="content-customer-support">
                            <span class="text">Atencion al cliente</span>
                            <span class="number">722-101-5733</span>
                    </div>
                    </div>

                    <div class="container-logo">
                        <img class="texto1" src="../Texto1.png" />
                    </div>

                    <div class="container-user">
                        <a  href="../Login/login.html"><i class="fa-solid fa-user"></i></a>
                        <i class="fa-solid fa-basket-shopping"></i>
                        <div class="content-shopping-cart">
                            <span class="text">Carrito</span>
                            <span class="number">(0)</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-navbar">
                <nav class="navbar">
                    <i class="fa-solid fa-bars"></i>
                    <ul class="menu">
                        <li><a href="../Index/index.html">Inicio</a></li>
                        <li><a href="../paginas/categorias.html">Categorias</a></li>
                        <li><a href="../Productos/vista_prod.php">Productos</a></li>
                        <li><a href="../paginas/servicios.html">Servicios</a></li>
                        <li><a href="#">Informacion</a></li>
                        <li><a href="../Administracion/administracion.php">Administracion</a></li>
                    </ul>

                    <form class="search-form">
                        <input type="search" placeholder="Buscar..." />
                        <button class="btn-search">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </nav>
            </div>
        </header>

<div class="container">    
    <h1>Registrar Nueva Cita Ginecológica</h1>
    <form action="alta.php" method="POST">
        <label for="paciente_id">Paciente:</label>
        <select id="paciente_id" name="paciente_id" required>
            <?php
            $dbHost = 'localhost';
            $dbUsername = 'root';
            $dbPassword = '';
            $dbName = 'medicad';
            $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

            if ($db->connect_error) {
                die("Conexión fallida: " . $db->connect_error);
            }

            $result = $db->query("SELECT id, nombre FROM pacientes");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
            }

            $db->close();
            ?>
        </select>

        <label for="doctor_id">Doctor:</label>
        <select id="doctor_id" name="doctor_id" required>
            <?php
            $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

            if ($db->connect_error) {
                die("Conexión fallida: " . $db->connect_error);
            }

            $result = $db->query("SELECT id_doc, nombre FROM doctores");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['id_doc']}'>{$row['nombre']}</option>";
            }

            $db->close();
            ?>
        </select>

        <label for="fecha_cita_ginecologica">Fecha de la Cita:</label>
        <input type="datetime-local" id="fecha_cita_ginecologica" name="fecha_cita_ginecologica">

        <label for="ultimo_examen">Último Examen:</label>
        <input type="date" id="ultimo_examen" name="ultimo_examen">

        <label for="menarca">Menarca:</label>
        <input type="number" id="menarca" name="menarca">

        <label for="ciclidad_menstrual">Ciclidad Menstrual:</label>
        <input type="text" id="ciclidad_menstrual" name="ciclidad_menstrual">

        <label for="embarazos_previos">Embarazos Previos:</label>
        <input type="number" id="embarazos_previos" name="embarazos_previos">

        <label for="partos">Partos:</label>
        <input type="number" id="partos" name="partos">

        <label for="abortos">Abortos:</label>
        <input type="number" id="abortos" name="abortos">

        <label for="problemas_menstruales">Problemas Menstruales:</label>
        <textarea id="problemas_menstruales" name="problemas_menstruales"></textarea>

        <label for="motivo_consulta">Motivo de la Consulta:</label>
        <textarea id="motivo_consulta" name="motivo_consulta" required></textarea>

        <label for="duracion_sintomas">Duración de los Síntomas:</label>
        <input type="text" id="duracion_sintomas" name="duracion_sintomas">

        <label for="localizacion_sintomas">Localización de los Síntomas:</label>
        <input type="text" id="localizacion_sintomas" name="localizacion_sintomas">

        <label for="sintomas_actuales">Síntomas Actuales:</label>
        <textarea id="sintomas_actuales" name="sintomas_actuales"></textarea>

        <label for="cambios_ciclo_menstrual">Cambios en el Ciclo Menstrual:</label>
        <textarea id="cambios_ciclo_menstrual" name="cambios_ciclo_menstrual"></textarea>

        <label for="dolor_malestar">Dolor o Malestar:</label>
        <textarea id="dolor_malestar" name="dolor_malestar"></textarea>

        <label for="resultados_examenes">Resultados de Exámenes:</label>
        <textarea id="resultados_examenes" name="resultados_examenes"></textarea>

        <label for="radiografias">Radiografías:</label>
        <input type="text" id="radiografias" name="radiografias">

        <label for="resultados_pruebas">Resultados de Pruebas:</label>
        <input type="text" id="resultados_pruebas" name="resultados_pruebas">

        <label for="tratamiento_recomendado">Tratamiento Recomendado:</label>
        <textarea id="tratamiento_recomendado" name="tratamiento_recomendado"></textarea>

        <label for="recomendaciones">Recomendaciones:</label>
        <textarea id="recomendaciones" name="recomendaciones"></textarea>

        <label for="proxima_cita">Próxima Cita:</label>
        <input type="date" id="proxima_cita" name="proxima_cita">

        <label for="hora_cita">Hora de la Cita:</label>
        <input type="time" id="hora_cita" name="hora_cita">

        <label for="comentarios_adicionales">Comentarios Adicionales:</label>
        <textarea id="comentarios_adicionales" name="comentarios_adicionales"></textarea>

        <button class="la_button" type="submit">Registrar Cita Ginecológica</button>
    </form>
</div>

<footer class="footer">
            <div class="container-footer">
                <div class="menu-footer">
                    <div class="contact-info">
                        <p class="title-footer">Información de Contacto</p>
                        <ul>
                            <li>
                                Av Miguel Hidalgo 46, La Estación, 52006 Lerma de Villada, Méx.
                            </li>
                            <li>Teléfono: 722-101-5733</li>
                            <li>EmaiL: medic_ad@gmail.com</li>
                        </ul>
                        <div class="social-icons">
                            <span class="facebook">
                                <i class="fa-brands fa-facebook-f"></i>
                            </span>
                            <span class="twitter">
                                <i class="fa-brands fa-twitter"></i>
                            </span>
                            <span class="google">
                                <i class="fa-brands fa-google"></i>
                            </span>
                            <span class="instagram">
                                <i class="fa-brands fa-instagram"></i>
                            </span>
                        </div>
                    </div>

                    <div class="information">
                        <p class="title-footer">Información</p>
                        <ul>
                            <li><a href="#">Acerca de Nosotros</a></li>
                            <li><a href="#">Politicas de Privacidad</a></li>
                            <li><a href="#">Términos y condiciones</a></li>
                            <li><a href="#">Contactános</a></li>
                        </ul>
                    </div>

                    <div class="my-account">
                        <p class="title-footer">Mi cuenta</p>

                        <ul>
                            <li><a href="#">Mi cuenta</a></li>
                            <li><a href="#">Historial de ordenes</a></li>
                            <li><a href="#">Boletín</a></li>
                            <li><a href="#">Reembolsos</a></li>
                        </ul>
                    </div>

                    <div class="newsletter">
                        <p class="title-footer">Boletín informativo</p>

                        <div class="content">
                            <p>
                                Registrate a nuestros boletines ahora y mantente tu salud siempre segura.
                            </p>
    
                        </div>
                    </div>
                </div>

                
            </div>
        </footer>

        <script
            src="https://kit.fontawesome.com/81581fb069.js"
            crossorigin="anonymous"
        ></script>

</body>
</html>
