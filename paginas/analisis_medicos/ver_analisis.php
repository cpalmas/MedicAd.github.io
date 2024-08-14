<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Informacion Paciente</title>
    <link rel="stylesheet" href="../encabezado.css" />
    <link rel="stylesheet" href="../vistas.css" />
    <link rel="shortcut icon" href="icono.png">
</head>
<body>
    <header>
        <div class="container-hero">
                <div class="container hero">
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
                <nav class="navbar container">
                    <i class="fa-solid fa-bars"></i>
                    <ul class="menu">
                        <li><a href="../Index/index.html">Inicio</a></li>
                        <li><a href="../paginas/categorias.html">Categorias</a></li>
                        <li><a href="../paginas/productos.html">Productos</a></li>
                        <li><a href="../paginas/servicios.html">Servicios</a></li>
                        <li><a href="#">Informacion</a></li>
                        <li><a href="../paginas/datos.html">Datos</a></li>
                        <li><a href="../paginas/mostrar_pacientes.php">Pacientes</a></li>
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
<!-- -----------------------------------------------------------------------------------------Listado del registro -->
    <section class="container top-formulario_r">
        <div class="container_mod">
            <h2 class="l_titulo">Informacion del Analisis</h2><br>
            <ol>
                <?php
               
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "medicad";

                
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Verificar conexión
                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }

                
                $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

              
                $sql = "SELECT * FROM analisis_medicos WHERE id = $id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    
                    while ($row = $result->fetch_assoc()) {
                        ?>
                       
    <strong class='tcla'>Tipo de analisis:</strong>      <?php echo ($row['tipo_analisis'] ? $row['tipo_analisis'] : 'N/A'); ?><br>
    <strong class='tcla'>Glucosa:</strong>            <?php echo ($row['glucosa'] ? $row['glucosa'] : 'N/A'); ?><br>
    <strong class='tcla'>Urea:</strong>            <?php echo ($row['urea'] ? $row['urea'] : 'N/A'); ?><br>
    <strong class='tcla'>Creatinina:</strong>            <?php echo ($row['creatinina'] ? $row['creatinina'] : 'N/A'); ?><br>
    <strong class='tcla'>Acido Urico:</strong>            <?php echo ($row['acido_urico'] ? $row['acido_urico'] : 'N/A'); ?><br>
    <strong class='tcla'>Colesterol:</strong>            <?php echo ($row['colesterol'] ? $row['colesterol'] : 'N/A'); ?><br>
    <strong class='tcla'>Trigliceridos:</strong>            <?php echo ($row['trigliceridos'] ? $row['trigliceridos'] : 'N/A'); ?><br>
    <strong class='tcla'>Biometria Hematica:</strong>            <?php echo ($row['biometria_hematica'] ? $row['biometria_hematica'] : 'N/A'); ?><br>
    <strong class='tcla'>Examen de Orina:</strong>            <?php echo ($row['examen_orina'] ? $row['examen_orina'] : 'N/A'); ?><br>
    <strong class='tcla'>Prueba VIH:</strong>            <?php echo ($row['prueba_vih'] ? $row['prueba_vih'] : 'N/A'); ?><br>
    <strong class='tcla'>Prueba VPH:</strong>            <?php echo ($row['prueba_vph'] ? $row['prueba_vph'] : 'N/A'); ?><br>
    <strong class='tcla'>Prueba de Hepatitis:</strong>            <?php echo ($row['prueba_hepatitis'] ? $row['prueba_hepatitis'] : 'N/A'); ?><br>
    <strong class='tcla'>Antigeno Prostatico:</strong>            <?php echo ($row['antigeno_prostatico'] ? $row['antigeno_prostatico'] : 'N/A'); ?><br>
    <strong class='tcla'>Tele de Torax:</strong>            <?php echo ($row['tele_torax'] ? $row['tele_torax'] : 'N/A'); ?><br>
    <strong class='tcla'>Espirometria:</strong>            <?php echo ($row['espirometria'] ? $row['espirometria'] : 'N/A'); ?><br>
    <strong class='tcla'>Electrocardiograma:</strong>            <?php echo ($row['electrocardiograma'] ? $row['electrocardiograma'] : 'N/A'); ?><br>
    <strong class='tcla'>Otros Resultados:</strong>            <?php echo ($row['otros_resultados'] ? $row['otros_resultados'] : 'N/A'); ?><br>
    <strong class='tcla'>Comentarios:</strong>            <?php echo ($row['comentarios'] ? $row['comentarios'] : 'N/A'); ?><br>
    
                        <br>
<center>
    <div class='actions'>
        <button class="button_f" onclick="goBack()">Regresar</button>
    </div>
</center>

<script>
    function goBack() {
        window.history.back();
    }
</script>

                            
                        
                        <?php
                    }
                } else {
                    ?>
                    <li>No se encontraron pacientes en la base de datos.</li>
                    <?php
                }

                $conn->close();
                ?>
            </ol>
        </div>
    </section>
<!-- -----------------------------------------------------------------------------------------Pie de pagina -->
    <footer class="footer">
       <footer class="footer">
            <div class="container container-footer">
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
    </footer>

    <script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>
</body>
</html>
