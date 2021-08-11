<?php

    require '../config.php';
    require '../src/Artigo.php';
    require '../src/redireciona.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){ //Se o método da requisição for POST
        $artigo = new Artigo($mysql); //Conecta no banco de dados
        $artigo->editar($_POST['id'], $_POST['titulo'], $_POST['conteudo']); //Edita os dados do post, passando o post selecionado.

        redireciona('/blog/admin/index.php'); //Redireciona para a página administrativa
    }

    $artigo = new Artigo($mysql); //Conecta no banco de dados
    $art = $artigo->encontrarPorId($_GET['id']); //busca o artigo pelo id da requisição.

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <title>Editar Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Editar Artigo</h1>
        <form action="editar-artigo.php" method="POST">
            <p>
                <label for="titulo">Digite o novo título do artigo</label>
                <input class="campo-form" type="text" name="titulo" id="titulo" value="<?php echo $art['titulo']; ?>" /><!-- INSERE OS DADOS DO TITULO -->
            </p>
            <p>
                <label for="conteudo">Digite o novo conteúdo do artigo</label>
                <textarea class="campo-form" type="text" name="conteudo" id="titulo"><?php echo $art['conteudo']; ?></textarea><!-- INSERE OS DADOS DO CONTEÚDO -->
            </p>
            <p>
                <input type="hidden" name="id" value="<?php echo $art['id']; ?>" />
            </p>
            <p>
                <button class="botao">Editar Artigo</button>
            </p>
        </form>
    </div>
</body>

</html>