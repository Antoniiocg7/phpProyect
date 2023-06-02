<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
  <div class="container">
    <h2>Login</h2>
    <form action="login_check.php" method="POST">
      <div class="center">
        <input type="text" name="login_dni" required>
        <span></span>
        <label>DNI</label>
      </div>
      <div class="center">
        <input type="password" name="login_pass" required>
        <span></span>
        <label>Contraseña</label>
      </div>
      <div class="pass">¿Has olvidado la contraseña?</div>
      <input type="submit" value="Login">
      <div class="Link">
        ¿No eres un miembro? <a href="../registro/registro.php">Regístrate</a>
      </div>
    </form>
  </div>
</body>
</html>
