<?php
    require_once "../Modelo/ProductosDAO.php";
    session_start();
?>

    <head>
        <meta charset="UTF-8">
        <title>Añadir producto</title>
        <link rel="stylesheet" href="Estilos/ModificacionesProductos.css">
    </head>
    <body>
    <div>
        <form action="../Controlador/ControlProductos.php" method="post">
            <h1>Añadir productos</h1>
            <label>Nombre: </label>
            <input type="text" name="nombre" required/>
            <?php 
                if(isset($_GET['productoExiste'])){
                    print "<span style='color: red'>Nombre ya existe</span>";
                }
            ?><br><br>
            <label>Descripcion: </label>
            <input type="text" name="descripcion" required/><br><br>
            <label>Precio: </label>
            <input type="number" name="precio" min="0" required/><br><br>
            <label>URL imágen: </label>
            <input type="text" name="url" required/>
            <br><br>
            <input type="submit" name="accion" value="Agregar"/>
        </form>
    </div>
        <br><br>
        <a href="NuestrosProductos.php">Volver a la tienda</a>

    </body>
