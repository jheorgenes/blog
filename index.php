<?php 

    require 'config.php'; //Gera erro fatal se não existir o arquivo

    include 'src/Artigo.php'; //Gera apenas um Warnning, mas continua rodando os dados
    $artigo = new Artigo($mysql); //Passa a conexão do mysql como parâmetro
    $artigos = $artigo->exibirTodos();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Meu Blog</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div id="container">
        <h1>Meu Blog</h1>
        <?php foreach ($artigos as $artigo): ?>
            <h2>
                <a href="artigo.php?id=<?php echo $artigo['id']; ?>">
                    <?php echo $artigo['titulo']; ?>
                </a>
            </h2>
            <p>
                <?php echo nl2br($artigo['conteudo']); ?><!-- a função nl2br encontra as quebras de linha e adiciona a tag <br> -->
            </p>
        <?php endforeach; ?>    
    </div>
</body>

</html>