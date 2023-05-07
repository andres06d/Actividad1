<?php

try {
    $mbd = new PDO('mysql:host=localhost;dbname=desarrollo_web', 'root', '');
} catch (PDOException $e) {
    die("Conexión fallida: " . $e->getMessage());
}


// Recuperar el número de identificación de la persona a eliminar
$identificacion = $_POST['datos'];
echo "la didentificacion es: ".$identificacion;

// Verificar que el número de identificación no está vacío
if (!empty($identificacion)) {
    // Preparar la consulta SQL de eliminación
    $sql = "DELETE FROM personas WHERE identificacion = :identificacion";

    // Preparar la sentencia
    $stmt = $mbd->prepare($sql);

    // Bind del parámetro de identificación
    $stmt->bindParam(':identificacion', $identificacion, PDO::PARAM_STR);

    // Ejecutar la sentencia
    if ($stmt->execute()) {
        echo "La persona con identificación $identificacion ha sido eliminada correctamente.";
    } else {
        echo "Error al eliminar la persona con identificación $identificacion: " . $mbd->errorInfo()[2];
    }

    // Cerrar la conexión
    $mbd = null;
} else {
    echo "El número de identificación está vacío.";
}
