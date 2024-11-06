<?php

class DTOProducto{
    private $id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $clienteId;
    private $url;

    public function __construct($id, $nombre, $descripcion, $precio, $clienteId, $url){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->clienteId = $clienteId;
        $this->url = $url;
    }

    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($n){
        $this->nombre = $n;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setDescripcion($d){
        $this->descripcion = $d;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function setPrecio($p){
        $this->precio = $p;
    }

    public function getClienteId(){
        return $this->clienteId;
    }

    public function setClienteId($ci){
        $this->clienteId = $ci;
    }

    public function getUrl(){
        return $this->url;
    }
    public function setUrl($url){
        $this->url = $url;
    }

}

?>