<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Informacion Paciente</title>
    <link rel="stylesheet" href="../Index/styles.css" />
    <link rel="stylesheet" href="form.css" />
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
                        <img class="texto1" src="../media/Texto1.png" />
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
            <h2 class="l_titulo">Informacion del Paciente</h2><br>
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

              
                $sql = "SELECT * FROM pacientes WHERE id = $id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    
                    while ($row = $result->fetch_assoc()) {
                        ?>
                       
    <strong class='tcla'>Categoría de Registro:</strong>      <?php echo ($row['categoria'] ? $row['categoria'] : 'N/A'); ?><br>
    <strong class='tcla'>Nombre Completo:</strong>            <?php echo ($row['nombre'] ? $row['nombre'] : 'N/A'); ?><br>
    <strong class='tcla'>Edad:</strong>                       <?php echo ($row['edad'] ? $row['edad'] : 'N/A'); ?><br>
    <strong class='tcla'>Sexo:</strong>                       <?php echo ($row['sexo'] ? $row['sexo'] : 'N/A'); ?><br>
    <strong class='tcla'>Número telefónico:</strong>          <?php echo ($row['numero_telefonico'] ? $row['numero_telefonico'] : 'N/A'); ?><br>
    <strong class='tcla'>Correo Electrónico:</strong>         <?php echo ($row['correo_electronico'] ? $row['correo_electronico'] : 'N/A'); ?><br>
    <strong class='tcla'>Lugar de Residencia:</strong>        <?php echo ($row['lugar_residencia'] ? $row['lugar_residencia'] : 'N/A'); ?><br>
    <strong class='tcla'>Motivo de Consulta:</strong>         <?php echo ($row['motivo'] ? $row['motivo'] : 'N/A'); ?><br>
    <strong class='tcla'>Historia de la Enfermedad Actual:</strong> <?php echo ($row['historia'] ? $row['historia'] : 'N/A'); ?><br>
    <strong class='tcla'>Enfermedades Previas:</strong>       <?php echo ($row['enfermedades'] ? $row['enfermedades'] : 'N/A'); ?><br>
    <strong class='tcla'>Cirugías y Hospitalizaciones:</strong><?php echo ($row['cirugias'] ? $row['cirugias'] : 'N/A'); ?><br>
    <strong class='tcla'>Alergias:</strong>                   <?php echo ($row['alergias'] ? $row['alergias'] : 'N/A'); ?><br>
    <strong class='tcla'>Medicamentos Actuales:</strong>      <?php echo ($row['medicamentos'] ? $row['medicamentos'] : 'N/A'); ?><br>
    <strong class='tcla'>Vacunaciones:</strong>               <?php echo ($row['vacunaciones'] ? $row['vacunaciones'] : 'N/A'); ?><br>
    <strong class='tcla'>Antecedentes Familiares:</strong>    <?php echo ($row['antecedentes_familiares'] ? $row['antecedentes_familiares'] : 'N/A'); ?><br>
    <strong class='tcla'>Menarca:</strong>                    <?php echo ($row['menarca'] ? $row['menarca'] : 'N/A'); ?><br>
    <strong class='tcla'>Ciclo Menstrual:</strong>            <?php echo ($row['ciclo'] ? $row['ciclo'] : 'N/A'); ?><br>
    <strong class='tcla'>Embarazos:</strong>                  <?php echo ($row['embarazos'] ? $row['embarazos'] : 'N/A'); ?><br>
    <strong class='tcla'>Fecha de Última Menstruación:</strong><?php echo ($row['ultima_menstruacion'] ? $row['ultima_menstruacion'] : 'N/A'); ?><br>
    <strong class='tcla'>Tabaquismo:</strong>                 <?php echo ($row['tabaquismo'] ? $row['tabaquismo'] : 'N/A'); ?><br>
    <strong class='tcla'>Consumo de Alcohol:</strong>         <?php echo ($row['consumo_alcohol'] ? $row['consumo_alcohol'] : 'N/A'); ?><br>
    <strong class='tcla'>Uso de Drogas:</strong>              <?php echo ($row['uso_drogas'] ? $row['uso_drogas'] : 'N/A'); ?><br>
    <strong class='tcla'>Actividad Física:</strong>           <?php echo ($row['actividad_fisica'] ? $row['actividad_fisica'] : 'N/A'); ?><br>
    <strong class='tcla'>Dieta:</strong>                      <?php echo ($row['dieta'] ? $row['dieta'] : 'N/A'); ?><br>
    <strong class='tcla'>Sueño:</strong>                      <?php echo ($row['sueno'] ? $row['sueno'] : 'N/A'); ?><br>
    <strong class='tcla'>Antecedentes Psicosociales:</strong> <?php echo ($row['antecedentes_psicosociales'] ? $row['antecedentes_psicosociales'] : 'N/A'); ?><br>
                        <br><center>
                            <div class='actions'>
                                <form style='display: inline-block;' action='editar_paciente.php' method='POST'>
                                    <input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
                                    <button class="button_l" type='submit'>Editar</button>
                                </form>

                                <form style='display: inline-block;' action='eliminar_paciente.php' method='POST'>
                                    <input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
                                    <button class="button_l" type='submit'>Eliminar</button>
                                </form>

                                <form style='display: inline-block;' action="e_cancelar.php">
                                    <input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
                                    <button class="button_l" >Regresar</button>
                                </form>
                            </div></center>
                        
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
