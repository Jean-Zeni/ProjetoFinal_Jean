<?php

include_once './config/config.php';
include_once './classes/Usuario.php';

$usu = new Usuario($db);

// Processamento do login

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        if ($dadosUsuario = $usu->login($email, $senha)) {
            $_SESSION['usuarioId'] = $dadosUsuario['pk_id_usuario'];
            header('');
            // Não redireciona a lugar nenhum ainda
            exit();
        } else {
            $mensagemErro = "Credenciais Inválidas";
            echo $mensagemErro;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fazer Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body id="bodyTelaLogin">

<!-- FORMULÁRIO DE LOGIN -->

    <div class="boxForm">

        <form method="POST">

            <label for="email">E-mail:</label><br>
            <input type="email" name="email" class="campoTexto"><br>

            <br><label for="senha">Senha:</label><br>
            <input type="password" name="senha" class="campoTexto"><br>

            <br>

            <input id="btnLogin" type="submit" name="login" value="Entrar">

        </form> <br>

        <button id="btnCad">Fazer Cadastro</button>

    </div>

<!-- FIM DO FORMULÁRIO DE LOGIN -->

</body>

</html>