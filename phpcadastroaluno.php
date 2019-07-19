<?php
session_start();
include_once("./php/db_connect.php");

$nome = filter_input(INPUT_POST, 'nome');
$datanascimento = filter_input(INPUT_POST, 'data');
$telefone = filter_input(INPUT_POST, 'telefone');
$email = filter_input(INPUT_POST, 'email');
$endereco = filter_input(INPUT_POST, 'endereco');
$cidade = filter_input(INPUT_POST, 'cidade');
$estado = filter_input(INPUT_POST, 'estado');
$professor = filter_input(INPUT_POST, 'professor');
$modalidade = filter_input(INPUT_POST, 'modalidade');
$status = filter_input(INPUT_POST, 'status');
$nivel = filter_input(INPUT_POST, 'nivel');

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_usuario = "INSERT INTO db_aluno (NOME, DATANASCIMENTO, TELEFONE, EMAIL, ENDERECO, CIDADE, ESTADO, PROFESSOR, MODALIDADE, STATUS, NIVEL) VALUES ('$nome', '$datanascimento', '$telefone', '$email', '$endereco', '$cidade', '$estado', '$professor', '$modalidade', '$status', '$nivel')";
$resultado_usuario = mysqli_query($connect, $result_usuario);

if(mysqli_insert_id($connect)){
	$_SESSION['msgcadastro'] = "<div class='alert alert-success' role='alert'>Aluno cadastrado com sucesso</div>";
	header("Location: ./cadastroaluno.php");
}else{
	$_SESSION['msgcadastro'] = "<div class='alert alert-danger' role='alert'>Aluno não cadastrado</div>";
	header("Location:./cadastroaluno.php");
}