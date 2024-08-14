<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Administrar Productos</title>
    <link rel="stylesheet" href="alta.css">
    <link rel="stylesheet" href="encabezado.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Para íconos -->
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
        <!-- Lado Izquierdo: Formulario -->
        <div class="form-container">
            <form class="form1" action="alta.php" method="post" enctype="multipart/form-data">
                <label>Nombre del producto:</label>
                <input type="text" name="nombre" id="nameInput" required/><br>
                
                <label>Precio del producto:</label>
                <input type="number" step="0.01" name="precio" id="priceInput" required/><br>
                
                <label>Descripción del producto:</label>
                <input type="text" name="descripcion" id="descriptionInput" required/><br>
                
                <label>Descuento del producto (%):</label>
                <input type="number" step="0.01" name="descuento" id="discountInput" min="0" max="100" placeholder="0.00"/><br><br>
                
                <label>Imagen para subir:</label>
                <input class="button" type="file" name="image" id="imageInput" required/><br><br>
                
                <input class="la_button"  type="submit" name="submit" value="SUBIR"/>
            </form>
        </div>

        <!-- Lado Derecho: Previsualización -->
        <div class="preview-container">
            <div class="product-card">
                <img src="https://via.placeholder.com/300x200" alt="Imagen del Producto" id="imagePreview"/>
                <div id="discountTag" class="discount-tag">0% OFF</div>
                <h3 id="namePreview">Nombre del Producto</h3>
                <p id="pricePreview">Precio: $0.00</p>
                <p id="descriptionPreview">Descripción: Descripción del producto</p>
                <div class="buy-section">
                    <input type="number" name="quantity" min="1" value="1">
                    <button type="button">Comprar</button>
                </div>
            </div>
        </div>
    </div>
   
    <script>
        document.getElementById('nameInput').addEventListener('input', function() {
            document.getElementById('namePreview').innerText = this.value;
        });

        document.getElementById('priceInput').addEventListener('input', function() {
            const price = parseFloat(this.value) || 0;
            const discount = parseFloat(document.getElementById('discountInput').value) || 0;
            const discountedPrice = discount > 0 ? price - (price * (discount / 100)) : price;
            document.getElementById('pricePreview').innerText = 'Precio: $' + discountedPrice.toFixed(2);
        });

        document.getElementById('descriptionInput').addEventListener('input', function() {
            document.getElementById('descriptionPreview').innerText =  this.value;
        });

        document.getElementById('discountInput').addEventListener('input', function() {
            const discount = this.value;
            const price = parseFloat(document.getElementById('priceInput').value) || 0;
            const discountedPrice = discount > 0 ? price - (price * (discount / 100)) : price;

            document.getElementById('pricePreview').innerText = 'Precio: $' + discountedPrice.toFixed(2);

            const discountTag = document.getElementById('discountTag');
            if (discount > 0) {
                discountTag.innerText = discount + '% descuento';
                discountTag.style.display = 'block';
            } else {
                discountTag.style.display = 'none';
            }
        });

        document.getElementById('imageInput').addEventListener('change', function(event) {
            const reader = new FileReader();
            reader.onload = function(){
                const output = document.getElementById('imagePreview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        });
    </script>

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
