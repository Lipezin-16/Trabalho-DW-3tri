
<?php

include("conexao.php");

$nome_cliente = $_POST['nome_cliente'];
$cpf_cliente = $_POST['cpf_cliente'];
$id_mesa = $_POST['id_mesa'];
$id_funcionario = $_POST['id_funcionario'];

$sql = "INSERT INTO Pedido (nome_cliente, cpf_cliente, id_mesa, id_funcionario)
VALUES (?, ?, ?, ?)";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "ssii", $nome_cliente, $cpf_cliente, $id_mesa, $id_funcionario);

mysqli_stmt_execute($comando);

echo "Pedido cadastrado com sucesso!";

echo "<br><br>";


?>
