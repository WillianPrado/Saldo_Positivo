<?php

	// Conectando banco de dadoos
	include("../bd/conecta_bd.php");

	$id = $_POST['id'];
	echo $id;

	$sql_deleta = "DELETE FROM cadastrar_ganhos WHERE id='{$id}' ";
	echo $sql_deleta;

	if (mysqli_query($conecta_bd, $sql_deleta)) {
	    header("Location: ../index.php?sec=cadastrar_ganho&erro_deletar=sucess");
	} else {
	    header("Location: ../index.php?sec=cadastrar_ganho&erro_deletar=failed");
	}

?>