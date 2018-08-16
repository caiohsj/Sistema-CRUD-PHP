<?php
require_once 'Conexao.php';

class Lembrete {

	private function getConexao(){
        //INSTANCIANDO OBJETO DA CLASSE CONEXÃO
        $conexao = new Conexao();
        /*
            MÉTODO DA CLASSE CONEXÃO, QUE ATRIBUI A UMA VARIÁVEL DA CLASSE CONEXÃO,
            OS DADOS NECESSÁRIOS PARA A CONEXÃO COM O BANCO DE DADOS
        */
        $conexao->conectar();
        //ATRIBUINDO À VARIÁVEL $pdo OS DADOS DA CONEXÃO
        $pdo = $conexao->getPdo();
        //RETORNANDO ESSES DADOS DA CONEXÃO
        return $pdo;
    }

    public function listarTodosOsLembretes($usuarioid){
    	$pdo = $this->getConexao();

    	$listar = $pdo->prepare("SELECT * FROM lembretes WHERE usuario_id=:usuarioid");
    	$listar->bindValue(":usuarioid",$usuarioid);
    	$listar->execute();

    	$lembretes = $listar->fetchAll(PDO::FETCH_ASSOC);
    	return $lembretes;
    }

    public function listarTodosOsLembretesPorId($id){
    	$pdo = $this->getConexao();

    	$listar = $pdo->prepare("SELECT * FROM lembretes WHERE id=:id");
    	$listar->bindValue(":id",$id);
    	$listar->execute();

    	$lembretes = $listar->fetch(PDO::FETCH_ASSOC);
    	return $lembretes;
    }

    public function deletarLembrete($id){
    	$pdo = $this->getConexao();

    	$deletar = $pdo->prepare("DELETE FROM lembretes WHERE id=:id");
    	$deletar->bindValue(":id",$id);
    	$deletar->execute();
    }

    public function adicionarLembrete($descricao,$usuarioid){
    	$pdo = $this->getConexao();

    	$inserir = $pdo->prepare("INSERT INTO lembretes(descricao,usuario_id) VALUES(:descricao,:usuarioid)");
    	$inserir->bindValue(":descricao",$descricao);
    	$inserir->bindValue(":usuarioid",$usuarioid);
    	$inserir->execute();
    }

    public function atualizarLembrete($id,$descricao){
    	$pdo = $this->getConexao();

    	$inserir = $pdo->prepare("UPDATE lembretes SET descricao=:descricao WHERE id=:id");
    	$inserir->bindValue(":descricao",$descricao);
    	$inserir->bindValue(":id",$id);
    	$inserir->execute();
    }
}