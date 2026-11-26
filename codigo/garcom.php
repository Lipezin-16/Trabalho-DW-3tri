<?php
session_start();

if (!isset($_SESSION['funcao']) || $_SESSION['funcao'] != 1) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Area do Garçon</h1>
    <br>
    <a href="list-pedido">listar pedidos</a>
    <br> <br>
    <a href="cad-pedido.php">Cadastro de pedidos</a>
</body>
</html>