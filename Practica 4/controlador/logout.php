<?php
session_start();
session_unset();
session_destroy();
header("Location: ../vista/vistaLogin.php");
exit();
?>
