<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Tratamiento</title>
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
    <h1>Registrar Nuevo Tratamiento</h1>
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

        <label for="diagnostico_principal">Diagnóstico Principal:</label>
        <textarea id="diagnostico_principal" name="diagnostico_principal" required></textarea>

        <label for="tipo_tratamiento">Tipo de Tratamiento:</label>
        <textarea id="tipo_tratamiento" name="tipo_tratamiento" required></textarea>

        <label for="medicacion">Medicación:</label>
        <textarea id="medicacion" name="medicacion"></textarea>

        <label for="terapia">Terapia:</label>
        <textarea id="terapia" name="terapia"></textarea>

        <label for="otros_tratamientos">Otros Tratamientos:</label>
        <textarea id="otros_tratamientos" name="otros_tratamientos"></textarea>

        <label for="fecha_inicio">Fecha de Inicio:</label>
        <input type="date" id="fecha_inicio" name="fecha_inicio" required>

        <label for="duracion_tratamiento">Duración del Tratamiento:</label>
        <input type="text" id="duracion_tratamiento" name="duracion_tratamiento">

        <label for="frecuencia_tratamiento">Frecuencia del Tratamiento:</label>
        <input type="text" id="frecuencia_tratamiento" name="frecuencia_tratamiento">

        <label for="mejoria">Mejoría:</label>
        <textarea id="mejoria" name="mejoria"></textarea>

        <label for="cambios_observados">Cambios Observados:</label>
        <textarea id="cambios_observados" name="cambios_observados"></textarea>

        <label for="cumplimiento_tratamiento">Cumplimiento del Tratamiento:</label>
        <input type="text" id="cumplimiento_tratamiento" name="cumplimiento_tratamiento">

        <label for="impedimentos">Impedimentos:</label>
        <textarea id="impedimentos" name="impedimentos"></textarea>

        <label for="efectos_secundarios">Efectos Secundarios:</label>
        <textarea id="efectos_secundarios" name="efectos_secundarios"></textarea>

        <label for="reduccion_dosis">Reducción de Dosis:</label>
        <textarea id="reduccion_dosis" name="reduccion_dosis"></textarea>

        <label for="ajustes_necessarios">Ajustes Necesarios:</label>
        <textarea id="ajustes_necessarios" name="ajustes_necessarios"></textarea>

        <label for="recomendaciones">Recomendaciones:</label>
        <textarea id="recomendaciones" name="recomendaciones"></textarea>

        <label for="proxima_cita_fecha">Próxima Cita - Fecha:</label>
        <input type="date" id="proxima_cita_fecha" name="proxima_cita_fecha">

        <label for="proxima_cita_hora">Próxima Cita - Hora:</label>
        <input type="time" id="proxima_cita_hora" name="proxima_cita_hora">

        <label for="comentarios_adicionales">Comentarios Adicionales:</label>
        <textarea id="comentarios_adicionales" name="comentarios_adicionales"></textarea>

        <button class="la_button" type="submit">Registrar Tratamiento</button>
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
