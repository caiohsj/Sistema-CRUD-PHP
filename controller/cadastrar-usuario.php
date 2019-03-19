<?php
require_once("../model/Usuario.php");


$nome = $_POST["nome"];
$email = $_POST["email"]; 
$senha = $_POST["senha"];

//STATUS RECEBE VALOR 0 PORQUE AINDA NÃO O FOI VERIFICADO O EMAIL DO USUÁRIO, QUANDO O USUÁRIO RECEBER O EMAIL DE VERIFICAÇÃO E CLICAR NO LINK SEU VALOR SERÁ ALTERADO PARA 1.
$status = 1;

$usuario = new Usuario();

//$usuarios = $usuario->listarTodoOsUsuariosPorEmail($email);

//Se o email estiver cadastrado, então o usuário não é salvo
if ($usuario->findByEmail($email)) {
	//Mensagem de erro
    echo "<script>alert('Este email já está cadastrado!');</script>";

    //Redirecionado para pagina de cadastro
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;"
        . "URL=../view/cadastro.html'>";
} else {
	//Colocando 'dentro' do objeto os dados do usuário que está sendo cadastrado
	$usuario->setNome($nome);
	$usuario->setEmail($email);
	//Passando a senha ja criptografada
	$usuario->setSenha($usuario->getPasswordHash($senha));
	$usuario->setStatus($status);
	//Método para inserir usuario
	$usuario->add();

	//Mensagem de sucesso
    echo "<script>alert('Este email já está cadastrado!');</script>";

    //Redirecionando para a pagina principal
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;"
        . "URL=../'>";
}