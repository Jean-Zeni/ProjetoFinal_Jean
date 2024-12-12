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
    <link rel="stylesheet" href="style.css">
</head>
<body id="telaCadEditora">
    
<div id="boxCadEditora">

<form method="post">
    <label for="nome">Nome da Editora:</label><br>
    <input type="text" name="nome" id="nomeEdit"><br><br>

    <label for="informacoes">Informações Adicionais:</label><br>
    <textarea name="infos" id="infoseEdit" cols="15" rows="5">...</textarea>

    <input type="submit" value="Adicionar"><br><br>
    <input type="reset" value="Limpar">
</form><br>
<button class="btnSair" onclick="location.href='home.php'">Voltar</button>

</div>

</body>
</html>