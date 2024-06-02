<?php include "includes/verificar-sessio.php"; ?>
<?php $_SESSION['url'] = $_SERVER['REQUEST_URI']; ?>
<?php ob_start(); ?>
<?php include "includes/header.html" ?>
<?php ini_set('display_errors', 'On'); ini_set('html_errors', 0); error_reporting(-1); ?>

<?php

$dbhost = "89.168.90.141";
$dbuser = "admin-rcp";
$dbpass = "rcp$$4149Es24";
$dbname = "rcp_base_de_datos";


$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
    die("S'ha perdut la connexió amb la base de dades. Informi d'aquest error inmediatament: " . mysqli_connect_error());
}

// Consultem la base de dades para obtenir dades de reclusos
//$consulta_basica = "SELECT * FROM internos";
$consulta = "SELECT * FROM internos INNER JOIN datos_internos ON internos.NIS = datos_internos.NIS";
$resultat = mysqli_query($conn, $consulta);

while ($fila = mysqli_fetch_assoc($resultat)) {
    $nis = $fila['nis'];
    $nom = $fila['nombre'];
    $cognoms = $fila['apellidos'];
    $grau = $fila['grado'];
    $categoria_fies = $fila['categoria_fies'];
    $centre = $fila['centro'];
    ?>
    <div class="bloc-t">
        <table>
            <thead>
                <tr>
                    <th>NIS</th>
                    <th>Nom</th>
                    <th>Cognoms</th>
                    <th>Grau</th>
                    <th>Categoria FIES</th>
                    <th> </th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $nis; ?></td>
                    <td><?php echo $nom; ?></td>
                    <td><?php echo $cognoms; ?></td>
                    <td><?php echo $grau; ?></td>
                    <td><?php echo $categoria_fies; ?></td>
                    <td>
                	<?php echo '<a href="reclusos.php?nis='.$fila['nis'].'" class="btn btn-editar">Editar registre</a>'; ?>
                        <a href="#" class="btn btn-eliminar">Eliminar registre</a>                  
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<?php
    //echo "<tr><td>".$fila['id']."</td><td>".$fila['nombre']."</td><td>".$fila['edad']."</td><td>".$fila['delito']."</td></tr>";
}

// Cerrar conexión
mysqli_close($conn);
?>
