<?php

class Livro
{

    //PROPRIEDADES
    private $conn;
    private $table_name = "tb_livros";

    
    // private $table_autor = "tb_autores";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function registrar($nomeLivro, $dataPubliLivro, $valorLivro, $editora, $imgLivro, $fkIdAutor)
    {
        $query = "INSERT INTO " . $this->table_name . " (nome_livro, data_publicacao_livro, valor_livro, editora, img_livro, fk_id_autor) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$nomeLivro, $dataPubliLivro, $valorLivro, $editora, $imgLivro, $fkIdAutor]);
        return $stmt;
    }

    public function criar($nomeLivro, $dataPubliLivro, $valorLivro, $editora, $imgLivro, $fkIdAutor)
    {
        return $this->registrar($nomeLivro, $dataPubliLivro, $valorLivro, $editora, $imgLivro, $fkIdAutor);
    }
    public function lerLivroPorAutor()
    {
        $query = "SELECT  l.pk_id_livro, l.nome_livro, l.data_publicacao_livro, l.valor_livro,
                          l.editora,  l.img_livro,  a.nome_autor
                          FROM tb_livros AS l
                          INNER JOIN tb_autores AS a
                          ON l.fk_id_autor = a.pk_id_autor;";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }


    public function ler()
    {
        $query = "SELECT * FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function lerPorId($pkIdLivro)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE pk_id_livro = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$pkIdLivro]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar($pkIdLivro, $nomeLivro, $dataPubliLivro, $valorLivro, $editora, $imgLivro, $fkIdAutor)
    {
        $query = "UPDATE " . $this->table_name . " SET nome_livro = ?, data_publicacao_livro = ?, valor_livro = ?, editora = ?, img_livro = ?, fk_id_autor = ? WHERE pk_id_livro = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$nomeLivro, $dataPubliLivro, $valorLivro, $editora, $imgLivro, $fkIdAutor, $pkIdLivro]);
        return $stmt;
    }


    public function deletarLivro($idLivro)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE pk_id_livro = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$idLivro]);
        return $stmt;
    }
}
