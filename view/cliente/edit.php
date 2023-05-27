<?php
    require_once "../header_footer/header.php";
    require_once "c:/xampp/htdocs/phpProyect/controllers/clienteController.php";
    $clienteController = new ClienteController();
    $cliente = $clienteController->show($_GET["dni"]);
    //TODO: Implementar demas atributos y optimizar rutas
?>

<h2>Modificando Registro</h2>
<form action="update.php" method="post" autocomplete="off">
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">DNI</label>
        <div class="col-sm-10">
        <input type="text" name="dni" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $cliente["dni"] ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Nuevo Nombre:</label>
        <div class="col-sm-10">
        <input type="text" name="nombre" class="form-control" id="inputPassword" value="<?php echo $cliente["nombre"] ?>">
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