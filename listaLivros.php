<?php

session_start();

include_once './config/config.php';
include_once './classes/Livro.php';
include_once './classes/Autor.php';

$autDb = new Autor($db);
$nomeAutor = $autDb->lerTodos();

//VERIFICA SE O USUÁRIO ESTÁ LOGADO
if (!isset($_SESSION['idUsu'])) {
    header('Location: index.php');
    exit();
}

// INSTANCIA UM OBJETO E CAPTURA SUAS INFORMAÇÕES
$livroDb = new Livro($db);
$dadosLivro = $livroDb->lerLivroPorAutor();


//PROCESSAMENTO DA EXCLUSÃO DO LIVRO
if (isset($_GET['deletarLivro'])) {
    $deletaLivro = $_GET['deletarLivro'];
    $livroDb->deletarLivro($deletaLivro);
    header('Location: listaLivros.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros</title>
    <link rel="stylesheet" href="style.css">
</head>
<body id="telaListaLivros">
    
<header><h1>Livros Disponíveis</h1></header>

<main>

<div id="listaDeLivros">

<!-- ======================================================================================= -->

<?php while ($row = $dadosLivro->fetch(PDO::FETCH_ASSOC)) : ?>

    <?php

        //FORMATAÇÃO DA DATA DE PUBLICAÇÃO
        $dataOriginal = $row['data_publicacao_livro'];
        
        $dataFormatada = DateTime::createFromFormat('Y-m-d', $dataOriginal);

    ?>

<!-- AQUI FICARÃO OS CARDS DE NOTÍCIAS -->
    <div id="cardLivro">
        <!-- IMG LIVRO -->
        <img id="imgLivro" src="<?php echo $row['img_livro']?>" alt="Imagem do livro"> 

        <!-- INFOS LIVRO -->
        <p id="conteudoCard"><?php echo $row['nome_livro'] . "<br><br>";

        echo $row['editora'] . "<br><br>";

        echo "Autor: <strong>" . $row['nome_autor'] . "</strong><br><br>Data de Publicação: " . $dataFormatada->format('d/m/Y'); ?></p>

        <a href="deletarLivro.php?id=<?php echo $row['pk_id_livro']; ?>" >Deletar</a>
        <a href="editarLivro.php?id=<?php echo $row['pk_id_livro']; ?>" >Editar</a><br><br>

    </div>

    <?php endwhile; ?>

</div>

<button id="btnSair" onclick="location.href='home.php'">Voltar</button>

</main>

</body>
</html>
