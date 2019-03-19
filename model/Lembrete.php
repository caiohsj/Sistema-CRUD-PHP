<?php

require_once("BD/Conexao.php");

class Lembrete {
    private $id;
    private $descricao;
    private $usuarioid;

    /* Getters and Setters */
    public function getId()
    {
        return $this->id;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getUsuarioId()
    {
        return $this->usuarioid;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function setUsuarioId($usuarioid)
    {
        $this->usuarioid = $usuarioid;
    }
    /* End Getters and Setters */

    // Função que recebe o id do usuario e retorna um array associativo dos dados dos lembretes de determinado usuario
    public function listByIdUsuario($idusuario){
    	$con = new Conexao();
        //Recebendo a conexao com o bando
        $pdo = $con->getPdo();

    	$listar = $pdo->prepare("SELECT * FROM lembretes WHERE usuario_id=:usuarioid");
    	$listar->bindValue(":usuarioid",$idusuario);
    	$listar->execute();

    	$lembretes = $listar->fetchAll(PDO::FETCH_ASSOC);
    	return $lembretes;
    }

    // Função para colocar "dentro" do objeto os dados do lembrete
    public function loadById($id)
    {
        $con = new Conexao();
        //Recebendo a conexao com o bando
        $pdo = $con->getPdo();

        $listar = $pdo->prepare("SELECT * FROM lembretes WHERE id=:id");
        $listar->bindValue(":id",$id);
        $listar->execute();

        $resultado = $listar->fetch(PDO::FETCH_ASSOC);
        
        $this->setId($resultado["id"]);
        $this->setDescricao($resultado["descricao"]);
        $this->setUsuarioId($resultado["usuario_id"]);

    }

    // Função para deletar lembretes, que recebe os dados diretamente do objeto    
    public function delete(){
    	$con = new Conexao();
        //Recebendo a conexao com o bando
        $pdo = $con->getPdo();

    	$deletar = $pdo->prepare("DELETE FROM lembretes WHERE id=:id");
    	$deletar->bindValue(":id",$this->getId());
    	$deletar->execute();
    }

    // Função para inserir lembretes, que recebe os dados diretamente do objeto
    public function add(){
    	$con = new Conexao();
        //Recebendo a conexao com o bando
        $pdo = $con->getPdo();

    	$inserir = $pdo->prepare("INSERT INTO lembretes(descricao,usuario_id) VALUES(:descricao,:usuarioid)");
    	$inserir->bindValue(":descricao",$this->getDescricao());
    	$inserir->bindValue(":usuarioid",$this->getUsuarioId());
    	$inserir->execute();
    }

    // Função para atualizar lembretes, que recebe os dados diretamente do objeto
    public function update(){
    	$con = new Conexao();
        //Recebendo a conexao com o bando
        $pdo = $con->getPdo();

    	$inserir = $pdo->prepare("UPDATE lembretes SET descricao=:descricao WHERE id=:id");
    	$inserir->bindValue(":descricao",$this->getDescricao());
        $inserir->bindValue(":id",$this->getId());
    	$inserir->execute();
    }
}