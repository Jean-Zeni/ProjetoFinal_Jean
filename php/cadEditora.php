<?php

include_once './config/config.php';
include_once './classes/Editora.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $editora = new Editora($db);
    $nomeEditora = $_POST['nome'];
    $informacoes = $_POST['infos'];
    $editora->criar($nomeEditora, $informacoes);
    header('Location: cadEditora.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Editora</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body id="telaCadEditora">
    
<div id="boxCadEditora">

<h2>Cadastrar Nova Editora</h2>

<form method="post">
    <label for="nome">Nome da Editora:</label><br>
    <input type="text" name="nome" class="inputNormal"><br><br>

    <label for="informacoes">Informações Adicionais:</label><br>
    <textarea name="infos" id="infosEdit" cols="15" rows="5">...</textarea><br><br>

    <input type="submit" value="Adicionar" class="btnNormal"><br><br>
    <input type="reset" value="Limpar" class="btnNormal">
</form><br>
<button class="btnNormal" onclick="location.href='home.php'">Voltar</button>

</div>

</body>
</html>