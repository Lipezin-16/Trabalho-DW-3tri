<?php
session_start();

if (!isset($_SESSION['funcao']) || $_SESSION['funcao'] != 0) {
    header("Location: index.php");
    exit;
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
    testando caixa
</body>
</html>