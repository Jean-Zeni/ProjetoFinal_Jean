<?php

include_once './config/config.php';
include_once './classes/Autor.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $novoAutor = new Autor($db);
    $nome = $_POST['nome'];
    $nacionalidade = $_POST['nacionalidade'];
    $novoAutor->criar($nome, $nacionalidade);
    header('Location: cadAutor.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Autor</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body id="telaCadAutor">
    
<div id="boxCadAutor">

<h2>Cadastrar Novo Autor</h2>

<form method="post">
    <label for="nome">Nome do Autor:</label><br>
    <input type="text" name="nome" class="inputNormal" ><br><br>

    <label for="nacionalidade">Nacionalidade do Autor:</label><br>
    <input type="text" name="nacionalidade" class="inputNormal"><br><br>

    <input type="submit" class="btnNormal" value="Adicionar"><br><br>
    <input type="reset" class="btnNormal" value="Limpar">
</form><br>
<button class="btnNormal" onclick="location.href='home.php'">Voltar</button>

</div>

</body>
</html>