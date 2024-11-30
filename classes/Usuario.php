<?php
class Usuario
{
    private $conn;
    private $table_usu = "tb_usuario";


    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function registrar($emailUsuario, $senhaUsuario, $enderecoUsuario)
    {
        $query = "INSERT INTO " . $this->table_usu . " (email_usuario, senha_usuario, endereco_usuario) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $hashed_password = password_hash($senhaUsuario, PASSWORD_BCRYPT);
        $stmt->execute([$emailUsuario, $hashed_password, $enderecoUsuario]);
        return $stmt;
    }

    public function listarTodos()
    {
        $sql = "SELECT * FROM tb_usuario";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function login($email, $senha)
    {
        $query = "SELECT * FROM " . $this->table_usu . " WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return $usuario;
        }
        return false;
    }
    public function criar($nome, $sexo, $fone, $email, $senha)
    {
        return $this->registrar($nome, $sexo, $fone, $email, $senha);
    }
    public function ler()
    {
        $query = "SELECT * FROM " . $this->table_usu;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function lerPorId($id)
    {
        $query = "SELECT * FROM " . $this->table_usu . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function atualizar($id, $nome, $sexo, $fone, $email)
    {
        $query = "UPDATE " . $this->table_usu . " SET nome = ?, sexo = ?, fone = ?, email = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$nome, $sexo, $fone, $email, $id]);
        return $stmt;
    }


    public function deletar($id)
    {
        $query = "DELETE FROM " . $this->table_usu . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt;
    }
}