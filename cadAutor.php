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
    <link rel="stylesheet" href="style.css">
</head>
<body id="telaCadAutor">
    
<div id="boxCadAutor">

<form method="post">
    <label for="nome">Nome do Autor:</label><br>
    <input type="text" name="nome" id="nomeAut"><br><br>

    <label for="nacionalidade">Nacionalidade do Autor:</label><br>
    <input type="text" name="nacionalidade" id="nacionalidadeAut"><br><br>

    <input type="submit" value="Adicionar"><br><br>
    <input type="reset" value="Limpar">
</form><br>
<button onclick="location.href='home.php'">Voltar</button>

</div>

</body>
</html>