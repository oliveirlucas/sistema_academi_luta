	<?php

	// Sessão
	session_start();

	?>
	
	<!doctype html>
	<html lang="pt-br">
	<head>
		<meta charset="utf-8" />
		<link rel="icon" type="image/png" href="assets/img/favicon.ico">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>Sales - Cadastro aluno</title>

		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
		<meta name="viewport" content="width=device-width" />


		<!-- Bootstrap core CSS     -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />

		<!-- Animation library for notifications   -->
		<link href="assets/css/animate.min.css" rel="stylesheet"/>

		<!--  Light Bootstrap Table core CSS    -->
		<link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


		<!--  CSS for Demo Purpose, don't include it in your project     -->
		<link href="assets/css/demo.css" rel="stylesheet" />


		<!--     Fonts and icons     -->
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
		<link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

	</head>
	<body>

	<div class="wrapper">
		<div class="sidebar" data-color="black">

		<!--

			Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
			Tip 2: you can also add an image using data-image tag

		-->

			<div class="sidebar-wrapper">
				<div class="logo">
					<a href="http://www.creative-tim.com" class="simple-text">
						SGD Sales Team
					</a>
				</div>

				<ul class="nav">
					<li>
						<a href="dashboard.php">
							<i class="pe-7s-graph"></i>
							<p>Dashboard</p>
						</a>
					</li>
					<li>
						<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
						<i class="pe-7s-user"></i>
						<p>Alunos</p>
						</a>
						<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
							<ul class="bg-white py-2 collapse-inner rounded">
								<li><a href="cadastroaluno.php">Cadastrar aluno</a></li>
							<li><a href="listaraluno.php">Lista de alunos</a></li>
								<li><a href="#">Alunos por professor</a></li>
							</ul>
						</div>
					</li>
					<li>
						<a href="table.html">
							<i class="pe-7s-note2"></i>
							<p>Table List</p>
						</a>
					</li>
					<li>
						<a href="typography.html">
							<i class="pe-7s-news-paper"></i>
							<p>Typography</p>
						</a>
					</li>
					<li>
						<a href="icons.html">
							<i class="pe-7s-science"></i>
							<p>Icons</p>
						</a>
					</li>
					<li>
						<a href="maps.html">
							<i class="pe-7s-map-marker"></i>
							<p>Maps</p>
						</a>
					</li>
					<li>
						<a href="notifications.html">
							<i class="pe-7s-bell"></i>
							<p>Notifications</p>
						</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="main-panel">
			<nav class="navbar navbar-default navbar-fixed">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">Cadastrar Aluno</a>
					</div>
					<div class="collapse navbar-collapse">             
						<ul class="nav navbar-nav navbar-right">
							<li>
							<!-- Nome da conta logada -->
							   <a href="">
								   <p>Nome da conta vem aqui</p>
								</a>
							</li>
							<li>
								<!-- Botão para acionar modal sair -->
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo">
								Sair
								</button>
							</li>
							<li class="separator hidden-lg hidden-md"></li>
						</ul>
					</div>
				</div>
			</nav>

	<!-- Formulario para cadastro do aluno -->
			<div class="content">
			<div class="col-md-12">
			<?php
			if(isset($_SESSION['msgcadastro'])){
				echo $_SESSION['msgcadastro'];
				unset($_SESSION['msgcadastro']);
			}
			?>
			</div>
				<div class="container-fluid">
							<div class="card">
								<div class="header">
									<h4 class="title">Formulário de cadastro</h4>
								</div>
								<div class="content">
									<form action=phpcadastroaluno.php method="post">
										<div class="row">
											<div class="col-md-5">
												<div class="form-group">
													<label>Nome Completo</label>
													<input type="text" class="form-control" placeholder="Nome completo" name="nome">
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Telefone Fixo/Celular</label>
													<input type="number" class="form-control" placeholder="Telefone" name="telefone">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="exampleInputEmail1">E-mail</label>
													<input type="email" class="form-control" placeholder="E-mail" name="email">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Prajied/Faixa</label>
													<input type="text" class="form-control" placeholder="Nivel do aluno" name="nivel">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Modalidade</label>
													<input type="text" class="form-control" placeholder="Arte marcial" name="modalidade">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Endereço</label>
													<input type="text" class="form-control" placeholder="Endereço" name="endereco">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label>Cidade</label>
													<input type="text" class="form-control" placeholder="Cidade" name="cidade">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Estado</label>
													<input type="text" class="form-control" placeholder="Estado" name="estado">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Data de nascimento</label>
													<input type="date" class="form-control" placeholder="Data" name= "data">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Professor</label>
													<input type="text" class="form-control" placeholder="Professor responsável pelo aluno" name= "professor">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Status Aluno</label>
													<select class="form-control" name="status">
														<option>Habilitado</option>
														<option>Desabilitado<option>
													</select>
												</div>
											</div>
										</div>

										<button type="submit" class="btn btn-info btn-fill pull-right" class="alert-dismissible">Cadastrar</button>
										<div class="clearfix"></div>
									</form>
								</div>
							</div>
						</div>
					
			</div>
			

			<footer class="footer">
				<div class="container-fluid"><p class="copyright pull-right">
						&copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
					</p>
				</div>
			</footer>

		</div>
	</div>
	<!-- Modal tela de notificação do logout da pagina -->
	<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja sair ?</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			Caso opte por sair sua sessão será encerrada
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
			<button type="button" class="btn btn-primary">Sair</button>
		  </div>
		</div>
	  </div>
	</div>


	</body>

		<!--   Core JS Files   -->
		<script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
		<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

		<!--  Charts Plugin -->
		<script src="assets/js/chartist.min.js"></script>

		<!--  Notifications Plugin    -->
		<script src="assets/js/bootstrap-notify.js"></script>

		<!--  Google Maps Plugin    -->
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

		<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
		<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

		<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
		<script src="assets/js/demo.js"></script>

	</html>
