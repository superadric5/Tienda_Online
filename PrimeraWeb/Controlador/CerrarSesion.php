<?php
require_once "../Modelo/ProductosDAO.php";
session_start();
$productosDAO = new ProductosDAO();
$productos = $productosDAO->getAllProductos();

foreach ($productos as $producto){
   $productosDAO->updateProductoByClienteId(null, $producto->getId());
}

session_destroy();
header("location: ../Vista/index.php");
exit;
?>