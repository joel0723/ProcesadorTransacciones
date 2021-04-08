<?php
require_once '../FileHandler/IFileHandler.php';
require_once '../FileHandler/FileHandlerBase.php';
require_once '../FileHandler/JsonFileHandler.php';
require_once '../FileHandler/SerializationFileHandler.php';
require_once '../FileHandler/CsvFileHandler.php';
require_once 'transaccion.php';
require_once '../helpers/utilities.php';
require_once 'serviceFile.php';


$service = new ServiceFile();

$estudiante = isset($_GET["id"]);


if($estudiante){

    $service->Delete($estudiante);
 
}

header("Location: ../index.php");
exit();



?>
