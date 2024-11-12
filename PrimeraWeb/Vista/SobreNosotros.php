<?php
    require_once "../Modelo/DTOCliente.php";
    session_start();
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre nosotros</title>
    <link rel="stylesheet" href="Estilos/estilos.css">
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

    <div id="contenido">
        <div id="inicio">
            <div class="contenedor">
                <h1>¿Quiénes somos?</h1>
            </div>
            <h3>Somos una empresa que apareció con la intención de hacerse bastante conocida por la zona. Empezamos ofreciendo únicamente servicios de reparaciones de teléfonos móviles, pero poco a poco fuimos creciendo y abrimos una tienda.</h3>

            <h3>Actualmente le hemos dado más enfoque a esta pero seguimos abiertos a que nos traigas cualquier aparato electrónico, te lo arreglaremos en muy poco tiempo.</h3>
        </div>
    </div>
    <br><br>
    <div id="contenido">
        <div id="inicio">
            <div class="contenedor">
                <h1>Nuestro diseño</h1>
            </div>
            <h3>Al empezar con la creación de nuestra web, surgió la gran duda, ¿Qué diseño utilizamos?</h3>

            <h3>Tras un tiempo dandole vueltas llegamos a la conclusión de usar este diseño que se ha mantenido hasta ahora, tanto el encabezado de la web, las formas de los contenedores, el color naranja... Todo ello nos hizo recordar a aquellas antiguas interfaces gráficas y páginas web de los años 2000, cuando apenas la gente tenía ordenador propio en casa.</h3> 
            
            <h3>Este diseño nos pareció el correcto para esta web, para la estética y el color naranja nos apoyamos en la estética DORFic, abreviatura de "Daylight, Orange, Red, Futurism, and Graphic", es una estética única que combina elementos de Abstract Tech y diseño minimalista.</h3>
        </div>
    </div>

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