<?php
require_once '../model/Usuario.php';

$id = $_GET['id'];

$usuario = new Usuario();

	$usuario->confirmarCadastro($id);

	//MENSAGEM DE SUCESSO
    echo "<script>alert('Email confirmado com sucesso!');</script>";

    //REDIRECIONADO PARA PÁGINA PRINCIPAL
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;"
       . "URL=../'>";