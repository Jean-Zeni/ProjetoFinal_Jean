<?php

session_start();

include_once './config/config.php';
include_once './classes/Autor.php';

//VERIFICA SE O USUÁRIO ESTÁ LOGADO
if (!isset($_SESSION['idUsu'])) {
    header('Location: index.php');
    exit();
}

// INSTANCIA UM OBJETO E CAPTURA SUAS INFORMAÇÕES
$autDb = new Autor($db);
$dadosAutor = $autDb->ler();

//PROCESSAMENTO DA EXCLUSÃO DO AUTOR
if (isset($_GET['deletarAutor'])) {
    $deletaAut = $_GET['deletarAutor'];
    $autDb->deletarAutor($deletaAut);
    header('Location: listaAutores.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autores Cadastrados</title>
</head>

<body id="listaAutores">

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Nacionalidade</th>
        </tr>
        <?php while ($row = $dadosAutor->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td><?php echo $row['pk_id_autor'] ?></td>
                <td><?php echo $row['nome_autor'] ?></td>
                <td><?php echo $row['nacionalidade_autor'] ?></td>

                <td>
                    <a href="deletarAutor.php?id=<?php echo $row['pk_id_autor'] ?>">Deletar</a>
                    <a href="editarAutor.php?id=<?php echo $row['pk_id_autor'] ?>">Editar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table><br>

    <button class="btnSair" onclick="location.href='home.php'">Voltar</button>
</body>

</html>