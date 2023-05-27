<?php
  require_once "../header_footer/header.php";
  require_once "../../controllers/clienteController.php";
  $clienteController = new ClienteController();
  $data = $clienteController->show($_GET["dni"]);
?>

<h2 class="text-center">Detalles del registro</h2>
<div class="pb3">
  <a href="index.php" class="btn btn-primary">Regresar</a>
  <a href="edit.php?dni=<?php echo $data["dni"]?>" class="btn btn-success">Editar</a>
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



<table class="table table-striped container-fluid">
  <thead>
    <tr>
      <th scope="col">DNI</th>
      <th scope="col">Correo</th>
      <th scope="col">Nombre</th>
      <th scope="col">Primer Apellido</th>
      <th scope="col">Segundo Apellido</th>
      <th scope="col">Teléfono</th>
      <th scope="col">Dirección</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <td scope="col"><?php echo $data[0] ?></td>
      <td scope="col"><?php echo $data[1] ?></td>
      <td scope="col"><?php echo $data[3] ?></td>
      <td scope="col"><?php echo $data[4] ?></td>
      <td scope="col"><?php echo $data[5] ?></td>
      <td scope="col"><?php echo $data[6] ?></td>
      <td scope="col"><?php echo $data[7] ?></td>
      
    </tr>
  </tbody>

</table>

<table class="table table-striped container-fluid">
  <thead>
    <tr>
      <th>Reservas</th>
    </tr>
  </thead>
  <tbody>
    <td scope="col"><?php echo (empty($data[8])) ? "Ninguna" : $data[8] ?></td>
  </tbody>
</table>


<?php
  require_once "../header_footer/footer.php";
?>