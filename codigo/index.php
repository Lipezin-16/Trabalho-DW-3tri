<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login da pizzaria</title>
</head>
<body>
    <h1>Pizzaria Bom Sabor</h1>
    <br>
    <section>
        <div>
            <form action="verificar_login.php" method="post" value = "<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>">
                E-mail: <br>
                <input type="text" name="email"> <br>
                Senha: <br>
                <input type="password" name="senha" id = "senha"> 

                <button type="button" onclick = "mostrarsenha()">mostrar</button> <br>
                <script>
                function mostrarsenha() {
                    var senha = document.getElementById("senha")
                        if (senha.type == "password") {senha.type = "text";}
                        else {
                            senha.type = "password";
                        }
                    }
                </script>

                <input type="submit" value="Logar">
            </form>
        </div>
    </section>
</body>
</html>