<?php 

    require "../Modelo/DTOProducto.php";
    require_once "../Modelo/ProductosDAO.php";

    $productosDAO = new ProductosDAO();

    if($_POST["accion"] == "Agregar"){
        $productos = $productosDAO->getAllProductos();
        foreach ($productos as $producto) {
            if ($producto->getNombre() == $_POST["nombre"]) {
                $productoExiste = true;
            }
        }
        
        if ($productoExiste) {
            header("Location: ../Vista/addProducto.php?productoExiste");
        }
        else{
            $producto = new DTOProducto(null, $_POST["nombre"], $_POST["descripcion"], $_POST["precio"], null, $_POST["url"]);
            $productosDAO->insertProducto($producto);
            header("Location: ../Vista/NuestrosProductos.php");
        }
        
    }
    elseif ($_POST["accion"] == "Eliminar") {
        $productosDAO->deleteProducto($_POST["id"]);
        header("Location: ../Vista/NuestrosProductos.php");
    }
    else{
        $productos = $productosDAO->getAllProductos();
        foreach ($productos as $producto) {
            if ($producto->getNombre() == $_POST["nombre"]) {
                $productoExiste = true;
            }
        }
        
        if ($productoExiste) {
            header("Location: ../Vista/modificarProducto.php?productoExiste");
        }
        else{
            $producto = new DTOProducto($_POST["id"], $_POST["nombre"], $_POST["descripcion"], $_POST["precio"], null, $_POST["url"]);
            $productosDAO->updateProducto($producto);
            header("Location: ../Vista/NuestrosProductos.php");
        }
       
    }
?>