<?php




//header('Content-type: application/json;charset=utf-8');


//$estudiante=[1,2,3,4,5,6,7,8,9,10];

//echo json_encode($estudiante);

//con query
try {
    $mbd = new PDO('mysql:host=localhost;dbname=desarrollo_web', 'r0ot', '');

   
    //consultas preparadas 

    $stament = $mbd->prepare("SELECT * FROM generos");

    $stament->execute();
    $result = $stament->fetchAll(PDO::FETCH_ASSOC);

//print($_GET); //buscar como usar
//_POST buscar

    $mbd = null;

    header('Content-type:application/json;charset=utf-8');
    echo json_encode($result);
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}