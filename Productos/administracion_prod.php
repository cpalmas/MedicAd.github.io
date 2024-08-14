<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Administrar Productos</title>
    <link rel="stylesheet" href="administracion_prod.css">
    <link rel="stylesheet" href="../Index/styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Para íconos -->
    <style>
        .thumbnail {
            max-width: 100px;
            height: auto;
        }
        .action-view, .action-edit, .action-delete {
            text-decoration: none;
            color: black;
        }
        .action-delete {
            color: red;
        }
    </style>
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

    <div class="product-table">
        <h2>Productos Cargados</h2><br>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Imagen</th>
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

                // Consulta para obtener los productos
                $result = $db->query("SELECT id, nombre, precio, imagen FROM productos");

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['nombre']}</td>";
                        echo "<td>\${$row['precio']}</td>";
                        echo "<td><img src='data:image/jpeg;base64,".base64_encode($row['imagen'])."' alt='Imagen' class='thumbnail'></td>";
                        echo "<td>
                                <a href='vista_prod.php?id={$row['id']}' class='action-view' title='Ver'><i class='fas fa-eye'></i></a>
                                <a href='modificacion_prod.php?id={$row['id']}' class='action-edit' title='Modificar'><i class='fas fa-edit'></i></a>
                                <a href='#' class='action-delete' title='Eliminar' onclick='confirmDelete({$row['id']})'><i class='fas fa-trash'></i></a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No hay productos en la base de datos.</td></tr>";
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

    <script>
    function confirmDelete(id) {
        if (confirm("¿Estás seguro de que quieres eliminar este producto?")) {
            window.location.href = 'eliminar.php?id=' + id;
        }
    }
    </script>
</body>
</html>
