<?php
    //echo "<pre>";
    //var_dump($_SERVER); //Tras as informações da SuperGlobal $_SERVER que lê as informações do servidor, referentes ao HTTP
    //echo "</pre>";
    //var_dump($_POST['titulo'], $_POST['conteudo']); 
    
    require '../config.php';
    require '../src/Artigo.php';
    require '../src/redireciona.php';

    if($_SERVER['REQUEST_METHOD']=== 'POST'){ //Se no servidor estiver fazendo uma requisição HTTP do método POST
        //$_POST['titulo']; //Leia os dados do input titulo
        //$_POST['conteudo']; //Leia os dados do input conteudo

        $artigo = new Artigo($mysql); //Chama a conexão com o banco
        $artigo->adicionar($_POST['titulo'], $_POST['conteudo']); //Adiciona o titulo e o conteúdo do input no banco de dados.

        redireciona('/blog/admin/index.php'); //Método que redireciona para a página anterior

    }

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <title>Adicionar Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Adicionar Artigo</h1>
        <form action="adicionar-artigo.php" method="POST">
            <p>
                <label for="">Digite o título do artigo</label>
                <input class="campo-form" type="text" name="titulo" id="titulo" />
            </p>
            <p>
                <label for="">Digite o conteúdo do artigo</label>
                <textarea class="campo-form" type="text" name="conteudo" id="conteudo"></textarea>
            </p>
            <p>
                <button class="botao">Criar Artigo</button>
            </p>
        </form>
    </div>
</body>

</html>