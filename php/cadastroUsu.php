<?php

include_once './config/config.php';
include_once './classes/Usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // INSTANCIAÇÃO DO OBJ
    $novoUsu = new Usuario($db);

    $nomeUsu = $_POST['nomeUsuario'];
    $emailUsu = $_POST['emailUsuario'];
    $senhaUsu = $_POST['senhaUsuario'];

    // VERIFICAÇÃO DE SENHA NO BACKEND

    if (preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/', $senhaUsu)) {
        echo "Senha válida!";
    } else {
        echo "A senha não atende aos critérios.";
    }

    // ===================================================================================================================

    $novoUsu->criar($nomeUsu, $emailUsu, $senhaUsu);
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fazer Cadastro:</title>
    <link rel="stylesheet" href="../styles/style.css">
    <script src="../js/script.js" defer></script>
</head>

<body id="telaCadNovoUsu">

    <div id="addUsu">

        <h1>Cadastre-se</h1>

        <form id="formCadNewUsu" method="POST" onsubmit="return validarSenha()"> <!--O ERRO ESTÁ RELACIONAFO AO ONSUBMIT-->
            <label for="nomeUsu">Nome:</label><br>
            <input type="text" name="nomeUsuario" class="campoTexto">
            <br><br>

            <label for="emailUsuario">E-mail:</label><br>
            <input type="email" name="emailUsuario" class="campoTexto">
            <br><br>

            <label for="senhaUsuario">Senha:</label><br>
            <input type="password" name="senhaUsuario" class="campoTexto" id="fieldSenha" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$"><br>
            <small><strong>A senha deve conter pelo menos 8 caracteres e ser composta de<br> letras, números e caracteres especiais.</strong></small>
            <br><br>

            <input type="submit" id="btnCadNewUsu" value="Cadastrar">

            <br><br>

            <button class="btnSair" onclick="location.href='index.php'">Sair</button>
        </form>

    </div>

</body>

</html>