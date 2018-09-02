<?php
session_start();

require_once '../model/ValidaLogin.php';

if (isset($_POST['email']) && isset($_POST['senha'])) {
	$email = $_POST['email'];
	$senha = $_POST['senha'];

	$valida = new ValidaLogin();
	$resultado = $valida->validarLogin($email);

	//SE O EMAIL ESTÁ CADASTRADO
	if (isset($resultado)) {
		//SE A SENHA ESTÁ CORRETA
		if (password_verify($senha,$resultado['senha'])) {
			//SE O EMAIL FOI CONFIRMADO
			if($resultado['status'] == 1){
				//ATRIBUINDO VALORES ÀS VARIAVEIS GLOBAIS SESSION
				$_SESSION['usuarioId'] = $resultado['id'];
				$_SESSION['usuarioNome'] = $resultado['nome'];
				$_SESSION['usuarioEmail'] = $resultado['email'];
				$_SESSION['usuarioSenha'] = $resultado['senha'];
	            $_SESSION['usuarioStatus'] = $resultado['status'];
	            $_SESSION['logado'] = 1;
                        
                        
            echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;"
            . "URL=../view/conta.php'>";
        	}else{
        		//MENSAGEM DE ERRO
				echo "<script>alert('Por favor confirme seu email para realizar o login!');</script>";
                        
            	echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;"
            	. "URL=../'>";
        	}
		}else{
			//MENSAGEM DE ERRO
			echo "<script>alert('Email ou senha inválidos');</script>";
                        
            echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;"
            . "URL=../'>";
		}
	}else{
		//MENSAGEM DE ERRO
		echo "<script>alert('Email não cadastrado');</script>";
                        
        echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;"
        . "URL=../'>";
	}
}