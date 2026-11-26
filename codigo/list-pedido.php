<?php
session_start();

if (!isset($_SESSION['funcao']) || $_SESSION['funcao'] != 0) {
    header("Location: index.php");

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Pedidos</title>
</head>
<body>

    <h2>Lista de Pedidos</h2>

    <table>
        <tr>
            <td>ID Pedido</td>
            <td>Nome do Cliente</td>
            <td>CPF</td>
            <td>Mesa</td>
            <td>Garçom</td>
            <td>Ação</td>
        </tr>

        <?php

        require_once "conexao.php";

        $sql = "SELECT Pedido.* , Mesa.nome AS mesa, Funcionario.nome AS garcom FROM Pedido INNER JOIN Mesa ON Pedido.id_mesa = Mesa.id_mesa INNER JOIN Funcionario ON Pedido.id_funcionario = Funcionario.id_funcionario";

        $resultados = mysqli_query($conexao, $sql);

        while ($linha = mysqli_fetch_array($resultados)) {

            $id = $linha['id_pedido'];
            $nome = $linha['nome_cliente'];
            $cpf = $linha['cpf_cliente'];
            $mesa = $linha['mesa'];
            $garcom = $linha['garcom'];

            echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$nome</td>";
                echo "<td>$cpf</td>";
                echo "<td>$mesa</td>";
                echo "<td>$garcom</td>";
                echo "<td><a href='detalhes_pedido.php?id=$id'>Visualizar pedido</a></td>";
                echo "<td><a href='editar-pedido.php?id=$id'>Editar</a></td>";
                echo "<td><a href='excluir-pedido.php?id=$id'>Excluir</a></td>";

            echo "</tr>";
        }

        ?>

    </table>

    <br>
    <a href="caixa.php">Voltar</a>

</body>
</html>
