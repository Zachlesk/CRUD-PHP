<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if(isset($_POST['registrarse'])) {
    require_once("registroUser.php");
    $registrar = new RegistroUser();

    $registrar-> setIdCamper(3);
    $registrar-> setUsername($_POST['username']);
    $registrar-> setEmail($_POST['email']);
    $registrar-> setPassword($_POST['password']);

    $registrar-> insertData();

    echo "<script> alert('Usuario registrado satisfactoriamente');document.location='loginRegister.php'</script>";


if($register->checkUser($_POST['email'])) {
    echo "<script> alert('Usuario ya existe');document.location='loginRegister.php'</script>";
}else {
    echo "<script> alert('Usuario registrado satisfactoriamente');document.location='estudiantes.php'</script>";
}

}
?>