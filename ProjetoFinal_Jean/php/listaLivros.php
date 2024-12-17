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
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body id="telaListaLivros">
    
<header id="cabecalhoListaLivros">
<button class="btnSair" onclick="location.href='home.php'"><img src="../assets/arrow_left_icon_48px.png" alt="voltar"></button>
    <h1>Livros Disponíveis</h1>
</header>

<main id="conteudoTelaLivros">

<div id="livros">

<ul id="listaLivros">
<!-- ======================================================================================= -->

<?php while ($row = $dadosLivro->fetch(PDO::FETCH_ASSOC)) : ?>

    <?php

        //FORMATAÇÃO DA DATA DE PUBLICAÇÃO
        $dataOriginal = $row['data_publicacao_livro'];
        
        $dataFormatada = DateTime::createFromFormat('Y-m-d', $dataOriginal);

    ?>

<!-- AQUI FICARÃO OS CARDS DE LIVROS -->
    <li id="itensListaLivros">
        <div id="cardLivro">

        <!-- IMG LIVRO -->
        <img id="imgLivro" src="<?php echo $row['img_livro']?>" alt="Imagem do livro"> 

        <!-- INFOS LIVRO -->
        <p id="conteudoCard"><?php echo $row['nome_livro'] . "<br><br>";

        echo "Editora: " . $row['nome_editora'] . "<br><br>";

        echo "Autor: <strong>" . $row['nome_autor'] . "</strong><br><br>
        Valor do produto: " . $row['valor_livro'] . 
        "<br><br>Data de Publicação: " . $dataFormatada->format('d/m/Y') . "<br><br>Quantidade disponível: <strong>" . $row['unidades'] . "</strong>"?></p>

        <button onclick="location.href='deletarLivro.php?id=<?php echo $row['pk_id_livro'];?>'" class="botoesCardLivro">Deletar</button><br>
        <button onclick="location.href='editarLivro.php?id=<?php echo $row['pk_id_livro'];?>'" class="botoesCardLivro">Editar</button>

    </div>
    </li>

    <?php endwhile; ?>
    </ul>
</div>

</main>

<footer id="rodapeListaLivros"><h3>Desenvolvido por Jean Pereira Zeni</h3></footer>

</body>
</html>
