<?php

$servername = "localhost";
$username = "root";
$password = "aja";
$dbname = "desarrollo_web";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recuperar los datos del formulario
$identificacion = $_POST['identificacion'];
$nombre = $_POST['nombre'];
$fecha_nac = $_POST['fecha_nac'];
$genero_id = $_POST['uno'];
$observaciones = $_POST['observaciones'];
$email = $_POST['email'];
$programa = $_POST['programa'];
echo "el programa es: ".$programa;
$edicion = "";
$validar = false;

if (!empty($identificacion)) {
    $validar = true;
    if (!empty($nombre)) {
        $edicion = "nombre ='" . $nombre . "'";
    }
    if (!empty($fecha_nac)) {
        $edicion .= " ,fecha_nac ='" . $fecha_nac . "'";
    }
    if (!empty($genero_id)) {
        $edicion .= " ,genero_id ='" . $genero_id . "'";
    }
    if (!empty($observaciones)) {
        $edicion .= " ,observaciones ='" . $observaciones . "'";
    }
    if (!empty($email)) {
        $edicion .= " ,email ='" . $email . "'";
    }
} else {
    echo "La identificacion esta vacia";
}

if ($validar) {
    // Ejecutar la consulta SQL
    $sql = "UPDATE personas SET $edicion WHERE personas.identificacion=$identificacion";
    echo $sql;
    if ($conn->query($sql) === TRUE) {
        echo "Los datos se han guardado correctamente en la base de datos.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    echo "la identificacion esta vacia";
}
