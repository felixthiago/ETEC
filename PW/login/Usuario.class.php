<?php
class Usuario {
    private $id;
    private $nome;
    private $email;
    private $senha;    
    private $pdo;
    private $isConnected;

    public function __construct() {
        $dns    = "mysql:dbname=usuarioetimpwiii;host=localhost"; 
        $dbUser = "root";
        $dbPass = "";

        try {
            $this->pdo = new PDO($dns, $dbUser, $dbPass);           
            $this->isConnected = true;
        } catch (\Throwable $th) {           
            $this->isConnected = false;
        }   
    }

    public function connected() {
        return $this->isConnected;
    }
    
    public function cadastrar($nome, $email, $senha) {
        // Primeiro passo: criar a consulta SQL
        $sql = "INSERT INTO usuarios SET nome = :n, email = :e, senha = :s";
        
        // Segundo passo: passar a consulta para o método prepare do PDO
        $stmt = $this->pdo->prepare($sql);

        // Terceiro passo: para cada apelido, passar o valor correspondente
        $stmt->bindValue(":n", $nome);
        $stmt->bindValue(":e", $email);
        $stmt->bindValue(":s", $senha);

        // Quarto passo: executar o comando
        return $stmt->execute();
    }

    public function chkUser($email) {
        // Passo 1: criar a consulta SQL
        $sql = "SELECT * FROM usuarios WHERE email = :e";

        // Passo 2: passar a consulta para o método prepare do PDO
        $stmt = $this->pdo->prepare($sql);

        // Passo 3: para cada apelido, passar o valor correspondente
        $stmt->bindValue(":e", $email);
        
        // Passo 4: executar o comando
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }    
    }

    public function chkPass($email, $senha) {
        // Passo 1: criar a consulta SQL
        $sql = "SELECT * FROM usuarios WHERE email = :e AND senha = :s";

        // Passo 2: passar a consulta para o método prepare do PDO
        $stmt = $this->pdo->prepare($sql);

        // Passo 3: para cada apelido, passar o valor correspondente
        $stmt->bindValue(":e", $email);
        $stmt->bindValue(":s", $senha);
        
        // Passo 4: executar o comando
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch();
        } else {
            return false;
        }     
    }

    public function delUser($id){
        // Passo 1: criar consulta SQL
        $sql = "DELETE FROM usuarios where id = :id";

        // Passo 2: passar a consulta 
        $stmt = $this -> pdo -> prepare($sql);

        // Passo 3: para cada apelido, passar o valor correspondente

        $stmt -> bindValue(":id", $id);

        // Passo 4: executar o comando
        $stmt -> execute();

        $stmt -> rowCount();
        if ($stmt -> rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function alterUser($email, $newName){
        // Passo 1: criar consulta SQL
        $sql = "UPDATE usuarios SET nome = :n where email = :e";
        
        // Passo 2: passar a consulta 

        $stmt = $this -> pdo -> prepare($sql);

        // Passo 3: para cada apelido, passar o valor correspondente

        $stmt -> bindValue(":e", $email);
        $stmt -> bindValue(":n", $newName);

        // Passo 4: executar o comando
        $stmt -> execute();
        $row = $stmt -> rowCount();
        if($row){
            return $row;
        }else{
            return $row;
        }
    }
}