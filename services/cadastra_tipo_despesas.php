<?php

	// Conectando banco de dadoos
	include("../bd/conecta_bd.php");

	// Pegando dados da página cadastrar_ganho.php
	$tipo_despesas = $_POST['tipo_despesa'];

	// Verifica se á um valores iguais já cadastrados no banco de dados
	$sql_verifica = "SELECT * FROM tipos_de_despesas WHERE tipo_despesa = '{$tipo_despesas}'";
	$result = mysqli_query($conecta_bd, $sql_verifica);
	$row = mysqli_num_rows($result);

	// SQL que insere na tabela de Ganhos do Banco de Dados
	$sql_cadastra_tipo_depesas = "INSERT INTO tipos_de_despesas (tipo_despesa)
							VALUES ('$tipo_despesas')";

	// Verifica se algum dos campos digitados estão vazios
	// Caso estiver exibe uma mensagem de erro
	if ( empty($tipo_despesas) || $row > 0 ) {
		header("Location: ../index.php?sec=tipo_despesas&erro_cadastro=warnning");
	} else {
		// Caso nenhum dos campos estiver vazio ele faz insere os dados na tabelka do Banco de Dados
		if ( mysqli_query($conecta_bd, $sql_cadastra_tipo_depesas) ) {
			// Informa mensagem de sucesso caso os dados forem corretamente inseridos no Banco de Dados
			header("Location: ../index.php?sec=tipo_despesas&erro_cadastro=sucess");

		} else {
			// Informa mensagem de erro caso os dados não forem corretamente inseridos no Banco de Dados
			header("Location: ../index.php?sec=tipo_despesas&erro_cadastro=failed");
		}

	}

?>