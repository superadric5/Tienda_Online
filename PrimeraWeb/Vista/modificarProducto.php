<?php
require_once "../Modelo/ProductosDAO.php";
session_start();
?>

<head>
    <meta charset="UTF-8">
    <title>Modificar producto</title>
    <link rel="stylesheet" href="Estilos/ModificacionesProductos.css">
</head>
<body>
<div>
<form action="../Controlador/ControlProductos.php" method="post">
    <h1>Modificar productos</h1>
    <label>Id: </label>
    <input type="number" name="id" required/><br><br>
    <label>Nuevo nombre: </label>
    <input type="text" name="nombre" required/><br><br>
    <label>Nueva descripcion: </label>
    <input type="text" name="descripcion" required/><br><br>
    <label>Nuevo precio: </label>
    <input type="number" name="precio" required/><br><br>
    <label>Nueva url imágen: </label>
    <input type="text" name="url" required/>
    <br><br>
    <input type="submit" name="accion" value="Modificar"/>
</form>
</div>
<br><br>
<a href="NuestrosProductos.php">Volver a la tienda</a>
</body>

