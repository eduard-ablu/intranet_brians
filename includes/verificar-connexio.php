<?php
// Configuración de la conexión a la base de datos
$dbhost = "localhost";
$dbuser = "phpmyadmin";
$dbpass = "%M4NUng41";
$dbname = "usuaris";

// Establecer la conexión a la base de datos
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Verificar la conexión
if (!$conn) {
    die("No se pudo conectar a la base de datos: " . mysqli_connect_error());
}

// Consulta SQL a verificar
$sql = "SELECT * FROM comptes";

// Ejecutar la consulta SQL
$result = mysqli_query($conn, $sql);

// Verificar si la consulta fue exitosa
if ($result) {
    // La consulta fue exitosa, mostrar los resultados
    if (mysqli_num_rows($result) > 0) {
        echo "La consulta se ejecutó correctamente y se encontraron " . mysqli_num_rows($result) . " filas.<br>";
        // Muestra los resultados de la consulta
        while ($row = mysqli_fetch_assoc($result)) {
            echo "ID: " . $row["id"] . " - Identificador: " . $row["identificador"] . " - Correo: " . $row["correu"] . " - Contraseña: " . $row["contrasenya"] . "<br>";
        }
    } else {
        echo "La consulta se ejecutó correctamente pero no se encontraron resultados.";
    }
} else {
    // La consulta falló, mostrar el error
    echo "Error al ejecutar la consulta: " . mysqli_error($conn);
}

// Cerrar la conexión
mysqli_close($conn);
?>
