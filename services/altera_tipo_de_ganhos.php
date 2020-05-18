<?php
	// Conectando banco de dadoos
	include("../bd/conecta_bd.php");

	// Pegando dados da página estita_tipo_de_ganhos
	$id = $_POST['id'];
	$tipo_ganhos = $_POST['tipo_ganho'];

	$sql = "UPDATE tipos_de_ganhos SET tipo_ganho = '$tipo_ganhos' WHERE id = '$id'";

	if (empty($tipo_ganhos) || $tipo_ganhos == "") {
		header("Location: ../index.php?sec=edita_tipo_ganhos&id=$id&erro_alterar=warnning");
	} else {
		if (mysqli_query($conecta_bd, $sql)) {
		    header("Location: ../index.php?sec=tipo_ganhos&erro_alterar=sucess");
		} else {
		    header("Location: ../index.php?sec=tipo_ganhos&erro_alterar=failed");
		}
	}
?>