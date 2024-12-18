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
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body id="telaHome">

    <header><h1>HOME</h1></header>

    <div id="botoesHome">

    <button class="btnHome" onclick="location.href='cadLivro.php'">Cadastrar Novo Livro/Produto</button><br><br>

    <button class="btnHome" onclick="location.href='listaLivros.php'">Livros</button><br><br>

    <button class="btnHome" onclick="location.href='cadAutor.php'">Cadastrar Novo Autor</button><br><br>

    <button class="btnHome" onclick="location.href='listaAutores.php'">Autores Cadastrados</button><br><br>

    <button class="btnHome" onclick="location.href='cadEditora.php'">Cadastrar Nova Editora</button><br><br>

    <button class="btnHome" onclick="location.href='listaEditoras.php'">Editoras Cadastradas</button><br><br>

    <button id="btnLogout" onclick="location.href='logout.php'">Fazer logout</button><br><br>

    </div>

    <footer>
        <p>Desenvolvido por Jean Pereira Zeni</p>
    </footer>

</body>

</html>