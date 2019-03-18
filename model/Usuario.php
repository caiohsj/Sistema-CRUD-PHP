<?php
//IMPORTANDO CLASSE CONEXAO
require_once("BD/Conexao.php");

class Usuario {
    private $nome;
    private $email;
    private $senha;
    private $status;

    /* Getters and Setters ------------------------------------------*/
    public function getNome(){
        return $this->nome;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function setStatus($status){
        $this->status = $status;
    }
    /* End Getters and Setters------------------------------------------- */

    public function addUsuario(){
    	//RECEBENDO A CONEXAO COMO BANCO
    	$con = new Conexao();
        $pdo = $con->getPdo();

    	//QUERY PARA INSERIR USUARIO NO BANCO
    	$inserir = $pdo->prepare("INSERT INTO usuarios(nome,email,senha,status) VALUES(:nome,:email,:senha,:status)");
    	$inserir->bindValue(":nome", $this->getNome());
    	$inserir->bindValue(":email", $this->getEmail());
    	$inserir->bindValue(":senha", $this->getSenha());
    	$inserir->bindValue(":status", $this->getStatus());
    	$inserir->execute();
    }

    public function listarTodoOsUsuariosPorEmail($email){
    	//RECEBENDO A CONEXAO COMO BANCO
        $con = new Conexao();
        $pdo = $con->getPdo();

        $listar = $pdo->prepare("SELECT * FROM usuarios WHERE email=:email");
        $listar->bindValue(":email",$email);
        $listar->execute();

        $resultado = $listar->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function listarTodoOsUsuarios(){
        //RECEBENDO A CONEXAO COMO BANCO
        $con = new Conexao();
        $pdo = $con->getPdo();

        $listar = $pdo->prepare("SELECT * FROM usuarios");
        $listar->execute();

        $resultado = $listar->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function confirmarCadastro($id){
        //RECEBENDO A CONEXAO COMO BANCO
        $con = new Conexao();
        $pdo = $con->getPdo();

        $confirmar = $pdo->prepare("UPDATE usuarios SET status=1 WHERE id=:id");
        $confirmar->bindValue(":id",$id);
        $confirmar->execute();
    }
}