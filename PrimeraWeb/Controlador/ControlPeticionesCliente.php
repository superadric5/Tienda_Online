<?php

use Modelo\ClienteDAO;

    require "../Modelo/ClienteDAO.php";

    session_start();


    $clienteDAO = new ClienteDAO();

    $clientes = $clienteDAO->getAllClientes();

    foreach($clientes as $cliente){

        if ($_POST["nickname"] == $cliente->getNickname() && $_POST["password"] == $cliente->getPassword()){
            $_SESSION["usuario"] = $cliente;
            $usuarioEncontrado = true;
        }
        elseif ($_POST["nickname"] == $cliente->getNickname()) {
            $_SESSION["usuario"] = $cliente;
            $contrasenaIncorrecta = true;
        }
        else{
            $usuarioNoEncontrado = true;
        }
    }

        if ($usuarioEncontrado == true){
            header("Location: ../Vista/index.php");
        }
        elseif ($contrasenaIncorrecta == true) {
            header("Location: ../Vista/MenuLogin.php?contrasenaIncorrecta");
        } 
        else{
            header("Location: ../Vista/MenuLogin.php?usuarioNoEncontrado");
        }

    


?>