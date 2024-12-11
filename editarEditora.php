<?php

session_start();
if (!isset($_SESSION['idUsu'])) {
    header('Location: index.php');
    exit();
}

include_once './config/config.php';
include_once './classes/Editora.php';

$editora = new Editora($db);

try {
    $editoras = $editora->listarTodos();
} catch (Exception $e) {
    die("Erro: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome_editora'];
    $infos = $_POST['infos_editora'];
    $id = $_POST['pk_id_editora'];

    $editora->atualizar($nome, $infos, $id);

    header('Location: listaEditoras.php');

    exit();
}

if (isset($_GET['id'])) {
    $idEditora = $_GET['id'];
    $row = $editora->lerPorId($idEditora);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Editora</title>
    <link rel="stylesheet" href="style.css">
</head>
<body id="telaEditEditora">
    
    <div id="formEditEditora">

    <h1>Editar Editora</h1>

    <form method="POST">

        <input type="hidden" name="pk_id_editora" value="<?php echo $row['pk_id_editora']; ?>">

        <label for="nome_editora">Nome da Editora:</label><br>
        <input type="text" name="nome_editora" id="nomeEdit" value="<?php echo $row['nome_editora']; ?>"><br><br>

        <label for="informacoes">Informações Adicionais:</label><br>
        <textarea name="infos_editora" id="infosEdit" cols="15" rows="5"><?php echo $row['infos_editora']; ?></textarea><br><br>

        <input type="submit" value="Salvar Alterações">
    </form>

    <button class="btnSair" onclick="location.href='listaEditoras.php'">Voltar</button>
    </div>

</body>
</html>