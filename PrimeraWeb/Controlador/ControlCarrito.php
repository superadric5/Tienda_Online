<?php
require_once "../Modelo/ProductosDAO.php";
session_start();
$productosDAO = new ProductosDAO();
if(!isset($_SESSION["carrito"])){
    $_SESSION["carrito"] = array();
}

/*
 * AGREGAR PRODUCTO AL CARRITO (No se acumulan los objetos si ya existe el mismo en el carrito)
 * -----------------*/

if(isset($_POST["agregar"])){
    $productoABuscar = $productosDAO->getProductoById($_POST["id"]);

    if(empty($_SESSION["carrito"])){
        $_SESSION["carrito"][] = $productoABuscar;
    }
    else {
        foreach ($_SESSION["carrito"] as $producto){
            if($producto->getId() != $productoABuscar->getId()){
                $_SESSION["carrito"][] = $productoABuscar;
            }
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
    foreach (array_keys($_SESSION["carrito"], $producto) as $key){
        unset($_SESSION["carrito"][$key]);
    }
    header("location:../Vista/Carrito.php");
    exit;
}
