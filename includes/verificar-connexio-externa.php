<?php
ini_set('display_errors', 'On'); ini_set('html_errors', 0); error_reporting(-1);

// Configuración de la conexión a la base de datos
$dbhost = "89.168.90.141";
$dbuser = "admin-rcp";
$dbpass = "rcp$$4149Es24";
$dbname = "rcp_base_de_datos";
$dbport = "3306";

// Establecer la conexión a la base de datos
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, $dbport);

// Verificar la conexión
if (!$conn) {
    die("No se pudo conectar a la base de datos: " . mysqli_connect_error());
}

// Consulta SQL a verificar
$sql = "SELECT * FROM internos";

// Ejecutar la consulta SQL
$result = mysqli_query($conn, $sql);

// Verificar si la consulta fue exitosa
if ($result) {
    // La consulta fue exitosa, mostrar los resultados
    if (mysqli_num_rows($result) > 0) {
        echo "La consulta se ejecutó correctamente y se encontraron " . mysqli_num_rows($result) . " filas.<br>";
        // Muestra los resultados de la consulta
        while ($row = mysqli_fetch_assoc($result)) {
            echo "NIS: " . $row["nis"] . " - Nombre: " . $row["nombre"] . " - Apellidos: " . $row["apellidos"] . " - Centro: " . $row["centro"] . "<br>";
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
