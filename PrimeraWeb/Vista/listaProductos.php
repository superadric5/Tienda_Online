<?php
require "../Modelo/ProductosDAO.php";
session_start();
$productosDAO = new ProductosDAO();
$productos = $productosDAO->getAllProductos();
?>

<head>
    <meta charset="UTF-8">
    <title>Lista de productos</title>
    <style>
        body {
            background-color: bisque;
        }
        td {
            padding: 5px;
        }
    </style>
</head>
<body>
    <h1>LISTA DE PRODUCTOS</h1>
    <br>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>Nombre</td>
            <td>Descripción</td>
            <td>Precio</td>
        </tr>
        <?php
            foreach ($productos as $producto):
        ?>
            <tr>
                <td><?= $producto->getId()?></td>
                <td><?= $producto->getNombre()?></td>
                <td><?= $producto->getDescripcion()?></td>
                <td><?= $producto->getPrecio()?></td>
            </tr>
        <?php endforeach;?>

    </table>
    <br><br>
    <a href="NuestrosProductos.php">Volver a la tienda</a>
</body>