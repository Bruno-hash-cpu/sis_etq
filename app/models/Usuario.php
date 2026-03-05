<?php

// objeto para conexão com a tabela usuarios
class Usuario {
    private $conn;
    private $table = "usuarios";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Inserção de dados
    public function registrar($nome, $email, $senha) {
        $hash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO {$this->table}
                (nome, email, senha)
                VALUES (:nome, :email, :senha)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":senha", $hash);

        return $stmt->execute();
    }

    public function login($email, $senha) {
        $sql = "SELECT * FROM {$this->table}
                WHERE email = :email LIMIT 1";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

	// Verificação de login
        if ($user && password_verify($senha, $user['senha'])) {
            return $user;
        }

        return false;
    }
}

// Bruno Fernando
