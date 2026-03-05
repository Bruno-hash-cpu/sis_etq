<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>

<h2>Bem-vindo, <?= $_SESSION['user']['nome']; ?> 👋</h2>
<a href="logout.php">Sair</a>
