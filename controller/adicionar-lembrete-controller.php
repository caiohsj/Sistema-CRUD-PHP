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

$usuarioid = $_SESSION["idUsuario"];
$descricao = $_POST["descricao"];

$lembrete = new Lembrete();
$lembrete->setDescricao($descricao);
$lembrete->setUsuarioId($usuarioid);
$lembrete->add();

echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;"
        . "URL=../view/conta.php'>";