<?php

session_start();

include_once './config/config.php';
include_once './classes/Editora.php';

//VERIFICA SE O USUÁRIO ESTÁ LOGADO
if (!isset($_SESSION['idUsu'])) {
    header('Location: index.php');
    exit();
}

// INSTANCIA UM OBJETO E CAPTURA SUAS INFORMAÇÕES
$editoraDb = new Editora($db);
$dadosEditora = $editoraDb->ler();

//PROCESSAMENTO DA EXCLUSÃO DA EDITORA
if (isset($_GET['deletarEditora'])) {
    $deletaEditora = $_GET['deletarEditora'];
    $editoraDb->deletarEditora($deletaEditora);
    header('Location: listaEditoras.php');
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
            <th>Informações adicionais</th>
        </tr>
        <?php while ($row = $dadosEditora->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td><?php echo $row['pk_id_editora'] ?></td>
                <td><?php echo $row['nome_editora'] ?></td>
                <td><?php echo $row['infos_editora'] ?></td>

                <td>
                    <a href="deletarEditora.php?id=<?php echo $row['pk_id_editora'] ?>">Deletar</a>
                    <a href="editarEditora.php?id=<?php echo $row['pk_id_editora'] ?>">Editar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <button class="btnSair" onclick="location.href='home.php'">Voltar</button>
</body>

</html>