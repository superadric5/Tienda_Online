<?php 

use Modelo\ClienteDAO;
use Modelo\DTOCliente;

    require "../Modelo/ClienteDAO.php";
    require_once "../Modelo/DTOCliente.php";

    $clienteDAO = new ClienteDAO();

        if(!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', $_POST["nombre"])){
            $nombreNoValido = true;
        }

        if(!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', $_POST["apellidos"])){
            $apellidosNoValido = true;
        }

        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $_POST["password"])) {
            $contrasenaNoValida = true;
        }

        if(!preg_match('/^[0-9]{9}$/', $_POST["telefono"])){
            $telefonoNoValido = true;
        }

        if(!preg_match('/^[a-zA-Z0-9\s]+$/', $_POST["domicilio"])){
            $domicilioNoValido = true;
        }

        if(!$nombreNoValido && !$apellidosNoValido && !$contrasenaNoValida && !$telefonoNoValido && !$domicilioNoValido){
            $cliente = new DTOCliente(null, $_POST["nombre"], $_POST["apellidos"], $_POST["nickname"], $_POST["password"], $_POST["telefono"], $_POST["domicilio"]);
            $clienteDAO->addCliente($cliente);
            header("Location: ../Vista/MenuLogin.php?registroCorrecto");
        }
        else{
            header("Location: ../Vista/MenuRegistro.php?error");
        }
        

    


?>