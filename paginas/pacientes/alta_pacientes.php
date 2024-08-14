<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Alta de Paciente</title>
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
    <h1>Registrar Nuevo Paciente</h1>
    <form action="alta.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required>

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>

        <label for="sexo">Sexo:</label>
        <select id="sexo" name="sexo" required>
            <option value="femenino">Femenino</option>
            <option value="masculino">Masculino</option>
            <option value="otro">Otro</option>
        </select>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono">

        <label for="correo">Correo Electrónico:</label>
        <input type="email" id="correo" name="correo">

        <label for="direccion">Dirección:</label>
        <textarea id="direccion" name="direccion" required></textarea>

        <label for="ciudad">Ciudad:</label>
        <input type="text" id="ciudad" name="ciudad" required>

        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado" required>

        <label for="codigo_postal">Código Postal:</label>
        <input type="text" id="codigo_postal" name="codigo_postal">

        <label for="enfermedades_cronicas">Enfermedades Crónicas:</label>
        <textarea id="enfermedades_cronicas" name="enfermedades_cronicas"></textarea>

        <label for="alergias">Alergias:</label>
        <textarea id="alergias" name="alergias"></textarea>

        <label for="medicamentos">Medicamentos:</label>
        <textarea id="medicamentos" name="medicamentos"></textarea>

        <label for="historial_familiar">Historial Familiar:</label>
        <textarea id="historial_familiar" name="historial_familiar"></textarea>

        <label for="contacto_emergencia_nombre">Contacto de Emergencia - Nombre:</label>
        <input type="text" id="contacto_emergencia_nombre" name="contacto_emergencia_nombre" required>

        <label for="contacto_emergencia_telefono">Contacto de Emergencia - Teléfono:</label>
        <input type="text" id="contacto_emergencia_telefono" name="contacto_emergencia_telefono" required>

        <label for="contacto_emergencia_relacion">Contacto de Emergencia - Relación:</label>
        <input type="text" id="contacto_emergencia_relacion" name="contacto_emergencia_relacion" required>

        <button class="la_button" type="submit">Registrar Paciente</button>
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
