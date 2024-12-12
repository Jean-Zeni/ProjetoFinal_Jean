<?php

session_start();
if (!isset($_SESSION['idUsu'])) {
    header('Location: index.php');
    exit();
}

include_once './config/config.php';
include_once './classes/Autor.php';

$aut = new Autor($db);

try {
    $autores = $aut->listarTodos();
} catch (Exception $e) {
    die("Erro: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['pk_id_autor'];
    $nome = $_POST['nome_autor'];
    $nacionalidade = $_POST['nacionalidade_autor'];

    $aut->atualizar($id, $nome, $nacionalidade);

    header('Location: listaAutores.php');

    exit();
}

if (isset($_GET['id'])) {
    $idAutor = $_GET['id'];
    $row = $aut->lerPorId($idAutor);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Autor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body id="telaEditAutor">
    
    <div id="formEditAutor">

    <h1>Editar Autor</h1>

    <form method="POST">

        <input type="hidden" name="pk_id_autor" value="<?php echo $row['pk_id_autor']; ?>">

        <label for="nome_autor">Nome do autor:</label><br>
        <input type="text" name="nome_autor" id="nomeAut" value="<?php echo $row['nome_autor']; ?>"><br><br>

        <label for="nacionalidade_autor">Nacionalidade do Autor:</label><br>
        <input type="text" name="nacionalidade_autor" id="nacionalidadeAut" value="<?php echo $row['nacionalidade_autor']; ?>"><br><br>

        <input type="submit" value="Salvar Alterações">
    </form>

    <button class="btnSair" onclick="location.href='listaAutores.php'">Voltar</button>
    </div>

</body>
</html>