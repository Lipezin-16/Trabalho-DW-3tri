
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
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $sql2 = "SELECT * FROM Pizza";
    $comando2 = mysqli_prepare($conexao, $sql2);
    mysqli_stmt_execute($comando2);
    $resultado2 = mysqli_stmt_get_result($comando2);
    ?>

    <form action="salvar_itens.php" method="POST">

        Pedido:
        <select name="id_pedido">
            <?php while ($linha = mysqli_fetch_assoc($resultado)) { ?>
                <option value="<?php echo $linha['id_pedido']; ?>">
                    <?php echo $linha['id_pedido']; ?>
                </option>
            <?php } ?>
        </select>

        <br><br>

        Pizza:
        <select name="id_pizza">
            <?php while ($linha = mysqli_fetch_assoc($resultado2)) { ?>
                <option value="<?php echo $linha['id_pizza']; ?>">
                    <?php echo $linha['nome']; ?>
                </option>
            <?php } ?>
        </select>

        <br><br>

        Quantidade:
        <input type="number" name="quantidade">

        <br><br>

        <input type="submit" value="Fazer pedido">

    </form>

</body>
</html>

