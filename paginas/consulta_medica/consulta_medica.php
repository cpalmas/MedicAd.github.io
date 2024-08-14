<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Receta Médica</title>
    <link rel="stylesheet" href="receta_medica.css">
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
            <center><div class="header">
            <h1>RECETA MEDICA</h1>
            <p class="date"><?php echo date('d-m-Y'); ?></p>
        </div></center>
        <div class="doctor-info">
            <p>DR. MIGUEL. ORONA
            Ced. Prof. 0000 0000
            Universidad Tecnológica del Valle de Toluca
            Santa María Atarasquillo, México</p>
        </div>
        <hr>
        <form action="alta.php" method="post">
            <label for="nombre">Nombre completo del paciente:</label>
            <input type="text" id="nombre" name="nombre" required>

            <div class="row">
                <div class="column">
                    <label for="edad">Edad:</label>
                    <input type="number" id="edad" name="edad" required>
                </div>
                <div class="column">
                    <label for="sexo">Sexo:</label>
                    <select id="sexo" name="sexo" required>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>
                <div class="column">
                    <label for="alergias">Alergias:</label>
                    <input type="text" id="alergias" name="alergias">
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <label for="talla">Talla:</label>
                    <input type="text" id="talla" name="talla" required>
                </div>
                <div class="column">
                    <label for="peso">Peso:</label>
                    <input type="text" id="peso" name="peso" required>
                </div>
                <div class="column">
                    <label for="imc">IMC:</label>
                    <input type="text" id="imc" name="imc" required>
                </div>
                <div class="column">
                    <label for="temperatura">Temperatura:</label>
                    <input type="text" id="temperatura" name="temperatura" required>
                </div>
                <div class="column">
                    <label for="presion">Presión arterial:</label>
                    <input type="text" id="presion" name="presion" required>
                </div>
            </div>

            <label for="diagnostico">Diagnóstico:</label>
            <textarea id="diagnostico" name="diagnostico" rows="4" required></textarea>

            <label for="tratamiento">Tratamiento:</label>
            <textarea id="tratamiento" name="tratamiento" rows="4" required></textarea>
            <center>
            <div class="signature">
                <label for="firma">Firma:</label>
                <img src="firma.jpg" alt="Firma del Doctor">
            </div></center>

            <div class="buttons">
                <button type="submit">Guardar</button>
                <button type="button" onclick="window.print();">Imprimir</button>
            </div>
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
