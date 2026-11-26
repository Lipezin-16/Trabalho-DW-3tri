<?php
session_start();

if (!isset($_SESSION['funcao']) || $_SESSION['funcao'] != 0) {
    header("Location: index.php");
}

require_once "conexao.php";

$id = $_GET['id'];

$sql = "SELECT * FROM Itens_Pedido INNER JOIN Pizza ON Itens_Pedido.id_pizza = Pizza.id_pizza WHERE Itens_Pedido.id_pedido = ?";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "i", $id);
mysqli_stmt_execute($comando);
$resultados = mysqli_stmt_get_result($comando);

$total = 0;

while ($linha = mysqli_fetch_array($resultados)) {
    $quantidade = $linha['quantidade'];
    $valor = $linha['valor'];

    $subtotal = $quantidade * $valor;
    $total = $total + $subtotal;
}

if (isset($_POST['pagar'])) {

    $forma = $_POST['forma_pagamento'];
    $recebido = $_POST['valor_recebido'];
    if ($recebido < $total) {

        echo "<script>alert('Valor insuficiente!');</script>";

    } else {

        $nome_arquivo = $_FILES['comprovante']['name'];
        $caminho_temporario = $_FILES['comprovante']['tmp_name'];

        $extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);
        $novo_nome = uniqid() . "." . $extensao;
        $caminho_destino = "comprovantes/" . $novo_nome;

        move_uploaded_file($caminho_temporario, $caminho_destino);

        $sql = "INSERT INTO Pagamento (id_pedido, forma_pagamento, valor_pago, valor_pagamdo, comprovante) VALUES (?, ?, ?, ?, ?)";

        $comando = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($comando, "isdds", $id, $forma, $total, $recebido, $novo_nome);
        mysqli_stmt_execute($comando);

        echo "<script>
            alert('Pagamento realizado com sucesso!');
            window.location.href = 'list-pedido.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento</title>
</head>
<body>

    <h2>Pagamento do Pedido</h2>

    <h3>Pedido N <?php echo $id; ?></h3>

    <h3>Valor Total: R$ <?php echo number_format($total, 2, ',', '.'); ?></h3>

    <form method="POST" enctype="multipart/form-data">

        Forma de pagamento: <br>

        <select name="forma_pagamento">
            <option value="">Selecione</option>
            <option value="Dinheiro">Dinheiro</option>
            <option value="Pix">Pix</option>
            <option value="Cartão">Cartão</option>
        </select><br><br>

        Valor recebido: <br>
        <input type="number" name="valor_recebido"> <br><br>
        Comprovante: <br>
        <input type="file" name="comprovante"> <br><br>
        <input type="submit" name="pagar" value="Finalizar pagamento">

    </form>

    <br>

    <a href="list-pedido.php">Voltar</a>

</body>
</html>
