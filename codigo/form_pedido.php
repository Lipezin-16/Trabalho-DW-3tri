
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Pedido</title>
</head>

<body>

<h1>Cadastrar Pedido</h1>

<?php
include("conexao.php");
?>

<div class="caixa">

    <form action="salvar_pedido.php" method="post">

        Nome do cliente:<br>
        <input type="text" name="nome_cliente" required>
        <br><br>

        CPF do cliente:<br>
        <input type="text" name="cpf_cliente" maxlength="11" required>
        <br><br>

        Escolher Mesa:<br>

        <select name="id_mesa" required>
            <option value="">Escolha a mesa</option>

            <?php
            $sql = "SELECT * FROM Mesa";
            $comando = mysqli_prepare($conexao, $sql);
            mysqli_stmt_execute($comando);
            $resultado = mysqli_stmt_get_result($comando);

            while ($mesa = mysqli_fetch_assoc($resultado)) {
            ?>

                <option value="<?php echo $mesa['id_mesa']; ?>">
                    <?php echo $mesa['nome']; ?>
                </option>

            <?php
            }
            ?>

        </select>

        <br><br>

        Escolher Funcionário:<br>

        <select name="id_funcionario" required>
            <option value="">Escolha o funcionário</option>

            <?php
            $sql = "SELECT * FROM Funcionario";
            $comando = mysqli_prepare($conexao, $sql);
            mysqli_stmt_execute($comando);
            $resultado = mysqli_stmt_get_result($comando);

            while ($funcionario = mysqli_fetch_assoc($resultado)) {
            ?>

                <option value="<?php echo $funcionario['id_funcionario']; ?>">
                    <?php echo $funcionario['nome']; ?>
                </option>

            <?php
            }
            ?>

        </select>

        <br><br>

        <button type="submit">Cadastrar Pedido</button>

    </form>

</div>

<br>

<a href="principal.php">
    <button>Voltar para página principal</button>
</a>

</body>
</html>
