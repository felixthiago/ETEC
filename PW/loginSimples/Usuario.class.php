<?php
class Usuario{
    private $id;
    private $nome;
    private $email;
    private $senha;    
    private $pdo;

    public function __construct(){
        $dns    = "mysql:dbname:Usuario;host=localhost"; 
        $dbUser = "root";
        $dbPass = "";
        try {
            $this->pdo = new PDO($dns, $dbUser, $dbPass);
            echo "<h1>Conectado ao banco! Seu Lindao</h1>";
            return true;
        } catch (\Throwable $th) {
            echo "<h1>Erro ao conectar ao banco!</h1>";
            return false;
        }
       
    }

    public function cadastrar($nome, $email, $senha){
        $sql = "INSERT INTO Usuarios SET NOME = :n, email = :e, senha = :s";
        $stmt = $this -> pdo -> prepare($sql);
    }

    public function chkUser($email){
        $sql = "SELECT * FROM Usuarios where email = :e";
        $stmt = $this -> pdo -> prepare($sql);
        $stmt -> bindValue(':e', $email);

        $stmt -> execute();

        if ($stmt -> rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
}