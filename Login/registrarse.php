<?php

if(isset($_POST['registrarse'])) {
    require_once("registroUser.php");
    $registrar = new RegistroUser();

    $registrar-> setIdCamper(1);
    $registrar-> setUsername($_POST['username']);
    $registrar-> setEmail($_POST['email']);
    $registrar-> setPassword($_POST['password']);


    $registrar-> insertData();

    echo "<script> alert('Usuario registrado satisfactoriamente');document.location='loginRegister.php'</script>";
}


?>