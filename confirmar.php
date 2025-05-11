<?php 
    require_once 'Usuario.class.php';
    $user = new Usuario();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/confirmar.css?v=<?=time()?>">
    <title>Confirmar usuario</title>
</head>
<body>
    <?php 
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $valores = $user->pegarInfosComId($id);
                $nome = $valores['nome'];
                $email = $valores['email'];

            }
    ?>
    <form method="post" action="acoes.php">
        <h1>Confirmar usuario: <?=$nome?></h1>
        <div>
            <section>
                <p>Email: </p>
                <input type="text" name="" placeholder="@email.com" value="<?=$email?>" disabled>
            </section>
            <section>
                <p>Senha: </p>
                <input type="password" name="senha" id="senha" placeholder="pass" required>
                
            </section>
        </div>
        <input type="hidden" name="email" value="<?=$email?>">
        <input type="hidden" name="id" value="<?=$id?>">
        <button type="submit" name="confirmar_usuario" id="btnEntrar" >Entrar</button>
    </form>
</body>
</html>