<?php
require_once 'transaccion.php';
require_once '../layout/layout.php';
require_once '../helpers/utilities.php';
require_once '../FileHandler/IFileHandler.php';
require_once '../FileHandler/FileHandlerBase.php';
require_once '../FileHandler/CsvFileHandler.php';
require_once '../FileHandler/JsonFileHandler.php';
require_once '../FileHandler/SerializationFileHandler.php';
require_once 'serviceFile.php';

$layout = new Layout();
$service = new ServiceFile();
$utilities = new Utilities();


$estudiante = null;

if (isset($_GET["id"])) {

    $estudiante = $service->GetById($_GET["id"]);
}

if (isset($_POST["estuId"]) && isset($_POST["Monto"]) && isset($_POST["Description"])) {

    $estudiante = new Transaccion($_POST["estuId"], $_POST["Monto"], $_POST["Description"]);

    $service->edit($estudiante);

    header("Location: ../index.php");
}




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>

<body>

    <?php echo $layout->printHeader() ?>

    <?php if ($estudiante == null) : ?>

        <h2>No existe Ningun estudiante</h2>

        <?php else : ?>

        <form action="edit.php" method="POST">

            <input type="hidden" name="estuId" value="<?= $estudiante->Id ?>">

            <div class="mb-3">
                <label for="monto" class="form-label">Monto</label>
                <input name="Monto" value="<?php echo $estudiante->Monto ?>" type="text" class="form-control" id="monto">

            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input name="Description" value="<?php echo $estudiante->Description ?>" type="text" class="form-control" id="description">
            </div>


            <a href="../index.php" class="btn btn-secondary">Volver</a>
            <button type="subtmit" class="btn btn-primary">Guardar</button>

        </form>


    <?php endif ?>


    <?php echo $layout->printFooter() ?>



</body>

</html>