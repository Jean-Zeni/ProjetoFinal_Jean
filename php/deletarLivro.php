<?php

session_start();

if(!isset($_SESSION['idUsu'])) {
    header('Location: index.php');
    exit();
}

include_once './config/config.php';
include_once './classes/Livro.php';

$livro = new Livro($db);

if (isset($_GET['id'])) {
    $idLivro = $_GET['id'];
    $livro->deletarLivro($idLivro);
    header('Location: listaLivros.php');
    exit();
}

?>