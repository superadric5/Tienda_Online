<?php
require_once "../Modelo/ProductosDAO.php";
session_start();
?>

<head>
    <meta charset="UTF-8">
    <title>Eliminar producto</title>
    <link rel="stylesheet" href="Estilos/ModificacionesProductos.css">
</head>
<body>
<div>
<form action="../Controlador/ControlProductos.php" method="post">
    <h1>Eliminar productos</h1>
    <label>Id del producto a eliminar: </label>
    <input type="number" name="id"/><br><br>
    <input type="submit" name="accion" value="Eliminar"/>
</form>
</div>
<br><br>
<a href="NuestrosProductos.php">Volver a la tienda</a>
</body>

