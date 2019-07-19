<?php
session_start();
include_once("./php/db_connect.php");

$id = filter_input(INPUT_POST, 'codaluno');
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

echo "Nome: $nome <br>";
echo "E-mail: $email <br>";

$result_usuario = "UPDATE db_aluno SET NOME='$nome', DATANASCIMENTO='$datanascimento', TELEFONE='$telefone', EMAIL='$email', ENDERECO='$endereco', CIDADE='$cidade', ESTADO='$estado', PROFESSOR='$professor', MODALIDADE='$modalidade', STATUS='$status', NIVEL='$nivel' WHERE COD_ALUNO='$id'";
$resultado_usuario = mysqli_query($connect, $result_usuario);

if(mysqli_insert_id($connect)){
	$_SESSION['msgeditado'] = "<div class='alert alert-success' role='alert'>Dados do aluno atulizado com sucesso</div>";
	header("Location: ./listaraluno.php");
}else{
	$_SESSION['msgeditado'] = "<div class='alert alert-danger' role='alert'>Dados do aluno não atualizado</div>";
	header("Location:./listaraluno.php");
}