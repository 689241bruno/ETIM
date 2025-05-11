<?php 
    session_start();
    require('Usuario.class.php');
    $user = new Usuario();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/editar.css">
    <title>Cadastrar</title>
</head>
<body>
    <form method="post" action="acoes.php">
        <h1>Editar usuario</h1>
        <div>
            <?php 
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $valores = $user->pegarInfosComId($id);
                $nome = $valores['nome'];
                $email = $valores['email'];
            }
            ?>
            <section>
                <p>Nome: </p>
                <input type="text" name="nome" placeholder="username" value="<?=$nome?>" required>
            </section>
            <section>
                <p>Email: </p>
                <input type="email" name="email" placeholder="@email.com" value="<?=$email?>" required>
            </section>
        </div>
        <button type="submit" value="<?=$_GET['id']?>" name="salvar_usuario" id="btnCadastrar">Salvar</button>

        <?php 
        ?>
    </form>
</body>
</html>