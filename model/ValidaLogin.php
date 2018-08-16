<?php
//IMPORTANDO CLASSE CONEXAO
require_once 'Conexao.php';

class ValidaLogin {

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

    public function validarLogin($email){
    	$pdo = $this->getConexao();

    	$listar = $pdo->prepare("SELECT * FROM usuarios WHERE email=:email");
    	$listar->bindValue(":email",$email);
    	//$listar->bindValue(":senha",$senha);
    	$listar->execute();

    	//COLOCANDO OS DADOS DO CLIENTE NO ARRAY $dados
    	$dados = $listar->fetch(PDO::FETCH_ASSOC);
    	return $dados;
    }
}