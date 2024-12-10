<?php

session_start();
include_once './config/config.php';
include_once './classes/Usuario.php';
include_once './classes/Livro.php';

if (isset($_GET['idUsu'])) {
    $id = $_GET['idUsu'];
    $row = $usuario->lerPorId($id);
}

if (!isset($_SESSION['idUsu'])) {
    header('Location: index.php');
    exit();
}

$usu = new Usuario($db);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="style.css">
</head>

<body id="telaHome">

    <header>HOME</header><br>

    <button id="btn1" onclick="location.href='cadLivro.php'">Cadastrar Livro/Produto</button><br><br>

    <button id="btn2" onclick="location.href='cadAutor.php'">Cadastrar Autor</button><br><br>

    <button id="btn3" onclick="location.href='listaAutores.php'">Autores Cadastrados</button><br><br>

    <button id="btn4" onclick="location.href='listaLivros.php'">Livros</button><br><br>

    <button id="btnSair" onclick="location.href='logout.php'">Fazer logout</button><br><br>

</body>

</html>