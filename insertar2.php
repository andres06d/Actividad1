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

// Ejecutar la consulta SQL
$sql = "INSERT INTO tabla (identificacion, nombre) VALUES ('$identificacion', '$nombre ')";
if ($conn->query($sql) === TRUE) {
    echo "Los datos se han guardado correctamente en la base de datos.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
