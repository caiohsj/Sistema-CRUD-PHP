<?php
session_start();
require_once("../model/Usuario.php");	

    $_SESSION["idUsuario"] = NULL;
    $_SESSION["nomeUsuario"] = NULL;
    $_SESSION["emailUsuario"] = NULL;
    $_SESSION["statusUsuario"] = NULL;
	
	//redirecionar o usuario para a pÃ¡gina de login
        
        echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;"
                        . "URL=../'>";
