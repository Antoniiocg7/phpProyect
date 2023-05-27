<?php
    require_once "../header_footer/header.php";
    require_once "../../controllers/clienteController.php";
    $clienteController = new ClienteController();
    $cliente = $clienteController->show($_GET["dni"]);
    //TODO: Optimizar rutas
?>

<h2>Modificando Registro</h2>
<form action="update.php" method="post" autocomplete="off">
    <div class="mb-3 row">
        <label for="id_dni" class="col-sm-2 col-form-label">DNI</label>
        <div class="col-sm-10">
        <input type="text" name="dni" readonly class="form-control-plaintext" id="id_dni" value="<?php echo $cliente["dni"] ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="id_correo" class="col-sm-2 col-form-label">Correo:</label>
        <div class="col-sm-10">
        <input type="text" name="correo" class="form-control" id="id_correo" value="<?php echo $cliente["correo"] ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="id_pass" class="col-sm-2 col-form-label">Contraseña:</label>
        <div class="col-sm-10">
        <input type="text" name="contrasena" class="form-control" id="id_pass" value="<?php echo $cliente["contrasena"] ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="id_nombre" class="col-sm-2 col-form-label">Nombre:</label>
        <div class="col-sm-10">
        <input type="text" name="nombre" class="form-control" id="id_nombre" value="<?php echo $cliente["nombre"] ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Primer Apellido:</label>
        <div class="col-sm-10">
        <input type="text" name="id_apellido_1" class="form-control" id="id_apellido_1" value="<?php echo $cliente["apellido_1"] ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Segundo Apellido:</label>
        <div class="col-sm-10">
        <input type="text" name="id_apellido_2" class="form-control" id="id_apellido_2" value="<?php echo $cliente["apellido_2"] ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="id_telefono" class="col-sm-2 col-form-label">Teléfono:</label>
        <div class="col-sm-10">
        <input type="text" name="telefono" class="form-control" id="id_telefono" value="<?php echo $cliente["telefono"] ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="id_direccion" class="col-sm-2 col-form-label">Dirección:</label>
        <div class="col-sm-10">
        <input type="text" name="direccion" class="form-control" id="id_direccion" value="<?php echo $cliente["direccion"] ?>">
        </div>
    </div>
    <div>
        <a class="btn btn-secondary" href="show.php?id=<?php echo $cliente["dni"]?>" >Cancelar</a>
        <input type="submit" class="btn btn-success" value="Actualizar">
    </div>
</form>


<?php
  require_once "../header_footer/footer.php";
?>