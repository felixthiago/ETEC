<?php

class Produto {
    private $pdo;

    public function __construct() {
        // Altere com suas credenciais
        $type = "mysql";
        $dbName = "modularProduto";
        $host = "localhost";
        $user = "root";
        $senha = ""; // Sua senha do MySQL aqui

        try {
            $this->pdo = new PDO($type . ":dbname=" . $dbName . ";host=" . $host, $user, $senha);
        } catch (Exception $e) {
            echo "Erro ao tentar abrir o banco de dados! " . $e->getMessage();
            exit;
        }
    }

    public function enviarProduto($nome, $descricao, $fotos = array()) {
        // Inserir produto na tabela produtos [cite: 4]
        $sql = "INSERT INTO produtos SET nome_produto = :n, descricao = :d";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":n", $nome);
        $sql->bindValue(":d", $descricao);
        $isOk = $sql->execute();

        if ($isOk == true) {
            $id_produto = $this->pdo->lastInsertId();

            // Inserir imagem na tabela imagens [cite: 7]
            if (count($fotos) > 0) {
                for ($i = 0; $i < count($fotos); $i++) {
                    $nome_foto = $fotos[$i];
                    $sql = "INSERT INTO imagens (nome_imagem, fk_id_produto) VALUES (:n, :fk)";
                    $sql = $this->pdo->prepare($sql);
                    $sql->bindValue(":n", $nome_foto);
                    $sql->bindValue(":fk", $id_produto);
                    $sql->execute();
                }
            }
        }
        return $isOk;
    }

    public function buscarProdutos() {
        // Busca todos os produtos e a primeira imagem como capa [cite: 8]
        $cmd = "SELECT *, (SELECT nome_imagem from imagens WHERE fk_id_produto = produtos.id_produto LIMIT 1) as foto_capa FROM produtos";
        $cmd = $this->pdo->prepare($cmd);
        $cmd->execute();

        if ($cmd->rowCount() > 0) {
            $dados = $cmd->fetchAll();
        } else {
            $dados = array();
        }
        return $dados;
    }

    public function buscarProduto($id) {
        // Método para buscar um produto pelo seu id [cite: 10]
        $cmd = "SELECT * FROM produtos WHERE id_produto = :i";
        $cmd = $this->pdo->prepare($cmd);
        $cmd->bindValue(":i", $id);
        $cmd->execute();

        if ($cmd->rowCount() > 0) {
            $dados = $cmd->fetch();
        } else {
            $dados = array();
        }
        return $dados;
    }

    public function buscarImagem($id) {
        // Método para buscar as imagens pelo id do produto [cite: 11]
        $sql = "SELECT * FROM imagens WHERE fk_id_produto = :i";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":i", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $dados = $sql->fetchAll();
        } else {
            $dados = array();
        }
        return $dados;
    }
}