<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Lista de pacientes</title>
    <link rel="stylesheet" href="../Index/styles.css" />
    <link rel="stylesheet" href="form.css" />
    <link rel="shortcut icon" href="icono.png">
</head>
<body>
<!-- -----------------------------------------------------------------------------------------encabezado-->
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
<!-- -----------------------------------------------------------------------------------------tabla de datos-->
    <section class="container top-formulario_r">
        <br><h1 class="heading-1">Lista de Pacientes</h1>
        <div class="container_tabla" id="table-container">
            
            <?php
            
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "medicad";
            $conn = new mysqli($servername, $username, $password, $dbname);

            
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM pacientes";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table border='1'>";
                echo "
                <tr>
                    <th>ID</th>
                    <th>Categoría</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Acciones</th>
                </tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["categoria"] . "</td>";
                    echo "<td>" . $row["nombre"] . "</td>";
                    echo "<td>" . $row["edad"] . "</td>";
                    echo "<td>" . $row["sexo"] . "</td>";
                    echo "<td>";
                    echo "<a href='editar_eliminar.php?id=" . $row['id'] . "' style='text-decoration: none; color: #black; background-color: #006064; padding: 5px 10px; border-radius: 4px; display: inline-block; text-align: center;";
                    echo "transition: background-color:#006064; color: white;"; 
                    echo "'";
                    echo ">";
                    echo "Ver Registro";
                    echo "</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No se encontraron registros.";
            }

            $conn->close();
            ?>
        </div>
    </section>
 <!-- -----------------------------------------------------------------------------------------pie de pagina -->
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

    <script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>
</body>
</html>
