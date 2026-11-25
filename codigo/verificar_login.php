<?php
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "select * from Funcionario WHERE email = '$email' AND senha = '$senha'";
    
    require_once "conexao.php";
    $resultado = mysqli_query($conexao, $sql);

    $quantidade = mysqli_num_rows($resultado);
    
    if ($quantidade == 1) {

        $linha = mysqli_fetch_array($resultado);

        $nome = $linha['nome'];
        $email = $linha['email'];
        $id_funcionario = $linha['id_funcionario'];
            $funcao = $linha['funcao'];

        session_start();

        $_SESSION['email'] = $email;
        $_SESSION['nome'] = $nome;
        $_SESSION['id_funcionario'] = $id_funcionario;
        $_SESSION['funcao'] = $funcao;

        if ($funcao == 1) {
            header("Location: garcom.php");
        }
        else {
            header("Location: caixa.php");
        }
    }
    else {
    echo "<script>
        alert('Email ou senha incorretos!');
        window.location.href = 'index.php';
    </script>";
}
?>