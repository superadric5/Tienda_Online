<?php
    require_once "../Modelo/ProductosDAO.php";
    session_start();


  if(!isset($_SESSION["usuario"])){
    header("location:MenuLogin.php");
    exit;
}


$productosDAO = new ProductosDAO();
if(!isset($_SESSION["carrito"]))
    $_SESSION["carrito"] = array();
$precioTotal = 0;
?>

<head>
    <link rel="stylesheet" href="Estilos/estilosCarrito.css">
    <meta charset="UTF-8">
    <title>Carrito</title>
</head>
<body>
    <h1>CARRITO</h1>
    <hr>
    <h2>Productos añadidos</h2>
    <?php
        if(count($_SESSION["carrito"]) == 0)
            print "<h3><span style='color: red'>No hay productos en el carrito</span></h3>";
        foreach($_SESSION["carrito"] as $producto):
    ?>
            <div class="productoCarrito">
                <figure>
                    <img src="<?=$producto->getUrl()?>" alt="<?=$producto->getDescripcion()?>">
                </figure>
                <p><?=$producto->getNombre()?> - <?=$producto->getPrecio()?>€</p>
                <?php $precioTotal+= $producto->getPrecio()?>
                <form action="../Controlador/ControlCarrito.php" method="post">
                    <input type="hidden" name="id" value="<?=$producto->getId()?>"/>
                    <input type="submit" value="Eliminar del carrito" name="eliminar"/>
                </form>
            </div>
        <hr class="lineaDivisora">
    <?php endforeach;?>

    <form action="../Controlador/ControlCarrito.php" method="post">
        <input type="submit" value="Eliminar todos los productos" name="eliminaTodos"/>
        <?php
            if(isset($_REQUEST["errorNoProductos"])) print "<p><span style='color: red'>$_REQUEST[errorNoProductos]</span></p>"
        ?>
    </form>

    <p>Total: <?php print $precioTotal?>€</p>
    <input id="compra" type="button" value="Realizar compra">
    <br><br>
    <a href="NuestrosProductos.php">Volver a la tienda</a>
</body>

