<?php

namespace Modelo;

use DB;

require 'db.php';
require 'DTOCliente.php';


class ClienteDAO
{
    private $conn;

    public function __construct(){
        $this->conn = DB::getConn();
    }

    public function getAllClientes(){
        $sql = "SELECT * FROM cliente";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll();

        $clientes = [];
        foreach($resultados as $fila){
            $cliente =new DTOCliente($fila['id'], $fila['nombre'], $fila['apellido'], $fila['nickname'], $fila['password'], $fila['telefono'], $fila['domicilo']);
            $clientes[] = $cliente;
        }
        return $clientes;
    }

    public function addCliente($cliente){
        $sql = $this->conn->prepare("INSERT INTO cliente VALUES(:id, :nombre, :apellido, :nickname, :password, :telefono, :domicilio)");

        $sql->bindValue(":id", $cliente->getId());
        $sql->bindValue(":nombre", $cliente->getNombre());
        $sql->bindValue(":apellido", $cliente->getApellido());
        $sql->bindValue(":nickname", $cliente->getNickname());
        $sql->bindValue(":password", $cliente->getPassword());
        $sql->bindValue(":telefono", $cliente->getTelefono());
        $sql->bindValue(":domicilio", $cliente->getDomicilio());
        return $sql -> execute();
    }

    public function getClienteById($id){
        $sql = $this->conn->prepare("SELECT id, nombre, apellido, nickname, telefono, domicilio FROM cliente WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        $fila = $sql -> fetch();

        if($fila){
            return new DTOCliente($fila['id'], $fila['nombre'], $fila['apellido'], $fila['nickname'], "", $fila['telefono'], $fila['domicilio']);
        }else{
            return null;
        }
    }
}