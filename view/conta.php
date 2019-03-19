<?php
	session_start();
	require_once("../model/Lembrete.php");
	require_once("../model/Usuario.php");

	//	Se não está logado
	if(Usuario::verifyLogin() === false){
		//	Redirecionado para inicial da conta
	    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;"
	        . "URL=../'>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-dark bg-dark mb-4">
  			<span class="navbar-brand mb-0 h1"><?php echo $_SESSION["nomeUsuario"];?></span>
  			<a class="navbar-brand mb-0 h1" href="../controller/deslogar-controller.php">Sair</a>
		</nav>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<table class="table mt-4 border">
					  <thead class="thead-dark">
					    <tr>
					      <th scope="col" colspan="3">Seus Lembretes <a href="adicionarLembrete.php">+</a></th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php
					  		//	Recebendo o id do usuario que está logado
					  		$idUsuario = $_SESSION["idUsuario"];
							$lembrete = new Lembrete();

							//	Listando os lembretes por usuario
							$results = $lembrete->listByIdUsuario($idUsuario);

							// Se tem algum lembrete então é feito o loop para mostrá-los
							if(isset($results)){
					  			foreach ($results as $lembretes){
					  	?>
					    <tr class="row">
					      <td class="col-md-9 ml-1"><?=$lembretes['descricao'];?></td>
					      <td class="col-md-1"><a href="atualizarLembrete.php?id=<?php echo $lembretes['id'];?>">Editar</a></td>
					      <td class="col-md-1"><a href="../controller/excluir-lembrete-controller.php?id=<?php echo $lembretes['id'];?>">Excluir</a></td>
					    </tr>
					    <?php
					    		}
					    	}

					    	if(empty($lembretes)){
					    ?>
					    <tr class="row">
					    	<td class="col-md-2"></td>
					     	<td class="col-md-10">Clique no botao +, que está acima, para adicionar um lembrete</td>
					    </tr>
					    <?php
					    	}
					    ?>
					  </tbody>
				</table>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>