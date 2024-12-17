<?php

session_start();

if(!isset($_SESSION['idUsu'])) {
    header('Location: index.php');
    exit();
}
include_once './config/config.php';
include_once './classes/Autor.php';

$autor = new Autor($db);

if (isset($_GET['id'])) {
    $idAut = $_GET['id'];
    $autor->deletarAutor($idAut);
    header('Location: listaAutores.php');
    exit();
}

?>