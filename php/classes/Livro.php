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

    public function registrar($nomeLivro, $dataPubliLivro, $valorLivro, $imgLivro, $unidadesLivro, $fkIdAutor, $fkIdEditora)
    {
        $query = "INSERT INTO " . $this->table_name . " (nome_livro, data_publicacao_livro, valor_livro, img_livro, unidades, fk_id_autor, fk_id_editora) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$nomeLivro, $dataPubliLivro, $valorLivro, $imgLivro, $unidadesLivro, $fkIdAutor, $fkIdEditora]);
        return $stmt;
    }

    public function criar($nomeLivro, $dataPubliLivro, $valorLivro, $imgLivro, $unidadesLivro, $fkIdAutor, $fkIdEditora)
    {
        return $this->registrar($nomeLivro, $dataPubliLivro, $valorLivro, $imgLivro, $unidadesLivro, $fkIdAutor, $fkIdEditora);
    }
    public function lerLivroPorAutor()
    {
        $query = "SELECT  l.pk_id_livro, l.nome_livro, l.data_publicacao_livro, l.valor_livro,
                          l.fk_id_editora,  l.img_livro, l.unidades,  a.nome_autor, e.nome_editora
                          FROM tb_livros AS l
                          INNER JOIN tb_autores AS a
                          ON l.fk_id_autor = a.pk_id_autor
                          INNER JOIN tb_editoras as e
                          ON l.fk_id_editora = e.pk_id_editora";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // public function lerLivroPorEditora()
    // {
    //     $query = "SELECT  l.pk_id_livro, l.nome_livro, l.data_publicacao_livro, l.valor_livro,
    //                       l.fk_id_autor,  l.img_livro,  e.nome_editora
    //                       FROM tb_livros AS l
    //                       INNER JOIN tb_editoras AS e
    //                       ON l.fk_id_editora = e.pk_id_editora;";
    //     $stmt = $this->conn->prepare($query);
    //     $stmt->execute();
    //     return $stmt;
    // }


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

    public function atualizar($nomeLivro, $dataPubliLivro, $valorLivro, $imgLivro, $unidadesLivro, $fkIdAutor, $fkIdEditora, $pkIdLivro)
    {
       
        $query = "UPDATE " . $this->table_name . " SET nome_livro = ?, data_publicacao_livro = ?, valor_livro = ?, img_livro = ?, unidades = ?, fk_id_autor = ?, fk_id_editora = ? WHERE pk_id_livro = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$nomeLivro, $dataPubliLivro, $valorLivro, $imgLivro, $unidadesLivro, $fkIdAutor, $fkIdEditora, $pkIdLivro]);
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
