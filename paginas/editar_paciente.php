<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medicad";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$id = isset($_POST['id']) ? intval($_POST['id']) : 0;


$sql = "SELECT * FROM pacientes WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Editar Información del Paciente</title>
    <link rel="stylesheet" href="../Index/styles.css" />
    <link rel="stylesheet" href="form.css" />
    <link rel="shortcut icon" href="icono.png">
</head>
<body>
<!-- -----------------------------------------------------------------------------------------encabezado-->
    <header>
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
    </header>
<!-- -----------------------------------------------------------------------------------------Formulario para editar-->
    <section class="container top-formulario_r">
        <div class="container_mod">
            <h2 class="l_titulo">Editar Información del Paciente</h2><br>
            <form action="guardar_cambios.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <strong class='tcla'>Categoría de Registro:</strong><input type="text" name="categoria" value="<?php echo $row['categoria']; ?>"><br>
                <strong class='tcla'>Nombre Completo:</strong><input type="text" name="nombre" value="<?php echo $row['nombre']; ?>"><br>
                <strong class='tcla'>Edad:</strong><input type="text" name="edad" value="<?php echo $row['edad']; ?>"><br>
                <strong class='tcla'>Sexo:</strong><input type="text" name="sexo" value="<?php echo $row['sexo']; ?>"><br>
                <strong class='tcla'>Número telefónico:</strong><input type="text" name="numero_telefonico" value="<?php echo $row['numero_telefonico']; ?>"><br>
                <strong class='tcla'>Correo Electrónico:</strong><input type="text" name="correo_electronico" value="<?php echo $row['correo_electronico']; ?>"><br>
                <strong class='tcla'>Lugar de Residencia:</strong><input type="text" name="lugar_residencia" value="<?php echo $row['lugar_residencia']; ?>"><br>
                <strong class='tcla'>Motivo de Consulta:</strong><input type="text" name="motivo" value="<?php echo $row['motivo']; ?>"><br>
                <strong class='tcla'>Historia de la Enfermedad Actual:</strong><input type="text" name="historia" value="<?php echo $row['historia']; ?>"><br>
                <strong class='tcla'>Enfermedades Previas:</strong><input type="text" name="enfermedades" value="<?php echo $row['enfermedades']; ?>"><br>
                <strong class='tcla'>Cirugías y Hospitalizaciones:</strong><input type="text" name="cirugias" value="<?php echo $row['cirugias']; ?>"><br>
                <strong class='tcla'>Alergias:</strong><input type="text" name="alergias" value="<?php echo $row['alergias']; ?>"><br>
                <strong class='tcla'>Medicamentos Actuales:</strong><input type="text" name="medicamentos" value="<?php echo $row['medicamentos']; ?>"><br>
                <strong class='tcla'>Vacunaciones:</strong><input type="text" name="vacunaciones" value="<?php echo $row['vacunaciones']; ?>"><br>
                <strong class='tcla'>Antecedentes Familiares:</strong><input type="text" name="antecedentes_familiares" value="<?php echo $row['antecedentes_familiares']; ?>"><br>
                <strong class='tcla'>Menarca:</strong><input type="text" name="menarca" value="<?php echo $row['menarca']; ?>"><br>
                <strong class='tcla'>Ciclo Menstrual:</strong><input type="text" name="ciclo" value="<?php echo $row['ciclo']; ?>"><br>
                <strong class='tcla'>Embarazos:</strong><input type="text" name="embarazos" value="<?php echo $row['embarazos']; ?>"><br>
                <strong class='tcla'>Fecha de Última Menstruación:</strong><input type="text" name="ultima_menstruacion" value="<?php echo $row['ultima_menstruacion']; ?>"><br>
                <strong class='tcla'>Tabaquismo:</strong><input type="text" name="tabaquismo" value="<?php echo $row['tabaquismo']; ?>"><br>
                <strong class='tcla'>Consumo de Alcohol:</strong><input type="text" name="consumo_alcohol" value="<?php echo $row['consumo_alcohol']; ?>"><br>
                <strong class='tcla'>Uso de Drogas:</strong><input type="text" name="uso_drogas" value="<?php echo $row['uso_drogas']; ?>"><br>
                <strong class='tcla'>Actividad Física:</strong><input type="text" name="actividad_fisica" value="<?php echo $row['actividad_fisica']; ?>"><br>
                <strong class='tcla'>Dieta:</strong><input type="text" name="dieta" value="<?php echo $row['dieta']; ?>"><br>
                <strong class='tcla'>Sueño:</strong><input type="text" name="sueno" value="<?php echo $row['sueno']; ?>"><br>
                <strong class='tcla'>Antecedentes Psicosociales:</strong><input type="text" name="antecedentes_psicosociales" value="<?php echo $row['antecedentes_psicosociales']; ?>"><br>
                <div class="actions_c">
                <button class="button_c" type="submit">Guardar Cambios</button></form>
                <form action="e_cancelar.php" method="GET">
                <button class="button_l" type="submit">Cancelar</button>
                </form>
            </div>
            
        </div>
    </section>
    <!-- -----------------------------------------------------------------------------------------pie de pagina-->
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
</body>
</html>
