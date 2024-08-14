<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Alta Doctor</title>
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
                        <li><a href="../../index/index.html">Inicio</a></li>
                        <li><a href="../../paginas/categorias.html">Categorias</a></li>
                        <li><a href="../../Productos/vista_prod.php">Productos</a></li>
                        <li><a href="../../paginas/servicios.html">Servicios</a></li>
                        <li><a href="#">Informacion</a></li>
                        <li><a href="../../Administracion/administracion.php">Administracion</a></li>
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
        <h1>Registrar Nuevo Doctor o Especialista</h1>
        <form action="alta.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required>

            <label for="especialidad">Especialidad:</label>
            <input type="text" id="especialidad" name="especialidad" required>

            <label for="numero_licencia">Número de Licencia:</label>
            <input type="text" id="numero_licencia" name="numero_licencia" required>

            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento">

            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono">

            <label for="correo_electronico">Correo Electrónico:</label>
            <input type="email" id="correo_electronico" name="correo_electronico">

            <label for="direccion">Dirección:</label>
            <textarea id="direccion" name="direccion"></textarea>

            <button class="la_button" type="submit">Registrar Doctor o Especialista</button>

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
