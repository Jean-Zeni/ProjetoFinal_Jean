<?php

class Livro{

    //PROPRIEDADES
    private $conn;
    private $table_name = "tb_autores";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function registrar($nomeAutor, $nacionalidadeAutor)
    {
        $query = "INSERT INTO " . $this->table_name . " (nome_autor, nacionalidade_autor) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$nomeAutor, $nacionalidadeAutor]);
        return $stmt;
    }

    public function criar($nomeAutor, $nacionalidadeAutor){
        return $this->registrar($nomeAutor, $nacionalidadeAutor);
    }

    public function ler(){
        $query = "SELECT * FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function lerPorId($idAutor)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE pk_id_autor = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$idAutor]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function atualizar($idAutor, $nomeAutor, $nacionalidadeAutor)
    {
        $query = "UPDATE " . $this->table_name . " SET nome_autor = ?, nacionalidade_autor = ? WHERE pk_id_autor = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$nomeAutor, $nacionalidadeAutor]);
        return $stmt;
    }


    public function deletarNoti($idAutor)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE pk_id_autor = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$idAutor]);
        return $stmt;
    }
}