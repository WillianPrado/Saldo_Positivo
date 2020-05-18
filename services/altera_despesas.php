<?php

	// Conectando banco de dadoos
	include("../bd/conecta_bd.php");

	// Pegando dados da página edita_despesa.php
	$id = $_POST['id'];
	$date = $_POST['data'];
	$descricao = $_POST['descricao_despesa'];
	$tipo_despesa = $_POST['tipo_despesa'];
	$tipo_pagamento = $_POST['tipo_pagamento'];
	$despesa_fixa = $_POST['despesa_fixa'];

	// Formatando data para inserção no banco de dados
	$data = implode('-', array_reverse(explode('/', $date)));

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

	echo $id;
	echo "<br>";
	echo $data;
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

	// Altera a tabela cadastrar_despesas
	$sql_altera_despes = "UPDATE cadastrar_despesas SET data = '$data', descricao = '$descricao', tipo_despesa = '$tipo_despesa', tipo_pagamento = '$tipo_pagamento', despesa_fixa = '$despesa_fixa' WHERE id = '$id'";

	// Altera a tabela pagamentos_a_vista
	$sql_altera_pg_vista = "UPDATE pagamentos_a_vista SET forma_pagamento = '$forma_pagamento_vista', valor_despesa = '$valor_despesa' WHERE id_cadastrar_despesas = '$id'";

	// Altera a tabela cartoes_avista
	$sql_altera_cartao_vista = "UPDATE cartoes_avista SET id_cadastrar_cartoes = '$cartao_pagamento_vista', WHERE id_cadastrar_despesas = '$id'";

?>