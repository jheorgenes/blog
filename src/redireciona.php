<?php 
    //REDIRECIONANDO PARA A PÁGINA ANTERIOR
    function redireciona(string $url): void
    {
        header("Location: $url"); //Adiciona um cabeçalho HTTP, ou seja, aqui será reexibido a página no método GET
        die(); //Depois, para a execução
    }

?>