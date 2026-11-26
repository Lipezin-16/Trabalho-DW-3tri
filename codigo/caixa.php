<?php
session_start();

if (!isset($_SESSION['funcao']) || $_SESSION['funcao'] != 0) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caixa</title>
</head>
<body>
    <h1>Bem vindo, <?php echo $_SESSION['nome']; ?>!</h1>
    <p>Voce esta na area do caixa</p>
    <br>
    <H2>Consultar pedidos</H2>
    <a href="list-pedido.php">Pedidos</a> <br>
    <h2>Sair</h2>
    <a href="index.php">Sair</a>
</body>
</html>