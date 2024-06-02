<?php
// Establim les variables que s'utilitzaran per establir la connexió
$dbhost = "localhost";
$dbuser = "phpmyadmin";
$dbpass = "%M4NUng41";
$dbname = "usuaris";

// Establim la connexió amb la base de dades MySQL fent ús de les variables superiors
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
    die("S'ha perdut la connexió amb la base de dades. Informi d'aquest error inmediatament: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identificador = $_POST["identificador"];
    $correu = $_POST["correu"];
    $contrasenya = $_POST["contrasenya"];

    $query = mysqli_query($conn, "SELECT * FROM comptes WHERE identificador = '" . $identificador . "' and correu = '" . $correu . "' and contrasenya = '" . $contrasenya ."'");
    $verificacio = mysqli_num_rows($query);

    if ($verificacio == 1) {
	session_start(); // Iniciem la sessió
	ini_set('session.cookie_lifetime', 3600); // Establim 1 hora com la duració màxima de la sessió
	$_SESSION['identificador'] = $identificador; // Asignem l'ID de l'usuari com a variable de sessió
	header("Location: inici.php"); // Redirigim l'usuari a l'inici, ja que la sessió s'ha iniciat correctament
	exit;
    } else {
        echo "<script> alert('Les credencials són incorrectes. Torni a intentar-ho');window.location= 'login.php' </script>";
        // Les dades són incorrectes pel que enviem un missatge d'error i redirigim l'usuari a la mateixa pàgina
    }
}

// Header de navegació
include "includes/header.html"

?>


<html>
<center>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table>
            <tr>
                <td colspan="2" id="up-ly">
                    <label>Inici de sessió</label>
                </td>
            </tr>
            <tr>
                <td align="center" rowspan="6"><img src="img/dpjusticia.png" /></td>
                <td><label>Identificador</label></td>
            </tr>
            <tr>
                <td><input type="text" name="identificador" /></td>
            </tr>
            <tr>
                <td><label>Correu electrònic</label></td>
            </tr>
            <tr>
                <td><input type="text" name="correu" /></td>
            </tr>
            <tr>
                <td><label>Contrasenya</label></td>
            </tr>
            <tr>
                <td><input type="password" name="contrasenya" /> </td>
            </tr>
            <tr>
                <td><input type="submit" value="Accedir" /> </td>
            </tr>
        </table>
    </form>
</center>
</html>
