<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #cbf3f0;
            color: #403d39;
        }
        .form-container {
            max-width: 500px;
            margin: 100px auto;
            padding: 30px;
            border-radius: 10px;
            background-color: #2ec4b6;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
        .form-container h2 {
            font-size: 30px;
            margin-bottom: 30px;
            text-align: center;
        }
        .form-container .form-control {
            background-color: #cbf3f0;
            color: #333;
            border: none;
            border-radius: 5px;
        }
        .form-container .form-control:focus {
            box-shadow: none;
        }
        .form-container .btn-primary {
            background-color: #4361ee;
            border: none;
        }
        .form-container .btn-primary:hover {
            background-color: #0069d9;
        }
        .form-container .btn-danger {
            background-color: #d62246;
            border: none;
        }
        .form-container .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 mx-auto">
                <div class="form-container">
                    <h2>Registro</h2>
                    <form action="store_registro.php" method="POST">
                        <div class="mb-3">
                            <label for="id_dni" class="form-label">DNI</label>
                            <input type="text" name="dni" class="form-control" id="id_dni" required>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="id_email" class="form-label">Email</label>
                                <input type="text" name="correo" class="form-control" id="id_email" required>
                            </div>
                            <div class="col">
                                <label for="id_pass" class="form-label">Contraseña</label>
                                <input type="password" name="contrasena" class="form-control" id="id_pass" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="id_nombre" class="form-label">Nombre</label>
                                <input type="text" name="nombre" class="form-control" id="id_nombre" required>
                            </div>
                            <div class="col">
                                <label for="id_apellido_1" class="form-label">Primer Apellido</label>
                                <input type="text" name="apellido_1" class="form-control" id="id_apellido_1" required>
                            </div>
                            <div class="col">
                                <label for="id_apellido_2" class="form-label">Segundo Apellido</label>
                                <input type="text" name="apellido_2" class="form-control" id="id_apellido_2" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="id_telefono" class="form-label">Teléfono</label>
                            <input type="text" name="telefono" class="form-control" id="id_telefono" required>
                        </div>
                        <div class="mb-3">
                            <label for="id_direccion" class="form-label">Dirección</label>
                            <input type="text" name="direccion" class="form-control" id="id_direccion" required>
                        </div>
                        <div class="text-center">
                            <a class="btn btn-danger mx-2" href="../login/login.php">Cancelar</a>
                            <button type="submit" class="btn btn-primary mx-2">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>