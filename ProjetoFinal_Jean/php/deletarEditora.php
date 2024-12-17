<?php

session_start();

if(!isset($_SESSION['idUsu'])) {
    header('Location: index.php');
    exit();
}
include_once './config/config.php';
include_once './classes/Editora.php';

$editora = new Editora($db);

if (isset($_GET['id'])) {
    $idEdit = $_GET['id'];
    $editora->deletarEditora($idEdit);
    header('Location: listaEditoras.php');
    exit();
}

?>