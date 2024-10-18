<?php

require "../conexio.php";

function cambiarPsw() {

require "../model/modelUsuaris.php";
$pswActual = $_POST["pswActual"];
$pswNew = $_POST["pswNew"];
$pswVerify = $_POST["pswVerify"];

    if (comprovarPswActual($pswActual)) {
        if($pswNew == $pswVerify) {
            cambiarPswModel($pswNew);
            echo "Contrasenya cambiada amb èxit!";
        }
    }

}


?>