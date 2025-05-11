<?php 

session_start();
require 'Usuario.class.php';
$usuario = new Usuario();
if(isset($_POST['delete_usuario'])){
    $idUser = $_POST['delete_usuario'];
    try {
        $usuario->deletarUsuario($idUser);
        echo "<script>alert('Usuario deletado com sucesso!');
            window.location.href = 'pagina-usuarios.php';
            </script>";
    } catch (\Throwable $e){
        echo "<script>alert('Error ao deletar usuario!');</script>" . $e;
    }
}

if(isset($_POST['salvar_usuario'])){
    $idUser = $_POST['salvar_usuario'];
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    try{
        $usuario->editarUsuario($nome, $email, $idUser);
        echo "<script>alert('Usuario editado com sucesso!');
        window.location.href = 'pagina-usuarios.php';</script>";
    }catch (\Throwable $e){
        echo "<script>alert('Error ao deletar usuario!');</script>" . $e;
    }
    
}

if(isset($_POST['confirmar_usuario'])){
    $senha = trim($_POST['senha']);
    $email = trim($_POST['email']);
    $id = $_POST['id'];
    try{
        $usuario->entrarUsuario($email, $senha);
        echo "<script>alert('Usuario confirmador com sucesso!');
        window.location.href = 'editar.php?id=$id';</script>";
    }catch (\Throwable $e){
        echo "<script>alert('Error ao confirmar usuario!');</script>" . $e;
    }
    
}

?>