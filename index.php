	<?php
	// Conexão
	require_once './php/db_connect.php';

	// Sessão
	session_start();

	// Botão enviar
	if(isset($_POST['btn-entrar'])):
		$erros = array();
		$usuario = mysqli_escape_string($connect, $_POST['usuario']);
		$senha = mysqli_escape_string($connect, $_POST['senha']);

		if(isset($_POST['lembrar-senha'])):

			setcookie('usuario', $usuario, time()+3600);
			setcookie('senha', md5($senha), time()+3600);
		endif;

		if(empty($usuario) or empty($senha)):
			$erros[] = "<div class='alert alert-danger' role='alert'> O campo login/senha precisa ser preenchido </div>";
		else:
			// 105 OR 1=1 
			// 1; DROP TABLE teste

			$sql = "SELECT usuario FROM db_funcionario WHERE USUARIO = '$usuario'";
			$resultado = mysqli_query($connect, $sql);		

			if(mysqli_num_rows($resultado) > 0):
			$senha = md5($senha);       
			$sql = "SELECT * FROM db_funcionario WHERE USUARIO = '$usuario' AND senha = '$senha'";



			$resultado = mysqli_query($connect, $sql);

				if(mysqli_num_rows($resultado) == 1):
					$dados = mysqli_fetch_array($resultado);
					mysqli_close($connect);
					$_SESSION['logado'] = true;
					$_SESSION['id_usuario'] = $dados['COD_FUNC'];
					header('Location: dashboard.php');
				else:
					$erros[] = "<div class='alert alert-danger' role='alert'> Usuário e senha não conferem </div>";
				endif;

			else:
				$erros[] = "<div class='alert alert-danger' role='alert'> Usuário inexistente </div>";
			endif;

		endif;

	endif;
	?>

	<!doctype html>
	<html lang="pt-br">
	
	<head>
	
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<title>SGD Sales Team</title>

	<!------ Include the above in your HEAD tag ---------->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	
	</head>
	
	<body style="background-color: #e9e9e9;">
	<nav class="navbar navbar-default navbar-fixed" style="background-color: #000;">
	<a style="background-color: #000;">.</a>
	</nav>
	
	<center>
	<br>
	<br>
	<br>
	<br>
		<img src="./img/login-png.png" alt="some text" width=531 height=369>
	<br>
	<br>
<div class="col-md-4">
		<?php 
	if(!empty($erros)):
		foreach($erros as $erro):
			echo $erro;
		endforeach;
	endif;
	?>
	<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
			?>
</div>
		  <div class="main">
			 <div class="col-md-4">
				<div class="login-form">
				   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
					  <div class="form-group">
						 <input type="text" name="usuario" class="form-control" placeholder= "Usuario" value="<?php echo isset($_COOKIE['login']) ? $_COOKIE['login'] : '' ?>">
					  </div>
					  <div class="form-group">
						 <input type="password" name="senha" class="form-control" placeholder = "Senha" value="<?php echo isset($_COOKIE['senha']) ? $_COOKIE['senha'] : '' ?>">
					  </div>
						 <button type="submit" class="btn btn-black" name="btn-entrar">Entrar</button>            
						 <input type="button" class="btn btn-secondary" value= "Registrar" onclick ="cadastro();"/>      
				   </form>
				</div>
			 </div>
		  </div>
	</center>

	<script>
	function cadastro() {
					// Faz um redirecionamento mantendo a página original no histórico de navegaçãodo browser.
					window.location.href = "registro.php";
				}
	</script>
	</body>
	</html>