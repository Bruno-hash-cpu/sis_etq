<?php
require_once "../config/database.php";
require_once "../app/models/Usuario.php";

$db = (new Database())->connect();
$usuario = new Usuario($db);

if ($_POST) {
    $usuario->registrar($_POST['nome'], $_POST['email'], $_POST['senha']);
    header("Location: login.php");
}
?>

<!-- página de registro  -->
<form method="POST">
    <h2>Registrar</h2>
    <input type="text" name="nome" placeholder="Nome" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="senha" placeholder="Senha" required>
    <button type="submit">Registrar</button>
</form>
