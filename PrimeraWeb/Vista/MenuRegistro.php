<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../Recursos/Estilos/Login.css">
</head>
<body>
<div>
    <h1>Registro</h1>
    <br><br><br>
    <form action="../Controlador/ControlRegistroSesion.php" method="post">
        <p>Introduce tu nombre: </p>
        <input type="text" name="nombre" class="texto" placeholder="Escribe aquí" required/>
        <br><br>
        <p>Introduce tus apellidos: </p>
        <input type="text" name="apellidos" class="texto" placeholder="Escribe aquí" required/>
        <br><br>
        <p>Introduce el nombre de usuario: </p>
        <input type="text" name="nickname" class="texto" placeholder="Escribe aquí" required/>
        <br><br>
        <p>Introduce la contraseña: </p>
        <input type="password" name="password" class="texto" placeholder="Escribe aquí" required/>
        <br><br>
        <p>Introduce tu teléfono: </p>
        <input type="number" name="telefono" class="texto" required/>
        <br><br>
        <p>Introduce tu domicilio: </p>
        <input type="text" name="domicilio" class="texto" placeholder="Escribe aquí" required/>
        <br><br>
        <?php 
        if (isset($_GET['error'])) {
            print "<p style='color: red;'>Error en la introducción de datos. Realicelo de nuevo</p>";
        }
        
        ?>
        <br><br>
        <input id="enviar" type="submit" value="Comprobar"/>
    </form>
</div>
</body>
</html>

