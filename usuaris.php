<?php include "includes/verificar-sessio.php"; ?>
<?php $_SESSION['url'] = $_SERVER['REQUEST_URI']; ?>
<?php ob_start(); ?>

<?php include "includes/header.html" ?>

<h1>Benvingut a la pàgina d'usuaris de la intranet</h1>
