<?php
ini_set('display_errors', 'On'); ini_set('html_errors', 0); error_reporting(-1);

    $hostname="89.168.90.141";// Remote database server Domain name.
    $username="admin-rcp";// as specified in the GRANT command at that server.
    $password="rcp$$4149Es24";// as specified in the GRANT command at that server.
    $dbname="rcp_base_de_datos";// Database name at the database server.
    $conn = mysqli_connect($hostname, $username, $password, $dbname);
    mysqli_options($conn, MYSQLI_OPT_CONNECT_TIMEOUT, 10);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    echo "Connected successfully";
?>
