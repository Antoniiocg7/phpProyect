<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src='/models/pageModel.js'></script>
    <title>
        <?php

            echo (empty($_GET["id"]))

            ? ((strpos($_SERVER["REQUEST_URI"],"create")) 

                ? "Agregando nuevo usuario" 
                : "Listado de Usuario"
            )

            : ((strpos($_SERVER["REQUEST_URI"],"show")) 

                ? "Detalles del registro".$_GET["id"] 
                : "Actualizar Registro".$_GET["id"]
            )
        ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid bg-dark p-2 mb-3">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="../../pagina_inicio/Index.php">Inicio</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Clientes
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../cliente/index.php">Listado Clientes</a></li>
                                <li><a class="dropdown-item" href="../cliente/create.php">Agregar nuevos clientes</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
<div class="container-fluid">