<?php
session_start();

require_once("../model/Usuario.php");

if (isset($_POST["email"]) && 
	isset($_POST["senha"]) && 
	$_POST["email"] != "" && 
	$_POST["email"] != "") {

	$email = $_POST["email"];
	$senha = $_POST["senha"];

	$usuario = new Usuario();

	//Se o email existe no banco de dados
	if($usuario->login($email, $senha)){

	    //Redirecionado para inicial da conta
	    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;"
	        . "URL=../view/conta.php'>";

	} else {

	}
}