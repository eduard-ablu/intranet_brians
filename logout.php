<?php
// Inicia la sesión
session_start();

// Destruye todas las variables de sesión
$_SESSION = array();

// Finaliza la sesión
session_destroy();

// Redirige al usuario a la página de inicio de sesión (o cualquier otra página)
header("location: login.php");
exit; // Asegura que el script se detenga después de redirigir
?>
