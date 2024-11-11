<?php 

require_once "db.php";
require_once "DTOProducto.php";

class ProductosDAO{

    private $conn;

    public function __construct(){
        $this->conn = DB::getConn();
    }
    
    public function getProductoById($id){
        $stmt = $this->conn->prepare("SELECT * FROM producto WHERE id = :id");  
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new DTOProducto($row["id"],$row["nombre"],$row["descripcion"],$row["precio"],$row["cliente_id"], $row["url"]);
        }
        else{
            return null;
        }
       
    }

    public function getProductoByClienteId($ClienteId){
        $stmt = $this->conn->prepare("SELECT * FROM producto WHERE cliente_id = :clienteId");  
        $stmt->bindParam(":clienteId", $ClienteId);
        $stmt->execute();

        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $productos = [];

        foreach ($resultado as $productos) {
            $producto = new DTOProducto($resultado["id"],$resultado["nombre"],$resultado["descripcion"],$resultado["precio"],$resultado["cliente_id"], $resultado["url"]);
            $productos[] = $producto;
        }
        
    }

    public function getAllProductos(){
        $stmt = $this->conn->prepare("SELECT * FROM producto");
        $stmt->execute();

        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $productos = [];

        foreach ($resultado as $fila) {
            $producto = new DTOProducto($fila["id"], $fila["nombre"], $fila["descripcion"], $fila["precio"], $fila["cliente_id"], $fila["url"]);
            $productos[] = $producto;
        }
        return $productos;
    }

    public function insertProducto($producto){

        $stmt = $this->conn->prepare("INSERT INTO producto (nombre, descripcion, precio, cliente_id, url) VALUES(:nombre, :descripcion, :precio, :cliente_id, :url)");
        $stmt->bindParam(":nombre", $producto->getNombre());
        $stmt->bindParam(":descripcion", $producto->getDescripcion());
        $stmt->bindParam(":precio", $producto->getPrecio());
        $stmt->bindParam(":cliente_id", $producto->getClienteId());
        $stmt->bindParam(":url", $producto->getUrl());
        return $stmt->execute();

    }

    public function updateProducto($producto){
        $stmt = $this->conn->prepare("UPDATE producto SET nombre=:nombre, descripcion=:descripcion, precio=:precio, cliente_id=:clienteId, url=:url WHERE id=:id");
        $stmt->bindParam(":nombre", $producto->getNombre());
        $stmt->bindParam(":descrpcion", $producto->getDescripcion());
        $stmt->bindParam(":precio", $producto->getPrecio());
        $stmt->bindParam(":clienteId", $producto->getClienteId());
        $stmt->bindParam(":url", $producto->getUrl());
        $stmt->bindParam(":id", $producto->getId());

        return $stmt->execute();
    }

    public function deleteProducto($id){

        $stmt = $this->conn->prepare("DELETE * FROM producto WHERE id = :id");
        $stmt->bindParam(":id", $id);

        return $stmt->execute();

    }
}



?>