<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consultas Médicas</title>
    <link rel="stylesheet" href="administracion_cons.css">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Para íconos -->
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


    <div class="product-table">
        <h2>Consultas Médicas Registradas</h2><br>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Diagnóstico</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
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

                // Consulta para obtener las consultas médicas
                $result = $db->query("SELECT id, nombre, diagnostico, fecha FROM recetas_medicas");

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['nombre']}</td>";
                        echo "<td>{$row['diagnostico']}</td>";
                        echo "<td>{$row['fecha']}</td>";
                        echo "<td>
                                <a href='consulta_cons.php?id={$row['id']}' class='action-view' title='Ver'><i class='fas fa-eye'></i></a>
                                <a href='modificacion_cons.php?id={$row['id']}' class='action-edit' title='Modificar'><i class='fas fa-edit'></i></a>
                                <a href='#' class='action-delete' title='Eliminar' onclick='confirmDelete({$row['id']})'><i class='fas fa-trash'></i></a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No hay consultas médicas en la base de datos.</td></tr>";
                }

                $db->close();
                ?>
            </tbody>
        </table>
    </div>

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

    <script>
        function confirmDelete(id) {
            if (confirm('¿Estás seguro de que deseas eliminar esta consulta?')) {
                window.location.href = 'eliminar.php?id=' + id;
            }
        }
    </script>
</body>
</html>
