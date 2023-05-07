

<?php




//header('Content-type: application/json;charset=utf-8');


//$estudiante=[1,2,3,4,5,6,7,8,9,10];

//echo json_encode($estudiante);

//con query
try {
    $mbd = new PDO('mysql:host=localhost;dbname=desarrollo_web', 'root', '');

    $datos = $_POST['datos'];

    //consultas preparadas 
 
    $stament = $mbd->prepare("INSERT INTO personas (genero_id, identificacion, nombre, email, fecha_nac,observaciones, programa) VALUES $datos");

    $stament->execute();
    $result = $stament->fetchAll(PDO::FETCH_ASSOC);

    //print($_GET); //buscar como usar
    //_POST buscar

    $mbd = null;

    header('Content-type:application/json;charset=utf-8');
    echo json_encode($result);
} catch (PDOException $e) {
    
    $mensaje = $e->getMessage();

    if (strpos($mensaje, "for key 'PRIMARY'") !== false) {
        echo("El mensaje contiene la subcadena 'for key 'PRIMARY''");
    } else {
        print "¡Error!: " . $e->getMessage() . "<br/>";
    }
    
    

    
    die();
}
