<?php

	// Conectando banco de dadoos
	include("../bd/conecta_bd.php");

	// Pegando dados da página cadastrar_ganho.php
	$tipo_ganhos = $_POST['tipo_ganho'];

	// Verifica se á um valores iguais já cadastrados no banco de dados
	$sql_verifica = "SELECT * FROM tipos_de_ganhos WHERE tipo_ganho = '{$tipo_ganhos}'";
	$result = mysqli_query($conecta_bd, $sql_verifica);
	$row = mysqli_num_rows($result);

	// SQL que insere na tabela de Ganhos do Banco de Dados

	$sql_cadastra_tipo_ganhos = "INSERT INTO tipos_de_ganhos (tipo_ganho)
							        VALUES ('$tipo_ganhos')";

	// Verifica se algum dos campos digitados estão vazios
	// Caso estiver exibe uma mensagem de erro
	if ( empty($tipo_ganhos) || $tipo_ganhos == "") {
		header("Location: ../index.php?sec=tipo_ganhos&erro_cadastro=warnning");
	} elseif ( $row > 0 ) {
		header("Location: ../index.php?sec=tipo_ganhos&erro_cadastro=info");
	} else {
		// Caso nenhum dos campos estiver vazio ele faz insere os dados na tabelka do Banco de Dados
		if ( mysqli_query($conecta_bd, $sql_cadastra_tipo_ganhos) ) {
			// Informa mensagem de sucesso caso os dados forem corretamente inseridos no Banco de Dados
			header("Location: ../index.php?sec=tipo_ganhos&erro_cadastro=sucess");

		} else {
			// Informa mensagem de erro caso os dados não forem corretamente inseridos no Banco de Dados
			header("Location: ../index.php?sec=tipo_ganhos&erro_cadastro=failed");
		}
	}

?>