<?php
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio sesión</title>
    <link rel="stylesheet" href="Estilos/Login.css">
</head>
<body>
    <div>
        <h1>Inicia sesión</h1>
        <br><br><br>
        <form action="controlPeticionesCliente.php" method="post">
            <p>Introduce el nombre de usuario: </p>
            <input type="text" name="nickname" class="texto" placeholder="Escribe aquí" value="<?php 
                session_start();
                if(isset($_GET["contrasenaIncorrecta"])){
                    print $_SESSION["usuario"]->getNickname();
                }
            ?>"/>
            <br><br>
            <p>Introduce la contraseña: </p>
            <input type="password" name="password" class="texto" placeholder="Escribe aquí"/>
            <?php 
                if(isset($_GET["contrasenaIncorrecta"])){
                    print "<p style=\"color: red; font-weight: bold;\">Contraseña Incorrecta</p>";
                }
            ?>
            <br>
            <?php 
                if(isset($_GET["usuarioNoEncontrado"])){
                    print "<p style=\"color: red; font-weight: bold;\">Este usuario no existe, registrate.</p>";
                }
            ?><br><br>
            <input id="enviar" type="submit" value="Comprobar"/>
        </form>
        <br><br>
        <p id="noCuenta">¿No tienes cuenta? Registrate <a href="MenuRegistro.php">aquí</a></p>
    </div>
</body>
</html>

