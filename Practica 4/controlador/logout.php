<?php
session_start();
session_unset(); // Borra els paràmetres de la sessió
session_destroy(); // Tanca la sessió
header("Location: ../vista/vistaLogin.php"); // Una vegada tancada la sessioó redirecciona al login
exit();
?>
