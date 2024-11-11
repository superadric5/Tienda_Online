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
        <form action="../Controlador/controlProducto" method="post">
            <h1>Añadir productos</h1>
            <label>Id: </label>
            <input type="number" name="id"/><br><br>
            <label>Nombre: </label>
            <input type="text" name="nombre"/><br><br>
            <label>Descripcion: </label>
            <input type="text" name="descripcion"/><br><br>
            <label>Precio: </label>
            <input type="number" name="precio"/><br><br>
            <label>URL imágen: </label>
            <input type="text" name="url"/>
            <br><br>
            <input type="submit" name="Agregar" value="Agregar"/>
        </form>
    </div>
        <br><br>
        <a href="NuestrosProductos.php">Volver a la tienda</a>

    </body>
