
<?php
    require_once "conexao.php";

    $id_pedido = $_POST['id_pedido'];
    $id_pizza = $_POST['id_pizza'];
    $quantidade = $_POST['quantidade'];

    $sql = "INSERT INTO Itens_Pedido (id_pedido, id_pizza, quantidade) VALUES (?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, "iii", $id_pedido, $id_pizza, $quantidade);
    mysqli_stmt_execute($comando);

    echo "Pedido concluido";
?>

