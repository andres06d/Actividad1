<?php

$servername = "localhost";
$username = "root";
$password = "";
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
$genero_id = $_POST['genero_id'];
$observaciones = $_POST['observaciones'];

// Ejecutar la consulta SQL
$sql = "INSERT INTO personas (genero_id, identificacion, nombre, email, fecha_nac, observaciones) VALUES ('$genero_id', '$identificacion', '$nombre','no tiene','$fecha_nac','$observaciones')";
if ($conn->query($sql) === TRUE) {
    echo "Los datos se han guardado correctamente en la base de datos.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>