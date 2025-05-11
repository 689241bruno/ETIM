

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/cadastrar.css">
    <title>Cadastrar</title>
</head>
<body>
    <form method="post">
        <h1>Cadastrar</h1>
        <div>
            <section>
                <p>Nome: </p>
                <input type="text" name="nome" placeholder="username" required>
            </section>
            <section>
                <p>Email: </p>
                <input type="email" name="email" placeholder="@email.com" required>
            </section>
            <section>
                <p>Senha: </p>
                <input type="password" name="senha" id="senha" placeholder="password" required>
                
            </section>
            
        </div>
        <a href="entrar.php">já tenho uma conta</a>
        <input type="submit" value="Cadastrar" name="botao_cadastrar" id="btnCadastrar">
    </form>
    <?php 
        require 'Usuario.class.php';
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $usuario = new Usuario();
            $nome = trim($_POST['nome']);
            $email = trim($_POST['email']);
            $senha = trim($_POST['senha']);
            if($usuario->verificarEmail($email)){
                $usuario->cadastrarUsuario($nome, $email, $senha);
                echo "<script>
                    alert('Usuário inserido com sucesso!');
                    window.location.href = 'entrar.php';
                    </script>";

            } else {
                echo "<script>
                    alert('Ja existe um usuario com esse email!');
                    </script>";
            }
        }
    
    ?>
</body>
</html>