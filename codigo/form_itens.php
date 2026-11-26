
<!DOCTYPE html>
<html>
<head>
    <title>Faça seu pedido</title>
</head>
<body>

    <h1>Faça seu pedido</h1>

    <?php
    require_once "conexao.php";

    $sql = "SELECT * FROM Pedido";
    $resultado = $conexao->query($sql);

    $sql2 = "SELECT * FROM Pizza";
    $resultado2 = $conexao->query($sql2);
    ?>

    <form action="salvar_itens_pedido.php" method="POST">

        <label>Escolha o pedido:</label>
        <select name="id_pedido" required>
            <option value="">Selecione</option>

            <?php
            while ($linha = $resultado->fetch_assoc()) {
            ?>
                <option value="<?php echo $linha['id_pedido']; ?>">
                    <?php echo $linha['id_pedido']; ?>
                </option>
            <?php
            }
            ?>
        </select>

        <br><br>

        <label>Escolha a pizza:</label>
        <select name="id_pizza" required>
            <option value="">Selecione</option>

            <?php
            while ($linha = $resultado2->fetch_assoc()) {
            ?>
                <option value="<?php echo $linha['id_pizza']; ?>">
                    <?php echo $linha['nome']; ?>
                </option>
            <?php
            }
            ?>
        </select>

        <br><br>

        <label>Quantidade:</label>
        <input type="number" name="quantidade" min="1" required>

        <br><br>

        <input type="submit" value="Fazer pedido">

    </form>

</body>
</html>

