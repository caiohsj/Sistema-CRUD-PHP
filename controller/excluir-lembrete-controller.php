<?php
require_once("../model/Lembrete.php");
require_once("../model/Usuario.php");

//Se não está logado
if(Usuario::verifyLogin() === false){
		//Redirecionado para inicial da conta
	    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;"
	        . "URL=../'>";
}

$lembrete = new Lembrete();

//Função que insere "dentro" do objeto os dados do lembrete
$lembrete->loadById($_GET["id"]);

//Função que deleta o lembrete
$lembrete->delete();

echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;"
        . "URL=../view/conta.php'>";