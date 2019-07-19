	<?php

	session_start();

	include_once("./php/db_connect.php");
	?>

	<!doctype html>
	<html lang="pt-br">
	<head>
		<meta charset="utf-8" />
		<link rel="icon" type="image/png" href="assets/img/favicon.ico">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>Sales - Lista alunos</title>

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
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

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
						<a class="navbar-brand" href="#">Lista de alunos</a>
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

			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="header">
									<h3 class="title">Filtro de busca</h3>
									<br>
									<input type="text" class="form-control" placeholder="Pesquisar" id="filtro">
									<br>
								</div>
								<div class="content table-responsive table-full-width">
									<table id="tabela" class="table table-hover table-striped">
										<thead>
											<th>RA</th>
											<th>Nome</th>
											<th>Nascimento</th>
											<th>Telefone</th>
											<th>E-mail</th>
											<th>Endereço</th>
											<th>Cidade/Estado</th>
											<th>Professor</th>
											<th>Modalidade</th>
											<th>Prajied/Faixa</th>
											<th>Status</th>
											<th>Status</th>
										</thead>
										<tbody id="filtrobusca">
										<?php 
										//Receber o número da página
										$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
										$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
			
										//Setar a quantidade de itens por pagina
										$qnt_result_pg = 10;
			
										//calcular o inicio visualização
										$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
			
										$result_usuarios = "SELECT * FROM db_aluno LIMIT $inicio, $qnt_result_pg";
										$resultado_usuarios = mysqli_query($connect, $result_usuarios);
										while($dado = mysqli_fetch_assoc($resultado_usuarios)){ ?>
											<tr>
												<td><?php echo $dado ["COD_ALUNO"]; ?></td>
												<td><?php echo $dado ["NOME"]; ?></td>
												<td><?php echo $dado ["DATANASCIMENTO"]; ?></td>
												<td><?php echo $dado ["TELEFONE"]; ?></td>
												<td><?php echo $dado ["EMAIL"]; ?></td>
												<td><?php echo $dado ["ENDERECO"]; ?></td>
												<td><?php echo $dado ["CIDADE"]; ?>/<?php echo $dado ["ESTADO"]; ?></td>
												<td><?php echo $dado ["PROFESSOR"]; ?></td>
												<td><?php echo $dado ["MODALIDADE"]; ?></td>
												<td><?php echo $dado ["NIVEL"]; ?></td>
												<?php 
													if($dado["STATUS"] == 'Habilitado'){
												?>
												<td><span class="label label-success"><?php echo $dado ['STATUS']; ?></span></td>
												<?php
												}else{
												?>
												<td><span class="label label-danger"><?php echo $dado ["STATUS"]; ?></span></td>
												<?php	
												}
												?>
												<td>
												<button type="button" class="btn btn-warning"data-toggle="modal" data-target="#editaraluno" ><i class="pe-7s-pen"></i></button>
												<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#excluiraluno"><i class="pe-7s-trash"></i></button>
												</td>
											</tr>
										<?php } ?>
										</tbody>
									</table>
											<?php
											//Paginação - Somar a quantidade de usuários
											$result_pg = "SELECT COUNT(COD_ALUNO) AS num_result FROM db_aluno";
											$resultado_pg = mysqli_query($connect, $result_pg);
											$row_pg = mysqli_fetch_assoc($resultado_pg);
											//echo $row_pg['num_result'];
											//Quantidade de pagina 
											$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
				
											//Limitar os link antes depois
											$max_links = 1; ?>
											
											<center>
											<nav aria-label="Page navigation example">
												<ul class="pagination">
													<li class="page-item"><a class="page-link"  href="listaraluno.php?pagina=1">Primeira pagina</a></li>
				
											<?php for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){ ?>
											<?php	if($pag_ant >= 1){ ?>
													<li class="page-item"><a class="page-link"  href="listaraluno.php?pagina=<?php echo $pag_ant?>"><?php echo $pag_ant ?></a></li>
											<?php	} ?>
											<?php } ?>
					
											<li class="paginate_button page-item active"><a class="page-link"><?php echo $pagina ?></a></li>
				
											<?php for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){ ?>
											<?php	if($pag_dep <= $quantidade_pg){ ?>
													<li class="page-item"><a class="page-link"  href="listaraluno.php?pagina=<?php echo$pag_dep?>"><?php echo $pag_dep?></a></li>
											<?php	} ?>
											<?php } ?>
				
													<li class="page-item"><a class="page-link"  href="listaraluno.php?pagina=<?php echo $quantidade_pg?>">Ultima pagina</a></li>
												</ul>
											</nav>
											</center>
								</div>
							</div>
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
			<button type="button" class="btn btn-secondary" onclick="voltarlista();">Fechar</button>
			<button type="button" class="btn btn-primary">Sair</button>
		  </div>
		</div>
	  </div>
	</div>
	
	<!-- Modal tela deletar aluno -->
	<div class="modal fade" id="excluiraluno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja excluir esse aluno ?</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			Caso opte por excluir esse aluno todos os dados serão perdidos
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" onclick="voltarlista();" >Voltar</button>
			<button type="button" class="btn btn-danger">Excluir</button>
		  </div>
		</div>
	  </div>
	</div>
	
	<!-- Modal tela de Editar aluno -->
	<div class="modal fade" id="editaraluno" tabindex="-1" role="dialog" aria-labelledby="editaraluno" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		<?php
			$id = filter_input(INPUT_GET, 'COD_ALUNO', FILTER_SANITIZE_NUMBER_INT);
			$resultedit_usuario = "SELECT * FROM db_aluno WHERE COD_ALUNO = '10'";
			$resultadoedit_usuario = mysqli_query($connect, $resultedit_usuario);
			$rowedit_usuario = mysqli_fetch_assoc($resultadoedit_usuario);
		?>
		  <div class="modal-header">
			<h3 class="modal-title" id="exampleModalLabel">Editar aluno</h3>
		  </div>
		  <div class="modal-body">
			<form action=phpeditaraluno.php method="post">
										<div class="row">
											<div class="col-md-2">
												<div class="form-group">
													<label>RA Aluno</label>
													<input type="text" class="form-control" name="codaluno" readonly="readonly" value="<?php echo $rowedit_usuario['COD_ALUNO']; ?>">
												</div>
											</div>
											<div class="col-md-10">
												<div class="form-group">
													<label>Nome Completo</label>
													<input type="text" class="form-control" placeholder="Nome completo" name="nome" value="<?php echo $rowedit_usuario['NOME']; ?>">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label>Telefone Fixo/Celular</label>
													<input type="text" class="form-control" placeholder="Telefone" name="telefone" value="<?php echo $rowedit_usuario['TELEFONE']; ?>">
												</div>
											</div>
											<div class="col-md-8">
												<div class="form-group">
													<label for="exampleInputEmail1">E-mail</label>
													<input type="email" class="form-control" placeholder="E-mail" name="email" value="<?php echo $rowedit_usuario['EMAIL']; ?>">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Prajied/Faixa</label>
													<input type="text" class="form-control" placeholder="Nivel do aluno" name="nivel" value="<?php echo $rowedit_usuario['NIVEL']; ?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Modalidade</label>
													<input type="text" class="form-control" placeholder="Arte marcial" name="modalidade" value="<?php echo $rowedit_usuario['MODALIDADE']; ?>">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Endereço</label>
													<input type="text" class="form-control" placeholder="Endereço" name="endereco" value="<?php echo $rowedit_usuario['ENDERECO']; ?>">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label>Cidade</label>
													<input type="text" class="form-control" placeholder="Cidade" name="cidade" value="<?php echo $rowedit_usuario['CIDADE']; ?>">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Estado</label>
													<input type="text" class="form-control" placeholder="Estado" name="estado" value="<?php echo $rowedit_usuario['ESTADO']; ?>">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Data de nascimento</label>
													<input type="date" class="form-control" placeholder="Data" name= "data" value="<?php echo $rowedit_usuario['DATA']; ?>">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Professor</label>
													<input type="text" class="form-control" placeholder="Professor responsável pelo aluno" name= "professor" value="<?php echo $rowedit_usuario['PROFESSOR']; ?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Status Aluno</label>
													<select class="form-control" name="status" value="<?php echo $rowedit_usuario['STATUS']; ?>">
														<option>Habilitado</option>
														<option>Desabilitado<option>
													</select>
												</div>
											</div>
										</div>
		  
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" onclick="voltarlista();" >Voltar</button>
			<button type="submit" class="btn btn-success">Atualizar</button>
		  </div>
		  </form>
		  </div>
		</div>
	  </div>
	</div>

	<script>
		function voltarlista() {
						// Faz um redirecionamento mantendo a página original no histórico de navegaçãodo browser.
						window.location.href = "listaraluno.php";
					}
	</script>
	<script>
		function editaluno() {
						// Faz um redirecionamento mantendo a página original no histórico de navegaçãodo browser.
						window.location.href = "listaraluno.php?pagina=<?php echo $id ?>";
					}
	</script>
	<script>
					$(document).ready(function(){
					  $("#filtro").on("keyup", function() {
						var value = $(this).val().toLowerCase();
						$("#filtrobusca tr").filter(function() {
						  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
						});
					  });
					});
	</script>

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

