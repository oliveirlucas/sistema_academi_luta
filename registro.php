<html>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<head>
		<title>Registro</title>
			<link href="style.css" rel="stylesheet">
	</head>
<body style="background-color: #e9e9e9;">
<nav class="navbar navbar-default navbar-fixed" style="background-color: #000;">
	<a style="background-color: #000;">.</a>
	</nav>
	<center>
		<br>
		<br>
		<br>
		<img src="./img/dashboard.png" alt="some text" >
		<br>
		<br>
		<br>
		<div class="main">
				<div class="col-md-6 col-sm-12">
				   <div class="login-form">
					  <form action=phpregistro.php method="post">
					    <div class="form-group">
							<input type="text" name="nome" class="form-control" placeholder= "Nome Completo">
                  		</div>
						<div class="form-group">
							<input type="text" name="usuario" class="form-control" placeholder= "Usuario">
                  		</div>
                  		<div class="form-group">
                     		<input type="password" name="senha" class="form-control" placeholder = "Senha">
						</div>
						<div class="form-group">
                     		<input type="password" name="repeatsenha" class="form-control" placeholder = "Confirmar Senha">
                 		</div>
							<input type="button" class="btn btn-black" value="Voltar" onclick="voltar();"/>
							<button type="submit" class="btn btn-secondary">Confirmar</button>
						</form>
					</div>
				</div>
			</div>
		</center>
		<script>
function voltar() {
				// Faz um redirecionamento mantendo a página original no histórico de navegaçãodo browser.
				window.location.href = "./index.php";
			}
</script>	
	</body>
</html>