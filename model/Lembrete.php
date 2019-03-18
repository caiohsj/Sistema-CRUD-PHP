<?php
//IMPORTANDO CLASSE CONEXAO
require_once("BD/Conexao.php");

class Lembrete {

    public function listarTodosOsLembretes($usuarioid){
    	//RECEBENDO A CONEXAO COMO BANCO
        $con = new Conexao();
        $pdo = $con->getPdo();

    	$listar = $pdo->prepare("SELECT * FROM lembretes WHERE usuario_id=:usuarioid");
    	$listar->bindValue(":usuarioid",$usuarioid);
    	$listar->execute();

    	$lembretes = $listar->fetchAll(PDO::FETCH_ASSOC);
    	return $lembretes;
    }

    public function listarTodosOsLembretesPorId($id){
    	//RECEBENDO A CONEXAO COMO BANCO
        $con = new Conexao();
        $pdo = $con->getPdo();

    	$listar = $pdo->prepare("SELECT * FROM lembretes WHERE id=:id");
    	$listar->bindValue(":id",$id);
    	$listar->execute();

    	$lembretes = $listar->fetch(PDO::FETCH_ASSOC);
    	return $lembretes;
    }

    public function deletarLembrete($id){
    	//RECEBENDO A CONEXAO COMO BANCO
        $con = new Conexao();
        $pdo = $con->getPdo();

    	$deletar = $pdo->prepare("DELETE FROM lembretes WHERE id=:id");
    	$deletar->bindValue(":id",$id);
    	$deletar->execute();
    }

    public function adicionarLembrete($descricao,$usuarioid){
    	//RECEBENDO A CONEXAO COMO BANCO
        $con = new Conexao();
        $pdo = $con->getPdo();

    	$inserir = $pdo->prepare("INSERT INTO lembretes(descricao,usuario_id) VALUES(:descricao,:usuarioid)");
    	$inserir->bindValue(":descricao",$descricao);
    	$inserir->bindValue(":usuarioid",$usuarioid);
    	$inserir->execute();
    }

    public function atualizarLembrete($id,$descricao){
    	//RECEBENDO A CONEXAO COMO BANCO
        $con = new Conexao();
        $pdo = $con->getPdo();

    	$inserir = $pdo->prepare("UPDATE lembretes SET descricao=:descricao WHERE id=:id");
    	$inserir->bindValue(":descricao",$descricao);
    	$inserir->bindValue(":id",$id);
    	$inserir->execute();
    }
}