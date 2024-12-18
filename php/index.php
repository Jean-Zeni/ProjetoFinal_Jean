<?php

include_once './config/config.php';
include_once './classes/Usuario.php';
session_start();


$usu = new Usuario($db);

//$dadosUsuLog = $usu->ler();

// Processamento do login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];


        if ($dadosUsuario = $usu->login($email, $senha)) {
            echo "estou aqui!!";
            $_SESSION['idUsu'] = $dadosUsuario['pk_id_usuario']; //ERRO QUE NAO SEI AJUSTAR
            header('Location: home.php');
            exit();
        } else {
            $mensagemErro = "Credenciais Inválidas";
            // echo $mensagemErro;
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
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body id="bodyTelaLogin">

    <!-- FORMULÁRIO DE LOGIN -->

    <div id="boxFormLogin">

        <h1>Login</h1>

        <form method="POST">

            <label for="email"><strong>E-mail:</strong></label><br>
            <input type="email" name="email" class="campoTexto"><br>

            <br><label for="senha"><strong>Senha:</strong></label><br>
            <input type="password" name="senha" class="campoTexto"><br>

            <br>

            <input id="btnLogin" type="submit" name="login" value="Entrar">

            <?php if (!empty($mensagemErro)): ?>
                <p class="mensagem-erro"><?php echo $mensagemErro; ?></p>
            <?php endif; ?>

        </form>
        <!-- <h3>//echo $mensagemErro</h3> -->
        <br>

        <a href="cadastroUsu.php">Não tem login? Clique aqui!</a>

    </div>

    <!-- FIM DO FORMULÁRIO DE LOGIN -->

</body>

</html>