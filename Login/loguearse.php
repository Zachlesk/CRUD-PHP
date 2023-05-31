<?php

session_start();

if(isset($_POST['loguearse'])){
    require_once("LoginUser.php");
    $credenciales = new LoginUser();
    $credenciales -> setEmail($_POST['email']);
    $credenciales -> setPassword($_POST['password']);

    $login = $credenciales -> login();

    if($login) {
        header('Location: ../estudiantes.php');

    } else{
        echo "<script> alert('Password/Email invalidos');document.location='loginRegister.php';</script>";
    }
}

?>