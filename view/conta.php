<?php
	session_start();
	require_once '../model/Lembrete.php';

	if ($_SESSION['logado'] == 0) {
                        
        echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;"
        . "URL=../'>";
	}

	if ($_SESSION['logado'] == 1) {
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
  			<span class="navbar-brand mb-0 h1"><?php echo $_SESSION['usuarioNome'];?></span>
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
					  		$usuarioid = $_SESSION['usuarioId'];
							$lembrete = new Lembrete();
							$lembretes = $lembrete->listarTodosOsLembretes($usuarioid);

							if(isset($lembretes)){
					  			foreach ($lembretes as $listarLembretes){
					  	?>
					    <tr class="row">
					      <!--<th scope="row" class="col-md-2"><?=$listarLembretes['id'];?></th>-->
					      <td class="col-md-9 ml-1"><?=$listarLembretes['descricao'];?></td>
					      <td class="col-md-1"><a href="atualizarLembrete.php?id=<?php echo $listarLembretes['id'];?>">Editar</a></td>
					      <td class="col-md-1"><a href="../controller/excluir-lembrete-controller.php?id=<?php echo $listarLembretes['id'];?>">Excluir</a></td>
					    </tr>
					    <?php
					    		}
					    	}

					    	if(empty($lembretes)){
					    ?>
					    <tr class="row">
					    	<td class="col-md-2"></td>
					     	<td class="col-md-10">Clique no botao +, que está acima para adicionar um lembrete</td>
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
<?php
	}
?>