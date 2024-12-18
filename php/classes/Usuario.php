<?php
class Usuario
{
    private $conn;
    private $table_usu = "tb_usuario";


    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function registrar($nomeUsuario, $emailUsuario, $senhaUsuario)
    {
        $query = "INSERT INTO " . $this->table_usu . " (nome_usuario, email_usuario, senha_usuario) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $hashed_password = password_hash($senhaUsuario, PASSWORD_BCRYPT);
        $stmt->execute([$nomeUsuario, $emailUsuario, $hashed_password]);
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

        if ($usuario && password_verify($senha, $usuario['senha_usuario'])) {
          
            return $usuario;
        }
        return false;
    }


    public function criar($nomeUsuario, $emailUsuario, $senhaUsuario)
    {
        return $this->registrar($nomeUsuario, $emailUsuario, $senhaUsuario);
    }
    public function ler()
    {
        $query = "SELECT * FROM " . $this->table_usu;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function lerPorId($idUsu)
    {
        $query = "SELECT * FROM " . $this->table_usu . " WHERE pk_id_usuario = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$idUsu]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function atualizar($idUsu, $nomeUsuario, $emailUsuario)
    {
        $query = "UPDATE " . $this->table_usu . " SET nome_usuario = ?, email_usuario = ? WHERE pk_id_usuario = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$nomeUsuario, $emailUsuario, $idUsu]);
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