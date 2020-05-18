<?php

	// Conectando banco de dadoos
	include("../bd/conecta_bd.php");

	// Pegando dados da página cadastrar_ganho.php
	$date = $_POST['data'];
	$descricao = $_POST['descricao_renda'];
	$tipo_renda = $_POST['tipo_renda'];
	$valor = $_POST['valor_renda'];
	$renda_fixa = $_POST['renda_fixa'];

	// Caso renda Fixa esteja com Valor Vazio retorna a plavra Não
	if ( $renda_fixa == "" || $renda_fixa == null ) {
		$renda_fixa	= "Não";
	} 


	// Se renda Fixa for marcado ele adicionará a renda por 12 Meses consecutivos
	if( $renda_fixa == "Sim" ){
		$data = date($date);

		// Explode a barra e retorna três arrays
		$data = explode("/", $data);

		// Cria três variáveis $ano $mes $dia
		list($dia, $mes, $ano) = $data;

		// Recria a data invertida
		$data = "$ano/$mes/$dia";

		// Cria uma data final para os 12 meses posteriores
		$data_final = date("Y-m-d",
		mktime(
		        date("H"),
		        date("i"),
		        date("s"),
		        date("m")+11,
		        date("d"),
		        date("Y")
		        )
		);

		// While pra percorrer os 12 Meses
		while($data < $data_final){
		    $data = date("Y-m-d",
		        mktime(
		            date("H"),
		            date("i"),
		            date("s"),
		            $mes,
		            $dia,
		            $ano    
		        )
		    );
		    
		    $mes = $mes+1;
		    $sql_cadastra_ganhos = "INSERT INTO cadastrar_ganhos (data, descricao, tipo_renda, valor, renda_fixa)
								VALUES ('$data', '$descricao', '$tipo_renda', '$valor', '$renda_fixa')";


			if ( $data == "" || $descricao == "" || $tipo_renda == "" || $valor == "") {
				header("Location: ../index.php?sec=cadastrar_ganho&erro_cadastro=warnning");

			} else {
				// Caso nenhum dos campos estiver vazio ele faz insere os dados na tabelka do Banco de Dados
				if ( mysqli_query($conecta_bd, $sql_cadastra_ganhos) ) {
					// Informa mensagem de sucesso caso os dados forem corretamente inseridos no Banco de Dados
					header("Location: ../index.php?sec=cadastrar_ganho&erro_cadastro=sucess");

				} else {
					// Informa mensagem de erro caso os dados não forem corretamente inseridos no Banco de Dados
					header("Location: ../index.php?sec=cadastrar_ganho&erro_cadastro=failed");

				}
			}
		}

	// Se a Renda Fixa não for marcado será adicionado apenas uma vez
	} else {
		// Formatando a Data para o Padrão do BD
		$data = implode('-', array_reverse(explode('/', $date)));

		// Inserindo os dados
		$sql_cadastra_ganhos = "INSERT INTO cadastrar_ganhos (data, descricao, tipo_renda, valor, renda_fixa)
								VALUES ('$data', '$descricao', '$tipo_renda', '$valor', '$renda_fixa')";

		// Verificado erros
		if ( $data == "" || $descricao == "" || $tipo_renda == "" || $valor == "") {
				header("Location: ../index.php?sec=cadastrar_ganho&erro_cadastro=warnning");

		} else {
			// Caso nenhum dos campos estiver vazio ele faz insere os dados na tabelka do Banco de Dados
			if ( mysqli_query($conecta_bd, $sql_cadastra_ganhos) ) {
				// Informa mensagem de sucesso caso os dados forem corretamente inseridos no Banco de Dados
				header("Location: ../index.php?sec=cadastrar_ganho&erro_cadastro=sucess");

			} else {
				// Informa mensagem de erro caso os dados não forem corretamente inseridos no Banco de Dados
				header("Location: ../index.php?sec=cadastrar_ganho&erro_cadastro=failed");

			}
		}
	}
?>