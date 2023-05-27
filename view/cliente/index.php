<?php
    require_once "../header_footer/header.php";
    require_once("c://xampp/htdocs/phpProyect/controllers/clienteController.php");
    
    $clienteController = new ClienteController();
    $pagina_actual = 1; 
    $registros_pagina = 10;
    $paginador = $clienteController->obtener_usuarios($pagina_actual, $registros_pagina);

    if(isset($_GET['filtro_nombre'])) {
        $nombre_filtrado = $_GET['filtro_nombre'];
        $usuarios_filtrados = $clienteController->filtrar($nombre_filtrado);
        
    } else {
        $usuarios_filtrados = $paginador['pagina'];
    }
?>

<div class="mb-3">
    <a class="btn btn-primary" href="/pruebas_php/view/cliente/create.php">Agregar cliente</a>
</div>

<form method="get" action="index.php">
    <input type="text" name="filtro_nombre" placeholder="Introduzca un nombre">
    <input type="submit" value="Filtrar">
</form>

<table class="table">
    <thead>
        <th>DNI</th>
        <th>Correo</th>
        <th>Acciones</th>
    </thead>
    <tbody>
        <?php if(isset($usuarios_filtrados) && count($usuarios_filtrados) > 0): ?>
            <?php foreach($usuarios_filtrados as $pag): ?>
                <tr>
                    <td><?php echo $pag["dni"] ?></td>
                    <td><?php echo $pag["correo"] ?></td>
                    <td>
                        <a href="show.php?dni=<?php echo $pag["dni"] ?>" class="btn btn-primary">Ver</a>
                        <a href="edit.php?dni=<?php echo $pag["dni"] ?>" class="btn btn-success">Modificar</a>
                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $pag["dni"] ?>">Eliminar</a>

                        <div class="modal fade" id="exampleModal<?php echo $pag["dni"] ?>" tabindex="-1" aria-hidden="true">
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
                                        <a href="delete.php?dni=<?php echo $pag["dni"] ?>" class="btn btn-danger">Eliminar</a>
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
    <input type="hidden" name="pagina_actual" value="<?php echo $paginador["pagina_actual"] ?>">
    <input type="hidden" name="total_paginas" value="<?php echo $paginador["total_paginas"] ?>">
    <input type="submit" name="primera" value="<<" onclick="primera_pagina()" <?php if ($paginador["pagina_actual"] == 1) echo "disabled"; ?>>
    <input type="submit" name="anterior" value="<" onclick="anterior_pagina()" <?php if ($paginador["pagina_actual"] == 1) echo "disabled"; ?>>
    <input type="text" name="pagina" value="<?php echo $paginador["pagina_actual"] ?>" style="text-align: center;">
    <input type="submit" name="siguiente" value=">" onclick="siguiente_pagina()" <?php if ($paginador["pagina_actual"] == $paginador["total_paginas"]) echo "disabled";?> >
    <input type="submit" name="ultima" value=">>" onclick="ultima_pagina()" <?php if ($paginador["pagina_actual"] == $paginador["total_paginas"]) echo "disabled"; ?>>
</form>

<br>
<?php
    echo "Total registros: " . $paginador["total_registros"] . "<br>";
    echo "Numero de paginas: " .$paginador["total_paginas"];
?>
<?php
    require_once "../header_footer/footer.php";
?>