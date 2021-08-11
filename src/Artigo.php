<?php

    class Artigo
    {
        /* Utilizando orientação a objetos */
        private $mysql;

        public function __construct(mysqli $mysql) //Construtor
        {
            $this->mysql = $mysql;
        }

        public function adicionar(string $titulo, string $conteudo): void //Não retorna nada
        {
            $insereArtigo = $this->mysql->prepare('INSERT INTO artigos (titulo, conteudo) VALUES (?,?);');
            $insereArtigo->bind_param('ss', $titulo, $conteudo);
            $insereArtigo->execute();
        }

        public function remover(string $id): void
        {
            $removerArtigo = $this->mysql->prepare('DELETE FROM artigos WHERE id = ?');
            $removerArtigo->bind_param('s', $id);
            $removerArtigo->execute();
        }

        public function exibirTodos(): array //Método que retorna um array
        {

            $resultado = $this->mysql->query('SELECT id, titulo, conteudo FROM artigos');
            /* fetch_all é como um driver de conexão com o banco que lê instruções SQL e retorna em código PHP (matriz associativa, matriz numérica ou ambos) */
            $artigos = $resultado->fetch_all(MYSQLI_ASSOC); //RETORNA UM ARRAY ASSOCIATIVO

            return $artigos;
        }

        public function encontrarPorId(string $id): array //Método que retorna um array
        {
            $selecionaArtigo = $this->mysql->prepare('SELECT id, titulo, conteudo FROM artigos WHERE id = ?'); //método prepare do mysql substitui o "?" pelo valor vinculado
            $selecionaArtigo->bind_param('s', $id); //Vincula o parâmetro recebido "$id" com o "?" do prepare (O 's' significa string) 
            $selecionaArtigo->execute(); //executa a ação acima no banco
            $artigo = $selecionaArtigo->get_result()->fetch_assoc(); //Pega o resultado e retorna como um array Associativo
            return $artigo;
        }

        public function editar(string $id, string $titulo, string $conteudo): void
        {
            $editaArtigo = $this->mysql->prepare('UPDATE artigos SET titulo = ?, conteudo = ? WHERE id = ?');
            $editaArtigo->bind_param('sss', $titulo, $conteudo, $id);
            $editaArtigo->execute();
        }

    }
    
?>