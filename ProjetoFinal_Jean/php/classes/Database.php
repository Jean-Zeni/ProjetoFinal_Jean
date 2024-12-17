<?php

class Database {
    private $host = "localhost";
    private $db_name = "bd_livraria";
    private $username = "root";
    private $password = "";
    public $conn; 
    // conn vem de connection

    public function getConnection(){
        $this->conn = null;

        try{
            $this->conn = new PDO ("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        } catch(PDOException $exception) {
            echo "Erro de conexão: " . $exception->getMessage();
        }
        return $this->conn;
    }
}