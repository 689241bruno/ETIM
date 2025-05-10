<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/entrar.css">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <h1>Login</h1>
        <div>
            <section>
                <p>Email: </p>
                <input type="text" name="email" placeholder="@email.com" required>
            </section>
            <section>
                <p>Senha: </p>
                <input type="password" name="senha" id="senha" placeholder="pass" required>
                
            </section>
            
        </div>
        <a href="cadastrar.php">Não tenho uma conta</a>
        <input type="submit" value="Entrar" name="botao_entrar" id="btnEntrar">
    </form>
    <?php 
        require 'Usuario.class.php';
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $email = trim($_POST['email']);
            $senha = trim($_POST['senha']);
            $usuario = new Usuario();

            if($usuario->entrarUsuario($email, $senha)){
                $nomeUser = $usuario->entrarUsuario($email, $senha);
                echo "<script>alert('Seja bem-vindo, $nomeUser');</script>";

            } else {
                echo "<script>alert('Senha ou email incorreto!');</script>";

            }
        }
    ?>
</body>
</html>