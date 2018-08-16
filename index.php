<!DOCTYPE html>
<html>
<head>
	<title>Sistema Crud em feito em PHP</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="container">
		<div class="jumbotron mb-4" style="background-color: #696969;">
			<h1 class="text-center text-light">Sistema CRUD</h1>
		</div>

		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4 ">
				<form method="post" action="controller/login-controller.php">	
					<div class="form-group row">
					    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-10">
					    	<input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
					    </div>
					</div>
					<div class="form-group row">
					    <label for="inputSenha" class="col-sm-2 col-form-label">Senha</label>
					    <div class="col-sm-10">
					    	<input type="password" name="senha" class="form-control" id="inputSenha" placeholder="Senha">
					    </div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
					    	<button type="submit" class="btn btn-default">Entrar</button>
					    	<button type="button" class="btn btn-link text"><a href="view/cadastro.html">Cadastre-se aqui</a></button>
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
</body>
</html>