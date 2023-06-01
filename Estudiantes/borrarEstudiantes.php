<?php

require_once("Estudiante.php");

$record = new Estudiante();

if (isset($_GET["id"]) && isset($_GET["req"])) {
    if ($_GET["req"] == "delete") {
        $record -> setId($_GET["id"]);
        $record -> delete();
        echo "<script> alert('El dato seleccionado ha sido borrado satisfactoriamente');document.location='estudiantes.php'</script>";
    }
}

?>