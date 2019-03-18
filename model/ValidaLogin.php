<?php
//IMPORTANDO CLASSE CONEXAO
require_once("BD/Conexao.php");

class ValidaLogin {

    public function validarLogin($email){
    	//RECEBENDO A CONEXAO COMO BANCO
        $con = new Conexao();
        $pdo = $con->getPdo();

    	$listar = $pdo->prepare("SELECT * FROM usuarios WHERE email=:email");
    	$listar->bindValue(":email",$email);
    	//$listar->bindValue(":senha",$senha);
    	$listar->execute();

    	//COLOCANDO OS DADOS DO CLIENTE NO ARRAY $dados
    	$dados = $listar->fetch(PDO::FETCH_ASSOC);
    	return $dados;
    }
}