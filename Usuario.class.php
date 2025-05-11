<?php 

class Usuario{
    private $id;
    private $nome;
    private $senha;
    private $email;
    private $pdo;

    function __construct()
    {
        $dsn    = "mysql:dbname=usuario;host=localhost";
        $dbUser = "root";
        $dbPass = "";

        try{
            $this->pdo = new PDO($dsn, $dbUser, $dbPass);

        } catch(\Throwable $th) {
            echo "Error" . $th;
        }
    }

    function verificarEmail($email){
        $sql = "SELECT email FROM usuarios WHERE email = :e";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":e", $email);
        $stmt->execute();

        $resultado = $stmt->fetch();

        if ($resultado) {
            return false;
        } else {
            return true;
        }
    }

    function numLinhas(){
        $sql = "SELECT * FROM usuarios ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->rowCount();
    }

    function pegarInfos($linha){
        $sql = "SELECT nome, email, id FROM usuarios ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(); 
        $linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $linhaDesejada = $linhas[$linha];
        $nome = $linhaDesejada['nome'];
        $email = $linhaDesejada['email'];
        $id = $linhaDesejada['id'];

        $valores = [$id, $nome, $email];

        return $valores;
    }

    function cadastrarUsuario($nome, $email, $senha) {
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:n, :e, :s)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":n", $nome);
        $stmt->bindValue(":e", $email);
        $stmt->bindValue(":s", $senha);
        $stmt->execute();
    }

    function entrarUsuario($email, $senha){
        $sql = "SELECT nome, senha FROM usuarios WHERE email = :e";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":e", $email);
        $stmt->execute();

        $resultado = $stmt->fetch();

        // Verificando a senha
        if ($resultado && $senha === $resultado['senha']) {
            return $resultado['nome'];
        } else {
            return false;
        }
    }

    function deletarUsuario($id){
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        
    }
}

?>