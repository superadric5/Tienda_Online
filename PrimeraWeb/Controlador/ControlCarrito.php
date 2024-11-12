<?php
require_once "../Modelo/ProductosDAO.php";
require_once "../Modelo/DTOCliente.php";
session_start();
$productosDAO = new ProductosDAO();
if(!isset($_SESSION["carrito"])){
    $_SESSION["carrito"] = array();
}
if(!isset($_SESSION["usuario"])){
    header("location:../Vista/MenuLogin.php");
}
$usuario = $_SESSION["usuario"];

if(isset($_POST["vista"])){
    header("location:../Vista/vistaDetalladaProducto.php?id=".$_POST["id"]);
    exit;
}




/*
 * AGREGAR PRODUCTO AL CARRITO (No se acumulan los objetos si ya existe el mismo en el carrito)
 * -----------------*/

if(isset($_POST["agregar"])){
    $productoABuscar = $productosDAO->getProductoById($_POST["id"]);
    $productoEncontrado = false;
    if(empty($_SESSION["carrito"])){
        $productosDAO->updateProductoByClienteId($usuario->getId(), $productoABuscar->getId());
        $_SESSION["carrito"][] = $productoABuscar;
    }
    else {
        foreach ($_SESSION["carrito"] as $producto){
            if($producto->getId() == $productoABuscar->getId()){
                $productoEncontrado = true;
            }
        }
        if(!$productoEncontrado){
            $productosDAO->updateProductoByClienteId($usuario->getId(), $productoABuscar->getId());
            $_SESSION["carrito"][] = $productoABuscar;
        }
    }
   header("location:../Vista/NuestrosProductos.php");
    exit;
}


/*
 * ELIMINAR PRODUCTO DEL CARRITO
 * -----------------*/

if(isset($_POST["eliminar"])){
    $producto = $productosDAO->getProductoById($_POST["id"]);
    foreach ($_SESSION["carrito"] as $producto2){
        if($producto->getId() == $producto2->getId()){
            unset($_SESSION["carrito"][array_search($producto2, $_SESSION["carrito"])]);
        }
    }
    $productosDAO->updateProductoByClienteId(null, $producto->getId());

    header("location:../Vista/Carrito.php");
    exit;
}



if(isset($_POST["eliminaTodos"])){
    if(count($_SESSION["carrito"]) == 0){
        $errorNoProductos = "No hay productos en el carrito";
        header("location: ../Vista/Carrito.php?errorNoProductos=".$errorNoProductos);
        exit;
    }
    foreach ($_SESSION["carrito"] as $producto){
        $productosDAO->updateProductoByClienteId(null, $producto->getId());
    }
    $_SESSION["carrito"] = array();
    header("location: ../Vista/Carrito.php");
    exit;
}