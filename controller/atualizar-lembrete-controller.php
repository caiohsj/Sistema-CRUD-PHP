<?php
session_start();
require_once("../model/Lembrete.php");
require_once("../model/Usuario.php");

//Se não está logado
if(Usuario::verifyLogin() === false){
		//Redirecionado para inicial da conta
	    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;"
	        . "URL=../'>";
}

$lembrete = new Lembrete();

//Colocando "dentro" do objeto os novos dados do lembrete
$lembrete->setId($_POST["id"]);
$lembrete->setDescricao($_POST["descricao"]);
$lembrete->setUsuarioId($_SESSION["idUsuario"]);

$lembrete->update();

echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;"
        . "URL=../view/conta.php'>";