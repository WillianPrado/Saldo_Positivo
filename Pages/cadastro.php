<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="/css/all.min.css">
	<link rel="stylesheet"  href="cadastro.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<body>
	    <?php
    if (isset($_GET['feedback']) ) {

	$feedback = $_GET['feedback'];

	if ($feedback == 'adicionado') {

		$msg = '<div class="alert alert-success" role="alert">
 					Usuario Adicionado com sucesso!
				</div>';
	
	}
	echo $msg;
	
}
?>
	<div class="login-box">
		<h2>Cadastrar</h2>
		<form action="services/addUsuario.php" method="post" >


		<div class="textbox">
			<i class="fa fa-user fa2x cust" aria-hidden="true"></i>

			<input type="text" placeholder="   Nome" name=" nome" value="">
	
		</div>
       <i class="fa fa-user-o fa2x cust" aria-hidden="true"></i>

		<div class="textbox">
			<input type="text" placeholder="   Usuário" name="usuario" value="">

		</div>
	    <i class="fa fa-envelope cust" aria-hidden="true"></i>

		<div class="textbox">
			<input type="text" placeholder="   Email" name="email" value="">

		</div>
		<i class="fa fa-lock fa3x cust" aria-hidden="true"></i>


		<div class="textbox">
			<input type="password" placeholder="  Senha" name="senha"  value="">
		</div>

		<input class="btn" type="submit" value="Cadastrar">
		

		</form>
	</div>

</body>
</head>

</html>