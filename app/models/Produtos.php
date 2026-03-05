<?php

// objeto de conexão com a database
// para inserção de dados.

class Produto {
    private $conn;
    private $table = "produtos";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function listar() { 
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Inserção dos dados
    public function criar($nome, $descricao, $preco, $quantidade) {
        $query = "INSERT INTO " . $this->table . "
                  (nome, descricao, preco, quantidade)
                  VALUES (:nome, :descricao, :preco, :quantidade)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":descricao", $descricao);
        $stmt->bindParam(":preco", $preco);
        $stmt->bindParam(":quantidade", $quantidade);

        return $stmt->execute();
    }
}

// Bruno Fernando
