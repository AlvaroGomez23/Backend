<?php

require "../conexio.php";

function iniciarSessio() {

    $email = $_POST["email"];
    $contrasenya = $_POST["contrasenya"];

   
    require "../model/modelUsuaris.php";
    iniciarSessioModel($email,$contrasenya);

}



?>