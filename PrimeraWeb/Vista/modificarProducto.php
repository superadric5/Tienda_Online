<?php
require_once "../Modelo/ProductosDAO.php";
session_start();
?>

<head>
    <meta charset="UTF-8">
    <title>Modificar producto</title>
    <link rel="stylesheet" href="../Recursos/Estilos/ModificacionesProductos.css">
</head>
<body>
<div>
<form action="../Controlador/ControlProductos.php" method="post" enctype="multipart/form-data">
    <h1>Modificar productos</h1>
    <label>Id: </label>
    <input type="number" name="id" required/><br><br>
    <label>Nuevo nombre: </label>
    <input type="text" name="nombre" required/>
    <?php 
        if(isset($_GET['productoExiste'])){
                print "<br><br><span style='color: red'>Nombre ya existe</span>";
            }
    ?><br><br>
    <label>Nueva descripcion: </label>
    <input type="text" name="descripcion" required/><br><br>
    <label>Nuevo precio: </label>
    <input type="number" name="precio" min="0" step="0.01" required/><br><br>
    <label>Nueva imagen: </label>
    <input type="file" name="ficheroSubida" required/>
    <br><br>
    <input type="submit" name="accion" value="Modificar"/>
</form>
</div>
<br><br>
<a href="NuestrosProductos.php">Volver a la tienda</a>
</body>

