<?php

include_once './config/config.php';
include_once './classes/Livro.php';
include_once './classes/Usuario.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $novoLivro = new Livro($db);
    $nomeLivro = $_POST['nomeLivro'];
    $dataPubliLivro = $_POST['dataPubli'];
    $valorLivro = $_POST['valor'];
    $editora = $_POST['editora'];
    $imgLivro = $_FILES['img'];

    //Tratamento no upload da imagem

    //TAMANHO
    $nomeImg = "";
    if ($imgLivro['error'] === UPLOAD_ERR_OK) {
        $extensao = strtolower(pathinfo($imgLivro['name'], PATHINFO_EXTENSION));
        $tamanhoMax = 10 * 1024 * 1024; // 10 MB

        if ($imgLivro['size'] > $tamanhoMax) {
            die("O arquivo não pode ser maior que 10MB.");
        }

        // Formatos permitidos
        $tiposPermitidos = ['jpg', 'jpeg', 'png'];
        if (!in_array($extensao, $tiposPermitidos)) {
            die("Apenas arquivos em formato PNG, JPG ou JPEG são aceitos.");
        }

        //GERA UM NOME ÚNICO PARA CADA IMAGEM
        $nomeImg = uniqid() . "." . $extensao;
        $destino = "uploads/" . $nomeImg;

        //MOVE O ARQUIVO PARA A PASTA UPLOADS
        if(!move_uploaded_file($imgLivro['tmp_name'], $destino)) {
            die("Erro ao salvar imagem.");
        } else if ($imgLivro['error'] !== UPLOAD_ERR_NO_FILE) {
            die("")
        }
    }





    $novoUsuario->criar($nomeUsu, $sexoUsu, $foneUsu, $emailUsu, $senhaUsu);
    header('Location: login.php');
    exit();
}
