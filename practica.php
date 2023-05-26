<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  // Validar el nombre de usuario y la contraseña
  if ($username === "usuario" && $password === "contrasena") {
    echo "Inicio de sesión exitoso. Bienvenido, $username!";
  } else {
    echo "Nombre de usuario o contraseña incorrectos.";
  }
}
?>
