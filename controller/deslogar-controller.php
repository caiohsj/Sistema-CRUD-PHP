<?php

session_start();
	
    //DESTRUINDO A SESSÃO QUE FOI INICIADA COM O LOGIN
	unset(
		$_SESSION['usuarioId'],
		$_SESSION['usuarioNome'],
		$_SESSION['usuarioEmail'],
		$_SESSION['usuarioSenha'],
        $_SESSION['usuarioStatus']
	);
	
	$_SESSION['logado'] = 0;
	//redirecionar o usuario para a pÃ¡gina de login
        
        echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;"
                        . "URL=../'>";
