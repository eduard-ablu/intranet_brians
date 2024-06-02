<?php
session_start();
if(!(isset($_SESSION['identificador']))) {
	header("Location: ./login.php");
	exit;
}
?>
