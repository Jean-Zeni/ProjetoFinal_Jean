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


    public function login($emailUsuario, $senha)
    {
        $query = "SELECT * FROM " . $this->table_usu . " WHERE email_usuario = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$emailUsuario]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return $usuario;
        }
        return false;
    }
    public function criar($emailUsuario, $senhaUsuario, $enderecoUsuario)
    {
        return $this->registrar($emailUsuario, $senhaUsuario, $enderecoUsuario);
    }
    public function ler()
    {
        $query = "SELECT * FROM " . $this->table_usu;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function lerPorId($idUsu)
    {
        $query = "SELECT * FROM " . $this->table_usu . " WHERE pk_id_usuario = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$idUsu]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function atualizar($idUsu, $emailUsuario, $enderecoUsuario)
    {
        $query = "UPDATE " . $this->table_usu . " SET email_usuario = ?, endereco_usuario WHERE pk_id_usuario = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$emailUsuario, $enderecoUsuario, $idUsu]);
        return $stmt;
    }


    public function deletar($idUsu)
    {
        $query = "DELETE FROM " . $this->table_usu . " WHERE pk_id_usuario = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$idUsu]);
        return $stmt;
    }
}