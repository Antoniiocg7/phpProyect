<?php
  require_once "../header_footer/header.php";
  require_once "../../controllers/clienteController.php";
  require_once '../../config/sessionManager.php';
  require_once "../../controllers/loginController.php";
  
  SessionManager::restringir_acceso();

  $clienteController = new ClienteController();
  $loginController = new LoginController();
  $admin_checker = $loginController->es_admin($_SESSION["dni_cliente"]);
  $data = $clienteController->show($_GET["dni"]);
  $reservas = $clienteController->mostrar_reservas($_GET["dni"]);
?>

<h2 class="text-center">Detalles del registro</h2>
<?php
  if($admin_checker==true){
?>
  <div class="pt-2 pb-4">
    <a href="index.php" class="btn btn-primary">Regresar</a>
    <a href="edit.php?dni=<?php echo $data["dni"]?>" class="btn btn-success">Editar</a>
    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar</a>

    
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
<?php } ?>

<h2>Tus Datos</h2>
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
  <h2>Reservas</h2>
  <thead>
    <tr>
      <th scope="col">Número de Reserva</th>
      <th scope="col">ID_Cliente</th>
      <th scope="col">Número de Habitación</th>
      <th scope="col">Fecha Entrada</th>
      <th scope="col">Fecha Salida</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $reservas = $clienteController->mostrar_reservas($_GET["dni"]);

      if ($reservas) {
          foreach ($reservas as $reserva) {
              ?>
              <tr>
                  <td><?php echo $reserva['id']; ?></td>
                  <td><?php echo $reserva['id_cliente']; ?></td>
                  <td><?php echo $reserva['id_habitacion']; ?></td>
                  <td><?php echo $reserva['fecha_entrada']; ?></td>
                  <td><?php echo $reserva['fecha_salida']; ?></td>
              </tr>
              <?php
          }
      } else {
          // No se encontraron reservas para el cliente
          ?>
          <tr>
              <td colspan="5">No hay reservas</td>
          </tr>
          <?php
      }
    ?>
  </tbody>
</table>


<?php
  require_once "../header_footer/footer.php";
?>