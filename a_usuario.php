<?php
$mbd = new PDO('mysql:host=localhost;dbname=desarrollo_web', 'root', '');

// Comprobar la conexión
if (!$mbd) {
    die("Conexión fallida: " . $mbd->connect_error);
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
    if (!empty($programa)) {
        $edicion .= " ,programa ='" . $programa . "'";
    }
} else {
    die("La identificación está vacía.");
}

if ($validar) {
    // Ejecutar la consulta SQL utilizando sentencias preparadas
    $stmt = $mbd->prepare("UPDATE personas SET nombre = ?, fecha_nac = ?, genero_id = ?, observaciones = ?, email = ?, programa = ? WHERE personas.identificacion = ?");
    $stmt->execute([$nombre, $fecha_nac, $genero_id, $observaciones, $email, $programa, $identificacion]);

    if ($stmt->rowCount() > 0) {
        echo "Los datos se han guardado correctamente en la base de datos.";
    } else {
        echo "Error: no se ha actualizado ningún registro.";
    }

    // Cerrar la conexión
    $mbd = null;
} else {
    die("La identificación está vacía.");
}
?>

