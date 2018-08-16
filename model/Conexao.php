<?php

class Conexao {
	private $pdo;

	//MÉTODO PARA RECEBER OS DADOS DA CONEXAO
	public function getPdo(){
		return $this->pdo;
	}

	//MÉTODO PARA INSERIR OS DADOS DA CONEXAO
	private function setPdo($pdo){
		$this->pdo = $pdo;
	}

	//MÉTODO QUE FAZ A CONEXAO COM O BANCO DE DADOS
	public function conectar(){   
    try{
	    $pdo = new PDO("mysql:host=localhost;dbname=crud","root","");
	    //ATRIBUINDO A VARIÁVEL $pdo OS DADOS DA CONEXÃO
	    $this->setPdo($pdo);
    } catch (PDOException $e){
        $e->getMessage();
    }
   }
}