<?php

session_start();
if (!isset($_SESSION['idUsu'])) {
    header('Location: index.php');
    exit();
}

include_once './config/config.php';
include_once './classes/Livro.php';

$livro = new Livro($db);

try {
    $livros = $livro->lerLivroPorAutor();
} catch (Exception $e) {
    die("Erro: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idLivro = $_POST['pk_id_livro'];
    $nome = $_POST['nome_livro'];
    $dataPubli = $_POST['data_publicacao_livro'];
    $valor = $_POST['valor_livro'];
    $editora = $_POST['editora'];
    $fkIdAut = $_POST['fk_id_autor'];
    $idAutor = $_POST['pk_id_autor'];

    $livro->atualizar($idLivro, $nome, $dataPubli, $valor, $editora, $fkIdAut, $idAutor);

    header('Location: listaLivro.php');

    exit();
}

if (isset($_GET['id'])) {
    $idLivro = $_GET['id'];
    $row = $livro->lerPorId($idLivro);
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
<body id="telaEditLivro">
    
    <div id="formEditLivro">

    <h1>Editar Livro</h1>

    <form method="POST">

        <input type="hidden" name="pk_id_autor" value="<?php echo $row['pk_id_autor']; ?>">
        <input type="hidden" name="pk_id_livro" value="<?php echo $row['pk_id_livro']; ?>">
        <!-- TALVEZ O O INPUT PK_ID_AUTOR TENHA QUE SOFRER ALTERAÇÕES -->

        <label for="idAutor">Autor:</label><br>
        <select name="idAutor" require>
            <option value="">selecione o autor</option>
            <?php foreach($listaautor as $listaautores): ?>
                <option value="<?php echo $listaautores['pk_id_autor']; ?>">
                     <?php echo $listaautores['nome_autor']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br><br>

        <input type="submit" value="Salvar Alterações">
    </form>

    </div>

</body>
</html>