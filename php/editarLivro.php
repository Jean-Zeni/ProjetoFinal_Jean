<?php

session_start();
if (!isset($_SESSION['idUsu'])) {
    header('Location: index.php');
    exit();
}

include_once './config/config.php';
include_once './classes/Livro.php';
include_once './classes/Autor.php';
include_once './classes/Editora.php';

$livro = new Livro($db);

$autor = new Autor($db);
$listaAutor = $autor->lerTodos();

$editora = new Editora($db);
$listaEditora = $editora->lerTodos();

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
    $fkIdEditora = $_POST['editora'];
    $imgLivro = $_FILES['imgLivro'];
    $unidadesLivro = $_POST['quantLivro'];
    $fkIdAut = $_POST['idAutor'];
    // $idAutor = $_POST['idAutor'];

    //TRATAMENTO DE IMAGEM

    //TAMANHO
    $nomeImg = "";
    if ($imgLivro['error'] === UPLOAD_ERR_OK) {
        $extensao = strtolower(pathinfo($imgLivro['name'], PATHINFO_EXTENSION));
        $tamanhoMax = 10 * 1024 * 1024; // 10 MB

        if ($imgLivro['size'] > $tamanhoMax) {
            die("O arquivo não pode ser maior que 10MB.");
        }

        // Formatos permitidos
        $tiposPermitidos = ['jpg', 'jpeg', 'png'];
        if (!in_array($extensao, $tiposPermitidos)) {
            die("Apenas arquivos em formato PNG, JPG ou JPEG são aceitos.");
        }

        //GERA UM NOME ÚNICO PARA CADA IMAGEM
        $nomeImg = uniqid() . "." . $extensao;
        $destino = "../uploads/" . $nomeImg;

        //MOVE O ARQUIVO PARA A PASTA UPLOADS
        if (!move_uploaded_file($imgLivro['tmp_name'], $destino)) {
            die("Erro ao salvar imagem.");
        }
    } else if ($imgLivro['error'] !== UPLOAD_ERR_NO_FILE) {
        die("Erro ao fazer upload da imagem.");
    }
    //FIM DO TRATAMENTO DE IMAGEM

    $livro->atualizar($nome, $dataPubli, $valor, $destino, $unidadesLivro, $fkIdAut, $fkIdEditora, $idLivro);

    header('Location: listaLivros.php');

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

        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="pk_id_livro" value="<?php echo $row['pk_id_livro']; ?>">

            <!-- ESCOLHA DO AUTOR -->
            <label for="idAutor">Autor:</label><br>
            <select name="idAutor" require>
                <?php foreach ($listaAutor as $listaAutores): ?>
                    <option value="<?php echo $listaAutores['pk_id_autor']; ?>">
                        <?php echo $listaAutores['nome_autor']?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br><br>

            <!-- NOME -->
            <label for="nome_livro">Nome do Livro:</label><br>
            <input type="text" name="nome_livro" id="txtNomeLivro" value="<?php echo $row['nome_livro']; ?> "><br><br>

            <!-- DATA DE PUBLICAÇÃO -->
            <label for="data_publicacao_livro">Data de Publicação do Livro:</label><br>
            <input type="date" name="data_publicacao_livro" id="txtDataPubliLivro" value="<?php echo $row['data_publicacao_livro'] ?>"><br><br>

            <!-- VALOR -->
            <label for="valor_livro">Valor do Livro:</label><br>
            <input type="number" name="valor_livro" class="inputEditNumber" step="0.01" value="<?php echo $row['valor_livro'] ?>"><br><br>

            <!-- EDITORA -->
            <label for="editora">Editora:</label><br>
            <select name="editora" require>
                <?php foreach ($listaEditora as $listaEditoras): ?>
                    <option value="<?php echo $listaEditoras['pk_id_editora']; ?>">
                        <?php echo $listaEditoras['nome_editora']?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br><br>

            <!-- IMAGEM -->
            <input type="file" id="selectImg" name="imgLivro" accept=".jpg, .png, .jpeg" value="<?php echo $row['img_livro']?>"><br><br>

            <!-- QUANTIDADE DE LIVROS -->
            <label for="quantLivro">Quantidade de Livros Disponíveis:</label><br>
            <input name="quantLivro" type="number" class="inputEditNumber" step="1" value="<?php echo $row['unidades'] ?>"><br><br>

            <input type="submit" value="Salvar Alterações"><br>
        </form><br>

        <button class="btnSair" onclick="location.href='listaLivros.php'">Voltar</button>

    </div>

</body>

</html>