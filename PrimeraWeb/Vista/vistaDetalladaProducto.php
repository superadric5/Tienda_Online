<?php

require_once "../Modelo/ProductosDAO.php";
session_start();
$productoDAO = new ProductosDAO();
$producto = $productoDAO->getProductoById($_GET["id"]);

?>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Estilos/Producto.css">
    <title>Vista detallada del producto</title>
</head>
<body>
    <h1><?php print $producto->getNombre()?></h1>
    <hr>
    <img src="<?php print $producto->getUrl()?>" alt="<?php print $producto->getDescripcion()?>" width="100px" height="100px">

    <p>ID del producto: <span style="text-decoration: underline"><?php print $producto->getId()?></span></p>
    <p>Nombre del producto: <span style="text-decoration: underline"><?php print $producto->getNombre()?></span></p>
    <p>Descripción del producto: <span style="text-decoration: underline"><?php print $producto->getDescripcion()?></span></p>
    <p>Precio: <span style="text-decoration: underline"><?php print $producto->getPrecio()?></span></p>

    <?php $clienteID = $producto->getClienteId() == null ? "Sin cliente" : $producto->getClienteId(); ?>

    <p>Cliente ID: <span style="text-decoration: underline"><?php print $clienteID?></span></p>
    <p>URL de la imágen: <span style="text-decoration: underline"><?php print $producto->getUrl()?></span></p>
    <br><br>
    <a href="NuestrosProductos.php">Volver a la tienda</a>
</body>




