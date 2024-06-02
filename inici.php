<?php include "includes/verificar-sessio.php"; ?>
<?php $_SESSION['url'] = $_SERVER['REQUEST_URI']; ?>
<?php ob_start(); ?>

<?php include "includes/header.html" ?>

<html>

<input type="hidden" name="redirurl" value="<? echo $_SERVER['HTTP_REFERER']; ?>" />

<h1>Benvingut a l'inici de l'intranet!</h1>
</html>
