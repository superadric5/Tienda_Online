<?php 
    require_once "../Modelo/ClienteDAO.php";

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
            $usuarioEncontrado = false;
        }

    }

        if ($usuarioEncontrado){
            header("Location: ../Vista/Inicio.php");
        }
        elseif ($contrasenaIncorrecta) {
            header("Location: ../Vista/MenuLogin.php?contrasenaIncorrecta=Contraseña incorrecta, pruebe otra vez ...");
        } 
        else{
            header("Location: ../Vista/MenuLogin.php?usuarioNoEncontrado=Usuario no encontrado, pruebe otra vez ...");
        }
    


?>