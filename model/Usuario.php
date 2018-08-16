<?php
require_once 'Conexao.php';

class Usuario {
	
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

    public function addUsuario($nome,$email,$senha,$status){
    	//RECEBENDO A CONEXAO COMO BANCO
    	$pdo = $this->getConexao();

    	//QUERY PARA INSERIR USUARIO NO BANCO
    	$inserir = $pdo->prepare("INSERT INTO usuarios(nome,email,senha,status) VALUES(:nome,:email,:senha,:status)");
    	$inserir->bindValue(":nome", $nome);
    	$inserir->bindValue(":email", $email);
    	$inserir->bindValue(":senha", $senha);
    	$inserir->bindValue(":status", $status);
    	$inserir->execute();
    }

    public function listarTodoOsUsuariosPorEmail($email){
    	$pdo = $this->getConexao();

        $listar = $pdo->prepare("SELECT * FROM usuarios WHERE email=:email");
        $listar->bindValue(":email",$email);
        $listar->execute();

        $resultado = $listar->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function listarTodoOsUsuarios(){
        $pdo = $this->getConexao();

        $listar = $pdo->prepare("SELECT * FROM usuarios");
        $listar->execute();

        $resultado = $listar->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function confirmarCadastro($id){
        $pdo = $this->getConexao();

        $confirmar = $pdo->prepare("UPDATE usuarios SET status=1 WHERE id=:id");
        $confirmar->bindValue(":id",$id);
        $confirmar->execute();
    }
}