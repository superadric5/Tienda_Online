<?php
require_once "../Modelo/DTOCliente.php";
require '../Modelo/ProductosDAO.php';
session_start();
if(isset($_SESSION["carrito"])){
    $numProductosCarrito = count($_SESSION["carrito"]);
}else $numProductosCarrito = 0;
$productosDAO = new ProductosDAO();
$productos = $productosDAO->getAllProductos();
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuestros Productos</title>
    <link rel="stylesheet" href="../Recursos/Estilos/estilos.css">
</head>
<body>
    <header>
        <div id="titulo">
            <h1><a href="index.php">La casa de informática de Madrid</a></h1>
        </div>
        <div class="enlace" id="enlace1">
            <a href="NuestrosProductos.php">Nuestros Productos</a>
        </div>
        <div class="enlace" id="enlace2">
            <a href="SobreNosotros.php">Sobre nosotros</a>
        </div>
        <div class="enlace" id="enlace3">
            <a href="DondeEstamos.php">Donde estamos</a>
        </div>
        <div class="enlace" id="enlace4">
            <a href="SobreMi.php">Sobre mí</a>
        </div>
        <div class="enlace" id="enlace5">
            <?php
            if(isset($_SESSION["usuario"])){
                $nickname = $_SESSION["usuario"]->getNickname();
                print "<p id=\"usuario\">$nickname</p>";
                print "<a href='../Controlador/CerrarSesion.php'>Cerrar sesión</a>";
            }
            else print "<a href='MenuLogin.php'>Iniciar sesión</a>"
            ?>
        </div>
    </header>

    <div class="contenedor">
        <h1>ECHA UN VISTADO A NUESTROS PRODUCTOS</h1>
    </div>
    <br><br>
    <div class="carrito">
        <a href="Carrito.php"><img src="../Recursos/img/carrito.png" alt="Carrito" width="40px" height="40px"></a> <?php print "<p>$numProductosCarrito</p>"?>
    </div>

    <div id="productos">

        <br><br><br>
        <?php
            if(empty($productos)){
                print "<p>No hay productos</p>";
            }
            print "<div class='filaItems'>";
            foreach ($productos as $producto): ?>
            <div class="producto">
                <form action="../Controlador/ControlCarrito.php" method="post">
                    <figure class="item">
                        <img src="<?=$producto->getUrl()?>" alt="<?=$producto->getDescripcion()?>">
                        <?php 
                        if ($producto->getPrecio() <= 10) {
                            print "<figcaption id=\"oferta\">Producto en oferta</figcaption>";
                        }
                        elseif ($producto->getPrecio() >= 200) {
                            print "<figcaption id=\"calidad\">Producto de calidad</figcaption>";
                        }
                            
                        ?>
                        <figcaption><?=$producto->getNombre()?> - <?=$producto->getPrecio()?>€</figcaption>
                        <input type="hidden" name="id" value="<?=$producto->getId()?>">
                    </figure>
                    <?php
                        if(isset($_SESSION["usuario"])){
                            print "<input type='submit' value='Agregar al carrito' name='agregar'/>";
                            print "<input type='submit' value='Vista detallada' name='vista'/>";
                        }
                    ?>
                </form>
            </div>
            <?php endforeach; ?>
            <?php print "</div>"?>
    </div>
    <br><br><br><br>
    <?php
        if(isset($_SESSION["usuario"])){
            print "<a href='addProducto.php'>Añadir producto</a><br>";
            print "<a href='eliminarProducto.php'>Eliminar producto</a><br>";
            print "<a href='modificarProducto.php'>Modificar producto</a><br>";
            print "<a href='listaProductos.php'>Lista de productos</a>";
            print "<br><br>";
        }
    ?>


    <footer>
        <div id="contacto" class="enlacesFooter">
            <h2>Contacto</h2>
            <hr>
            <p>Correo: <a href="mailto:casainformaticamadrid@gmail.com">casainformaticamadrid@gmail.com</a></p>
            <p>Instagram: <a href="">@casainformaticamadrid</a></p>
            <p>Num.Telf: +34 692 26 52 12</p>

        </div>
        <div id="otros" class="enlacesFooter">
            <h2>Otros enlaces</h2>
            <hr>
            <p><a href="MapaWeb.html">Mapa Web</a></p>
            <p><a href="AdministracionCookies.html">Administración de cookies</a></p>
            <p><a href="Accesibilidad.html">Accesibilidad</a></p>
        </div>
    </footer>
</body>
</html>