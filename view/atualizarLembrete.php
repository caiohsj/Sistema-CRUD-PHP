<?php
	session_start();
	require_once("../model/Lembrete.php");
	require_once("../model/Usuario.php");

	//Se não está logado
	if(Usuario::verifyLogin() === false){
			//Redirecionado para inicial da conta
		    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;";
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
				<table class="table mt-4">
					  <thead class="thead-dark">
					    <tr>
					      <th scope="col" colspan="3">Atualizar Lembrete</a></th>
					    </tr>
					  </thead>
				</table>
				<?php
					$id = $_GET["id"];
					$lembrete = new Lembrete();
					$lembrete->loadById($id);
				?>
				<form method="post" action="../controller/atualizar-lembrete-controller.php">
					<div class="form-group row">
						<input type="hidden" name="id" value="<?php echo $lembrete->getId();?>">
					    <label for="inputDescricao" class="col-sm-2 col-form-label">Descricao</label>
					    <div class="col-sm-8">
					    	<textarea type="text" name="descricao" class="form-control" id="inputDescricao" placeholder="Digite aqui a descricao do seu lembrete" ><?php echo $lembrete->getDescricao();?></textarea>
					    </div>
						<div class="col-sm-1">
					    	<input type="submit" class="btn btn-primary" value="Atualizar">
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>