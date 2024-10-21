<?php

require "../conexio.php";
session_start();

function iniciarSessio() {

    $email = $_POST["email"]; // Mail que introdueix l'usuari
    $contrasenya = $_POST["contrasenya"]; // Contrasenya que introdueix l'usuari

   
    require "../model/modelUsuaris.php";
    iniciarSessioModel($email,$contrasenya); // Crida al login

}



?>