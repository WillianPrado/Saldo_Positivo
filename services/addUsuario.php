<?php
	

	
	include("../config.php");


	$nome = $_POST['nome'];
	$usuario = $_POST['usuario'];
	$email = $_POST['email'];
	$senha = sha1( $_POST['senha']);


	$sql = "INSERT INTO `cadastrar_usuarios`( `nome`, `nome_usuario`, `email`,  `senha`) VALUES ('$nome','$usuario','$email','$senha')";
	if (mysqli_query($con, $sql)) {
		$feedback = "adicionado";
		header("Location: ../index.php?sec=cadastro?feedback='$feedback'");
	 } else {
		echo "Error: " . $sql . "<br>" . mysqli_error($con);
	 }

	//header("Location: ../index.php?sec=cadastro");

?>
