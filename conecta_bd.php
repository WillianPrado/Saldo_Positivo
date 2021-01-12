<?php

// Definir fuso Horário
date_default_timezone_set("America/Sao_Paulo");

$conecta_bd = new mysqli("127.0.0.1", "root" ,"jM5v6YDOFLQAyjp0" , "bd_saldo_positivo");

mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');

if ($conecta_bd-> connect_error ) {
	die('Erro na conexao :' . $conecta_bd-> connect_error);
}

?>