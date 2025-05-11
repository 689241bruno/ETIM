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
?>