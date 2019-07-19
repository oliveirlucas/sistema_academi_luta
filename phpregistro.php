<?php
session_start();
include_once("./php/db_connect.php");

$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$repeatsenha = filter_input(INPUT_POST, 'repeatsenha', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_usuario = "INSERT INTO db_funcionario (NOME, USUARIO, SENHA, REPEAT_SENHA) VALUES ('$nome', '$usuario', MD5('$senha'), MD5('$repeat_senha'))";
$resultado_usuario = mysqli_query($connect, $result_usuario);

if(mysqli_insert_id($connect)){
	$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Usuário cadastrado com sucesso</div>";
	header("Location: ./index.php");
}else{
	$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Usuário não foi cadastrado com sucesso</div>";
	header("Location:./index.php");
}