<?php
session_start();

require_once "../config/database.php";
require_once "../app/models/Usuario.php";

$db = (new Database())->connect();
$usuario = new Usuario($db);

if ($_POST) {
  $user = $usuario->login($_POST['email'], $_POST['senha']);

  if ($user) {
    $_SESSION['user'] = $user;
    header("Location: dashboard.php");
    exit;
  } else {
    echo "Login inválido!";
  }
}
?>

<!-- página de login -->
<form method="POST">
  <h2>Login</h2>
  <input type="email" name="email" placeholder="Email" required>
  <input type="password" name="senha" placeholder="Senha" required>
  <button type="submit">Entrar</button>
</form>
