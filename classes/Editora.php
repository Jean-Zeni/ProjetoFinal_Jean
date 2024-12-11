<?php

class Editora{

    //PROPRIEDADES
    private $conn;
    private $table_name = "tb_editoras";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function registrar($nomeEditora, $infosEditora)
    {
        $query = "INSERT INTO " . $this->table_name . " (nome_editora, infos_editora) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$nomeEditora, $infosEditora]);
        return $stmt;
    }

    public function criar($nomeEditora, $infosEditora){
        return $this->registrar($nomeEditora, $infosEditora);
    }

    public function ler(){
        $query = "SELECT * FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function lerTodos(){
        $query = "SELECT * FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarTodos()
    {
        $sql = "SELECT * FROM" . $this->table_name . "ORDER BY nome_editora ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function lerPorId($idEditora)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE pk_id_editora = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$idEditora]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function atualizar($idEditora, $nomeEditora, $infosEditora)
    {
        $query = "UPDATE " . $this->table_name . " SET nome_editora = ?, infos_editora = ? WHERE pk_id_editora = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([ $nomeEditora, $infosEditora, $idEditora]);
        return $stmt;
    }


    public function deletarEditora($idEditora)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE pk_id_editora = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$idEditora]);
        return $stmt;
    }
}