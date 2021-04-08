<?php
require_once 'FileHandler/IFileHandler.php';
require_once 'FileHandler/FileHandlerBase.php';
require_once 'FileHandler/JsonFileHandler.php';
require_once 'FileHandler/CsvFileHandler.php';
require_once 'FileHandler/SerializationFileHandler.php';
require_once 'transacciones/transaccion.php';
require_once 'helpers/utilities.php';
require_once 'layout/layout.php';
require_once 'transacciones/serviceFile.php';

$layout = new Layout(true);
$service = new ServiceFile(true);
$utilities = new Utilities();

$Transacciones = $service->GetList();


?>

<?php echo $layout->printHeader() ?>




<div class="row">



  <div class="col-md-10"></div>
  <div class="col-md-2">



    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#nuevo-heroe-modal">
      Nueva transaccion

    </button>


  </div>
</div>


<div class="row">




  <div class="row">

    <?php if (count($Transacciones) == 0) : ?>

      <h2>No hay transacciones</h2>

    <?php else : ?>

      
      
      <div class="col-md-3"></div>

        <div class="col-md-6">
        <h2>****Transacciones****</h2>

          <table class="table container mt-5">
            <thead class="table table-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Fecha</th>
                <th scope="col">Monto</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Accion</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($Transacciones as $key => $transaccion) : ?>
                <tr>
                  <th scope="row"><?= $transaccion->Id ?></th>
                  <td><?= date(DATE_RSS) ?></td>
                  <td><?php echo $transaccion->Monto ?></td>
                  <td><?php echo $transaccion->Description ?></td>

                  <td>
                    <a href="transacciones/edit.php?id=<?= $transaccion->Id ?>" class="btn btn-primary">Editar</a>
                    <a href="#" data-id="<?= $transaccion->Id ?>" class="btn btn-danger btn-delete">Eliminar</a>

                  </td>
                </tr>
              <?php endforeach; ?>

            </tbody>
          </table>

      <?php endif; ?>





        </div>
        <div class="col-md-3"></div>


        <div class="modal fade" id="nuevo-heroe-modal" tabindex="-1" aria-labelledby="nuevo-heroe-modal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header back">
                <h5 class="modal-title" id="nuevo-heroe-modal">transacciones</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <form action="transacciones/add.php" method="POST" enctype="multipart/form-data">

                  <div class="mb-3">
                    <label for="monto" class="form-label">Monto</label>
                    <input name="Monto" type="text" class="form-control" id="monto" placeholder="Monto">

                  </div>

                  <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripcion</label>
                    <input name="Descripcion" type="text" class="form-control" id="descripcion" placeholder="Descripcion">
                  </div>
                  <div class="modal-footer ">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
                    <button type="subtmit" class="btn btn-primary">Guardar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <?php echo $layout->printFooter() ?>

        <script src="assets/js/index/indexJquery.js"></script>