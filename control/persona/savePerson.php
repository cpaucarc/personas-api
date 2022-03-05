<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('content-type: application/json; charset=utf-8');

require_once('../../db/connection.php');
require_once('../../models/Persona.php');

$people = new People();

try {
    $nmb = $_POST['nombres'];
    $apl = $_POST['apellidos'];
    $dn = $_POST['dni'];

    if (isset($nmb) and isset($apl) and isset($dn)) {
        $people->setNombres($nmb);
        $people->setApellidos($apl);
        $people->setDni($dn);

        if ($people->savePerson()) {
            echo $people->message("¡La persona " . $nmb . " fue guardado con exito!", true);
        } else {
            echo $people->message("No se pudo registrar", false);
        }
    } else {
        echo $people->message("Faltan datos", false);
    }
} catch (Exception $e) {
    echo $people->message("Error " . $e->getMessage(), false);
}
