<?php
    require_once "../Modelo/DTOCliente.php";
    session_start();
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre mí</title>
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

    <div id="contenido">
        <div id="inicio">
        </div>
        <aside>
            <h3>Algunos de nuestros productos que podrían interesarte</h3>
            <br><br>
            <figure>
                <a href="NuestrosProductos.php"><img src="../Recursos/img/Subidas/monitor1.webp" alt="Monitor en oferta"></a>
                <figcaption>Monitor PC 60,4 cm (23,8") LG 24MR400-B, 100 Hz, IPS Full HD</figcaption>
            </figure>
            <br><br><br><br>
            <figure>
                <a href="NuestrosProductos.php"><img src="../Recursos/img/Subidas/ratonErgonomico.jpg" alt="Ratón ergonómico"></a>
                <figcaption>Trust Verto Ratón Vertical, Ratón Ergonómico con Cable USB 1000/1600 dpi</figcaption>
            </figure>
            <br><br><br><br>
            <figure>
                <a href="NuestrosProductos.php"><img src="../Recursos/img/Subidas/ps3.webp" alt="Play Station 3 Slim"></a>
                <figcaption>Pack: PS3 Slim 160GB + Dual Shock 3</figcaption>
            </figure>
            <br><br><br><br>
            <h3>Si te interesan estos productos puedes echarle un ojo a <a href="NuestrosProductos.php" id="nuestrosProductos">Nuestros productos</a></h3>
        </aside>
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