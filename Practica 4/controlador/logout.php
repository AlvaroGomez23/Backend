<?php
session_start();
session_destroy();
header("Location: ../vista/vistaLogin.php");
exit();
?>
