<?php 

    require "../Modelo/DTOProducto.php";
    require_once "../Modelo/ProductosDAO.php";

    $productosDAO = new ProductosDAO();

    if($_POST["accion"] == "Agregar"){
        $producto = new DTOProducto(null, $_POST["nombre"], $_POST["descripcion"], $_POST["precio"], null, $_POST["url"]);
        $productosDAO->insertProducto($producto);
        header("Location: ../Vista/NuestrosProductos.php");
    }elseif ($_POST["accion"] == "Eliminar") {
        $productosDAO->deleteProducto($_POST["id"]);
        header("Location: ../Vista/NuestrosProductos.php");
    }
    else{
        $producto = new DTOProducto($_POST["id"], $_POST["nombre"], $_POST["descripcion"], $_POST["precio"], null, $_POST["url"]);
        $productosDAO->updateProducto($producto);
        header("Location: ../Vista/NuestrosProductos.php");
    }
?>