<?php
	// Conectando banco de dadoos
	include("../bd/conecta_bd.php");

	$id = $_POST['id'];
	echo $id;

	$sql_deleta = "DELETE FROM tipos_de_ganhos WHERE id='{$id}' ";

	if (mysqli_query($conecta_bd, $sql_deleta)) {
	    header("Location: ../index.php?sec=tipo_ganhos&erro_deletar=sucess");
	} else {
	    header("Location: ../index.php?sec=tipo_ganhos&erro_deletar=failed");
	}
?>