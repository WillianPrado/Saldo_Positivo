<?php

	// Conectando banco de dadoos
	include("../bd/conecta_bd.php");

	// Pegando dados da página cadastrar_despesa.php
	$date = $_POST['data'];
	$descricao = $_POST['descricao_despesa'];
	$tipo_despesa = $_POST['tipo_despesa'];
	$tipo_pagamento = $_POST['tipo_pagamento'];
	$despesa_fixa = $_POST['despesa_fixa'];

	// Caso renda Fixa esteja com Valor Vazio retorna a plavra Não
	if ( $despesa_fixa == "" || $despesa_fixa == null ) {
		$despesa_fixa	= "Não";
	} 


	// Se Tipo de Pagamento for a Vista ele pega somente os valores de A Vista
	if( $tipo_pagamento == "a_vista" ){
		$forma_pagamento_vista = $_POST['forma_pagamento_vista'];

		if( $forma_pagamento_vista == "cartao_vista"){
			$cartao_pagamento_vista = $_POST['cartao_pagamento_vista'];
		}

		$valor_despesa = $_POST['valor_despesa'];

	} elseif ( $tipo_pagamento == "parcelado" ) {
		$forma_pagamento_parcelado = $_POST['forma_pagamento_parcelado'];

		if ($forma_pagamento_parcelado == "cartao_parcelado") {
			$cartao_pagamento_parcelado = $_POST['cartao_pagamento_parcelado'];
		}
		
		$qnt_parcelas = $_POST['qnt_parcelas'];
		$valor_parcelas = $_POST['valor_parcelas'];
	}

	echo $date;
	echo "<br>";
	echo $descricao;
	echo "<br>";
	echo $tipo_despesa;
	echo "<br>";
	echo $tipo_pagamento;
	echo "<br>";
	echo $despesa_fixa;
	echo "<br>";
	echo $forma_pagamento_vista;
	echo "<br>";
	echo $cartao_pagamento_vista;
	echo "<br>";
	echo $valor_despesa;
	echo "<br>";
	echo $forma_pagamento_parcelado;
	echo "<br>";
	echo $cartao_pagamento_parcelado;
	echo "<br>";
	echo $qnt_parcelas;
	echo "<br>";
	echo $valor_parcelas;
	echo "<br>";


	// Se renda Fixa for marcado ele adicionará a renda por 12 Meses consecutivos
	if( $despesa_fixa == "Sim" ){
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
		    // Cadastrando na Tabela cadastrar_despesas
			$sql_cadastra_despesas = "INSERT INTO cadastrar_despesas (data, descricao, tipo_despesa, tipo_pagamento, despesa_fixa) VALUES ('$data', '$descricao', '$tipo_despesa', '$tipo_pagamento', '$despesa_fixa')";


			// Verificado erros
			if ( $data == "" || $descricao == "" || $tipo_despesa == "" || $tipo_pagamento == "") {
					header("Location: ../index.php?sec=cadastrar_despesa&erro_cadastro=warnning");

			} else {
				// Caso nenhum dos campos estiver vazio ele faz insere os dados na tabelka do Banco de Dados
				if ( mysqli_query($conecta_bd, $sql_cadastra_despesas) ) {
					// Informa mensagem de sucesso caso os dados forem corretamente inseridos no Banco de Dados
					header("Location: ../index.php?sec=cadastrar_despesa&erro_cadastro=sucess");

				} else {
					// Informa mensagem de erro caso os dados não forem corretamente inseridos no Banco de Dados
					header("Location: ../index.php?sec=cadastrar_despesa&erro_cadastro=failed");

				}
			}


			if( $tipo_pagamento == "a_vista" ){
				// Inicio - Pega o ID da ultima despesa Cadastrada

				$sql_ultima_depesa = "SELECT id FROM cadastrar_despesas ORDER BY id DESC LIMIT 1";

				$sel_ultima_despesa = $conecta_bd->query($sql_ultima_depesa);

				$id_ultima_despesa = $sel_ultima_despesa->fetch_assoc();

				foreach($id_ultima_despesa as $id_ultima_despesa){

					$id_despesa = $id_ultima_despesa;

				}

				echo $id_despesa;

				// Fim

				// Insere na Tabela pagamentos_a_vista
				$sql_pagamento_vista = "INSERT INTO pagamentos_a_vista (forma_pagamento, valor_despesa, id_cadastrar_despesas) VALUES ('$forma_pagamento_vista', '$valor_despesa', '$id_despesa')";
				// Faz a inserção dos dados no banco de dados
				$sel_pagamento_vista = $conecta_bd->query($sql_pagamento_vista);

				// Se o pagamento for realziado com ca~rtão insere na tabela cartoes_avista
				if( $forma_pagamento_vista == "cartao_vista" ){
					// Insere na tabela cartao_avista
					$sql_cartoes_vista = "INSERT INTO cartoes_avista (id_cadastrar_cartoes, id_cadastrar_despesas)
										VALUES ('$cartao_pagamento_vista','$id_despesa')";

					// Faz a inserção dos dados no banco de dados
					$sel_cartoes_vista = $conecta_bd->query($sql_cartoes_vista);
				}
			} else if ( $tipo_pagamento == "parcelado" ) {
				header("Location: ../index.php?sec=cadastrar_despesa&erro_cadastro=failed");
			}

		}
	} else {
		
		// Se for pagamento a vista insere dados na tabela pagamento_a_vista
		if( $tipo_pagamento == "a_vista" ){
			// Formatando a Data para o Padrão do BD
			$data = implode('-', array_reverse(explode('/', $date)));

			// Cadastrando na Tabela cadastrar_despesas
			$sql_cadastra_despesas = "INSERT INTO cadastrar_despesas (data, descricao, tipo_despesa, tipo_pagamento, despesa_fixa) VALUES ('$data', '$descricao', '$tipo_despesa', '$tipo_pagamento', '$despesa_fixa')";

			// Verificado erros
			if ( $data == "" || $descricao == "" || $tipo_despesa == "" || $tipo_pagamento == "") {
					header("Location: ../index.php?sec=cadastrar_despesa&erro_cadastro=warnning");

			} else {
				// Caso nenhum dos campos estiver vazio ele faz insere os dados na tabelka do Banco de Dados
				if ( mysqli_query($conecta_bd, $sql_cadastra_despesas) ) {
					// Informa mensagem de sucesso caso os dados forem corretamente inseridos no Banco de Dados
					header("Location: ../index.php?sec=cadastrar_despesa&erro_cadastro=sucess");

				} else {
					// Informa mensagem de erro caso os dados não forem corretamente inseridos no Banco de Dados
					header("Location: ../index.php?sec=cadastrar_despesa&erro_cadastro=failed");

				}
			}

			// Inicio - Pega o ID da ultima despesa Cadastrada

			$sql_ultima_depesa = "SELECT id FROM cadastrar_despesas ORDER BY id DESC LIMIT 1";

			$sel_ultima_despesa = $conecta_bd->query($sql_ultima_depesa);

			$id_ultima_despesa = $sel_ultima_despesa->fetch_assoc();

			foreach($id_ultima_despesa as $id_ultima_despesa){

				$id_despesa = $id_ultima_despesa;

			}

			echo $id_despesa;

			// Fim

			// Insere na Tabela pagamentos_a_vista
			$sql_pagamento_vista = "INSERT INTO pagamentos_a_vista (forma_pagamento, valor_despesa, id_cadastrar_despesas) VALUES ('$forma_pagamento_vista', '$valor_despesa', '$id_despesa')";
			// Faz a inserção dos dados no banco de dados
			$sel_pagamento_vista = $conecta_bd->query($sql_pagamento_vista);

			// Se o pagamento for realziado com ca~rtão insere na tabela cartoes_avista
			if( $forma_pagamento_vista == "cartao_vista" ){
				// Insere na tabela cartao_avista
				$sql_cartoes_vista = "INSERT INTO cartoes_avista (id_cadastrar_cartoes, id_cadastrar_despesas)
									VALUES ('$cartao_pagamento_vista','$id_despesa')";

				// Faz a inserção dos dados no banco de dados
				$sel_cartoes_vista = $conecta_bd->query($sql_cartoes_vista);
			}

			
		} else if ( $tipo_pagamento == "parcelado" ){

			$dataExplode = explode("/", $date);
			
			$dia = $dataExplode[0];
			$mes = $dataExplode[1];
			$ano = $dataExplode[2];

			$ul_dia = $dia;

			for ($i = 1; $i <= $qnt_parcelas; $i++) {

				if($mes > 12){
					$mes = 1;
					$ano = $ano + 1;
				}

				if( $mes == 2 && $dia > 28){
					$dia = 28;
				} else {
					$dia = $ul_dia;
				}

				$data = date("Y-m-d", mktime(0, 0, 0, $mes, $dia, $ano));

				$sql_cadastra_despesas = "INSERT INTO cadastrar_despesas (data, descricao, tipo_despesa, tipo_pagamento, despesa_fixa) VALUES ('$data', '$descricao', '$tipo_despesa', '$tipo_pagamento', '$despesa_fixa')";

				// Verificado erros
				if ( $data == "" || $descricao == "" || $tipo_despesa == "" || $tipo_pagamento == "" ) {
						header("Location: ../index.php?sec=cadastrar_despesa&erro_cadastro=warnning");

				} else {
					// Caso nenhum dos campos estiver vazio ele faz insere os dados na tabelka do Banco de Dados
					if ( mysqli_query($conecta_bd, $sql_cadastra_despesas) ) {
						// Informa mensagem de sucesso caso os dados forem corretamente inseridos no Banco de Dados
						header("Location: ../index.php?sec=cadastrar_despesa&erro_cadastro=sucess");

					} else {
						// Informa mensagem de erro caso os dados não forem corretamente inseridos no Banco de Dados
						header("Location: ../index.php?sec=cadastrar_despesa&erro_cadastro=failed");

					}
				}

				// Se o pagamento for realziado com cartão insere na tabela cartoes_parcelado
				if( $forma_pagamento_parcelado == "cartao_parcelado" ){
					
					// Inicio - Pega o ID da ultima despesa Cadastrada
					$sql_ultima_depesa = "SELECT id FROM cadastrar_despesas ORDER BY id DESC LIMIT 1";

					$sel_ultima_despesa = $conecta_bd->query($sql_ultima_depesa);

					$id_ultima_despesa = $sel_ultima_despesa->fetch_assoc();

					foreach($id_ultima_despesa as $id_ultima_despesa){

						$id_despesa = $id_ultima_despesa;

					}

					// Insere na tabela cartao_parcelado
					$sql_cartoes_parcelado = "INSERT INTO cartoes_parcelados (id_cadastrar_cartoes, id_cadastrar_despesas)
										VALUES ('$cartao_pagamento_parcelado','$id_despesa')";

					// Faz a inserção dos dados no banco de dados
					$sel_cartoes_parcelado = $conecta_bd->query($sql_cartoes_parcelado);
				}

				// Inicio - Pega o ID da ultima despesa Cadastrada
				$sql_ultima_depesa = "SELECT id FROM cadastrar_despesas ORDER BY id DESC LIMIT 1";

				$sel_ultima_despesa = $conecta_bd->query($sql_ultima_depesa);

				$id_ultima_despesa = $sel_ultima_despesa->fetch_assoc();

				foreach($id_ultima_despesa as $id_ultima_despesa){

					$id_despesa = $id_ultima_despesa;

				}							

				$sql_pagamento_parcelado = "INSERT INTO pagamentos_parcelados (forma_pagamento, qnt_parcelas, valor_parcela, id_cadastrar_despesas)	VALUES ('$forma_pagamento_parcelado', '$qnt_parcelas', '$valor_parcelas', '$id_despesa')";
				
				$conecta_bd->query($sql_pagamento_parcelado);

				$mes = $mes + 1;
			}
		}
	}

?>