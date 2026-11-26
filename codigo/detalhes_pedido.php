
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
    <title>Detalhes do Pedido</title>
</head>
<body>

    <h2>Detalhes do Pedido</h2>

    <?php

    require_once "conexao.php";

    $id = $_GET['id'];

    $sql = "SELECT * FROM Itens_Pedido INNER JOIN Pizza ON Itens_Pedido.id_pizza = Pizza.id_pizza WHERE Itens_Pedido.id_pedido = $id";
    $resultados = mysqli_query($conexao, $sql);
    $total = 0;

    ?>

    <h3>Pedido N <?php echo $id; ?></h3>

    <table>

        <tr>
            <td>Pizza</td>
            <td>Quantidade</td>
            <td>Valor Unitário</td>
            <td>Subtotal</td>
        </tr>

        <?php

        while ($linha = mysqli_fetch_array($resultados)) {
            $nome = $linha['nome'];
            $quantidade = $linha['quantidade'];
            $valor = $linha['valor'];

            $subtotal = $quantidade * $valor;
            $total = $total + $subtotal;

            echo "<tr>";
                echo "<td>$nome</td>";
                echo "<td>$quantidade</td>";
                echo "<td>R$ $valor</td>";
                echo "<td>R$ $subtotal</td>";
            echo "</tr>";
        }

        ?>

    </table>
    // vi no gustavo guanabara ksksk
    <h3>Valor Total: R$ <?php echo number_format($total, 2, ',', '.'); ?></h3>
    <br>

    <a href="pagamento.php?id=<?php echo $id; ?>">Fazer Pagamento</a> <br><br>

    <a href="consultar_pedidos.php">Voltar</a>

</body>
</html>
