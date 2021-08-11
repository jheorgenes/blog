<?php 

    require '../config.php'; //Gera erro fatal se não existir o arquivo
    include '../src/Artigo.php'; //Gera apenas um Warnning, mas continua rodando os dados

    $artigo = new Artigo($mysql); //Passa a conexão do mysql como parâmetro
    $artigos = $artigo->exibirTodos(); //Busca todos os artigos

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Página administrativa</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>

<body>
    <div id="container">
        <h1>Página Administrativa</h1>
        <div>
            <?php foreach ($artigos as $art): ?>
                <div id="artigo-admin">
                    <p><?php echo $art['titulo']; ?></p>
                    <nav>
                        <a class="botao" href="editar-artigo.php?id=<?php echo $art['id']; ?>">Editar</a>
                        <a class="botao" href="excluir-artigo.php?id=<?php echo $art['id']; ?>">Excluir</a>
                    </nav>
                </div>
            <?php endforeach; ?>
        </div>
        <a class="botao botao-block" href="adicionar-artigo.php">Adicionar Artigo</a>
    </div>
</body>

</html>