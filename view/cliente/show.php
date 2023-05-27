<?php
  require_once "../header_footer/header.php";
  require_once "c:/xampp/htdocs/phpProyect/controllers/clienteController.php";
  $clienteController = new ClienteController();
  $data = $clienteController->show($_GET["dni"]);
?>

<h2 class="text-center">Detalles del registro</h2>
<div class="pb3">
  <a href="index.php" class="btn btn-primary">Regresar</a>
  <a href="edit.php?dni=<?=$data["dni"]?>" class="btn btn-success">Editar</a>
  <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar</a>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">¿Desea eliminar el registro?</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Una vez eliminado, no se podrá recuperar el registro.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <a href="delete.php?dni=<?php echo $data["dni"] ?>" class="btn btn-danger">Eliminar</a>
        </div>
      </div>
    </div>
  </div>
</div>



<table class="table container-fluid">
  <thead>
    <tr>
      <th scope="col">DNI</th>
      <th scope="col">Nombre</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td scope="col"><?= $data[0]  ?></td>
      <td scope="col"><?php echo $data[1] ?></td>
    </tr>
  </tbody>

</table>


<?php
  require_once "../header_footer/footer.php";
?>