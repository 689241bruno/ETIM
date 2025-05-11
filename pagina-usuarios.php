<?php 
    require 'Usuario.class.php';
    $user = new Usuario();
    $infos = $user->numLinhas();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Lista dos usuarios</title>
</head>
<body style="height: 100vh; background-color: rgb(36, 68, 177);padding: 50px;">

    <div class="cold=md-12" style="box-shadow: 0px 0px 15px rgba(20, 20, 20, 0.57);">
        <div class="card">
            <div class="card-header">
                <h4>Lista de usuários
                    <a href="cadastrar.php" class="btn btn-primary float-end">Adicionar usuário</a>
                </h4>
            </div>
            <div class="car-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                
                        <th scope="col" class="">ID</th>
                        <th scope="col" class="">Nome</th>
                        <th scope="col" class="">Email</th>
                        <th scope="col" class=""> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if($infos > 0){
                                for($cont = 0; $cont < $infos;$cont++){
                                    $linha = $cont;
                                    $valores = $user->pegarInfos($linha);
                                    $id = $valores[0];
                                    $nome =  $valores[1];
                                    $email = $valores[2];
                                
                        ?>
                        <tr>
                            <td><?=$id?></td>
                            <td><?=$nome?></td>
                            <td><?=$email?></td>
                            <td class="text-center">
                                <button class="btn btn-warning">editar</button>
                                <form action="acoes.php" method="POST" class="d-inline">
                                    <button  onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" name="delete_usuario" value="<?=$id?>" class="btn btn-danger btn-sm"> <span class="bi-trash3-fill">&nbsp;</button>
                                </form>
                            </td>
                        </tr>
                        <?php 
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>