<?php
    require_once "../header_footer/header.php";
    require_once "../../controllers/clienteController.php";
    
    $clienteController = new ClienteController();
    $pagina_actual = 1; 
    $registros_pagina = 10;
    $dni_filtrado = isset($_GET["filtro_dni"]) ? $_GET["filtro_dni"] : "";
    $correo_filtrado = isset($_GET["filtro_correo"]) ? $_GET["filtro_correo"] : "";
    
    $clientes_filtrados = $clienteController->obtener_usuarios_filtro($pagina_actual, $registros_pagina, $dni_filtrado, $correo_filtrado);

?>

<div class="mb-3">
    <a class="btn btn-primary" href="/phpProyect/view/cliente/create.php">Agregar cliente</a>
</div>

<form method="get" action="index.php">
    <input type="text" name="filtro_dni" placeholder="Introduzca un DNI">
    <input type="text" name="filtro_correo" placeholder="Introduzca un correo">
    <input type="submit" value="Filtrar">
</form>

<table class="table ps-5">
    <thead>
        <th>DNI</th>
        <th>Correo</th>
        <th>Acciones</th>
    </thead>
    <tbody>
        <?php if(isset($clientes_filtrados) && count($clientes_filtrados) > 0): ?>
            <?php foreach($clientes_filtrados["pagina"] as $cliente): ?>
                <tr>
                    <td><?php echo $cliente["dni"] ?></td>
                    <td><?php echo $cliente["correo"] ?></td>
                    <td>
                        <a href="show.php?dni=<?php echo $cliente["dni"] ?>" class="btn btn-primary">Ver</a>
                        <a href="edit.php?dni=<?php echo $cliente["dni"] ?>" class="btn btn-success">Modificar</a>
                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $cliente["dni"] ?>">Eliminar</a>

                        <div class="modal fade" id="exampleModal<?php echo $cliente["dni"] ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                                            ¿Desea eliminar el registro?
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Una vez eliminado, no se podrá recuperar el registro.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <a href="delete.php?dni=<?php echo $cliente["dni"] ?>" class="btn btn-danger">Eliminar</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3" class="text-center">No hay registros actualmente</td>
            </tr>
        <?php endif; ?>    
    </tbody>
</table>
<form action="index.php" method="get">
    <input type="hidden" name="pagina_actual" value="<?php echo $clientes_filtrados["pagina_actual"] ?>">
    <input type="hidden" name="total_paginas" value="<?php echo $clientes_filtrados["total_paginas"] ?>">
    <input type="submit" name="primera" value="<<" onclick="primera_pagina()" <?php if ($clientes_filtrados["pagina_actual"] == 1) echo "disabled"; ?>>
    <input type="submit" name="anterior" value="<" onclick="anterior_pagina()" <?php if ($clientes_filtrados["pagina_actual"] == 1) echo "disabled"; ?>>
    <input type="text" name="pagina" value="<?php echo $clientes_filtrados["pagina_actual"] ?>" style="text-align: center;">
    <input type="submit" name="siguiente" value=">" onclick="siguiente_pagina()" <?php if ($clientes_filtrados["pagina_actual"] == $clientes_filtrados["total_paginas"]) echo "disabled";?> >
    <input type="submit" name="ultima" value=">>" onclick="ultima_pagina()" <?php if ($clientes_filtrados["pagina_actual"] == $clientes_filtrados["total_paginas"]) echo "disabled"; ?>>
</form>

<br>
<?php
    echo "Total registros: " . $clientes_filtrados["total_registros"] . "<br>";
    echo "Numero de paginas: " .$clientes_filtrados["total_paginas"];
?>
<?php
    require_once "../header_footer/footer.php";
?>