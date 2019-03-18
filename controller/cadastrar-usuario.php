<?php
require_once("../model/Usuario.php");


$nome = $_POST['nome'];
$email = $_POST['email'];

//CRIPTOGRAFANDO A SENHA
$cript = password_hash($_POST['senha'], PASSWORD_BCRYPT, ['cost' => 12]);

//RECEBENDO A SENHA CRIPTOGRAFADA
$senha = $cript;

//STATUS RECEBE VALOR 0 PORQUE AINDA NÃO O FOI VERIFICADO O EMAIL DO USUÁRIO, QUANDO O USUÁRIO RECEBER O EMAIL DE VERIFICAÇÃO E CLICAR NO LINK SEU VALOR SERÁ ALTERADO PARA 1.
$status = 0;

$usuario = new Usuario();
$usuarios = $usuario->listarTodoOsUsuariosPorEmail($email);

//SE O EMAIL ESTIVER CADASTRADO, ENTAO O USUARIO NÃO É CADASTRADO
if ($usuarios['email'] == $email) {
	//MENSAGEM DE ERRO
    echo "<script>alert('Este email já está cadastrado!');</script>";

    //REDIRECIONADO PARA PÁGINA PRINCIPAL
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;"
        . "URL=../'>";
}

//SE O EMAIL NÃO ESTIVER CADASTRADO, ENTAO O USUARIO É CADASTRADO
if (empty($usuarios)) {
	$usuario->setNome($nome);
	$usuario->setEmail($email);
	$usuario->setSenha($senha);
	$usuario->setStatus($status);
	//METODO DE ADICIONAR USUÁRIO DA CLASSE USUARIO
	$usuario->addUsuario();

	$confirmarId = $usuario->listarTodoOsUsuariosPorEmail($email);
	$id = $confirmarId['id'];

	// PARA QUEM VAI O EMAIL 
	//$email = "caiohenrique.programador@gmail.com";
	$to = "<$email>" . ", ";
	//$to .= "Outro Fulano(opcional) <email@provedor.com.br>" . ", ";
	// ASSUNTO DA MENSAGEM
	$assunto = "Cadastro Sistema CRUD";
	// CORPO DA MENSAGEM   
	$mensagem = "
	<html>   				
	<body>				
	<font face=Verdana size=1>				
	<br>				
	<br>				
	<b>Confirmação</b>
	<br>				
	<br>								
	<br>				
	<p>Clique <b><a href='http://consultoriobr.000webhostapp.com/crud/controller/confirmar-cadastro-controller.php?id=$id'>Aqui</a></b> para confirmar seu cadastro!</p>  
	<br>				
	<br>
	<br>				
	</font>				
	</body>				
	</html>";   // Headers   
	$headers = "MIME-Version: 1.0\n";   
	$headers .= "Content-type: text/html; charset=iso-8859-1\n";   
	$headers .= "From: Sistema CRUD <email@provedor.com.br>\n";   
	$headers .= "Return-Path: <email@provedor.com.br>\n";
	//ENVIO DO EMAIL   
	mail($to,$assunto,$mensagem, $headers);

	//MENSAGEM DE SUCESSO
    echo "<script>alert('Complete o cadastro confirmando seu email!');</script>";

    //REDIRECIONADO PARA PÁGINA PRINCIPAL
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;"
        . "URL=../'>";
}