<!-- 
	Pagina Cadastrar Tipos de Ganhos que será utilizado para adicionar um ganho
	Está página faz o cadastro de  um novo tipo de ganho

 -->

<?php
	//  Realiza a verificação de erro retornado pelo cadastra_tipo_ganhos
	//  Após verificado se os campos de preenchimento estão corretos
	//  Exibe mensagem de Sucesso e de Aviso
	//  Sucesso quando todos os requisitos forem atendidos
	//  Aviso quando algum campo não for preenchido corretamente
	
	// Erro ao cadastrar
	if (isset($_GET['erro_cadastro']) ) {

		$erro_cadastro = $_GET['erro_cadastro'];

		// Sucesso - Todos os requisitos foram aceitos
		if ($erro_cadastro == 'sucess') {
			$msg = 'Filme Adicionado com Sucesso';
			echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
					  <strong>SUCESSO</strong> Dados cadastrados!
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					 	  <span aria-hidden='true'>&times;</span>
					  </button>
				  </div>";
		} 
		// Warnning - algum campo com erro ou em branco
		if ( $erro_cadastro == 'warnning' ) {
			$msg = 'Aviso: revise todos os campos!';
			echo "<div class='alert alert-warning  alert-dismissible fade show' role='alert'>
					  <strong>AVISO</strong> Campo não preenchido!
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					 	  <span aria-hidden='true'>&times;</span>
					  </button>
				  </div>";  
		} 
		// Info - Dados já Cadastrados
		if ( $erro_cadastro == 'info' ) {
			$msg = 'Aviso: revise todos os campos!';
			echo "<div class='alert alert-info  alert-dismissible fade show' role='alert'>
					  <strong>AVISO</strong> Dados já cadastrados!
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					 	  <span aria-hidden='true'>&times;</span>
					  </button>
				  </div>";	  
		} 
		// Failed - Dados não adicionados ao banco de dados
		if ( $erro_cadastro == 'failed' ) {
			$msg = 'Dados não adicionado ao Banco de Dados';
			echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
					  <strong>ERRO</strong> Dados não adicionados!
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					 	  <span aria-hidden='true'>&times;</span>
					  </button>
				  </div>";
		}  
	}


	// Erro ao Alterar
	if (isset($_GET['erro_alterar']) ) {

		$erro_alterar = $_GET['erro_alterar'];

		// Sucesso - Todos os requisitos foram aceitos
		if ($erro_alterar == 'sucess') {
			$msg = 'Filme Adicionado com Sucesso';
			echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
					  <strong>SUCESSO</strong> Dados Alterados!
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					 	  <span aria-hidden='true'>&times;</span>
					  </button>
				  </div>";
		} 
		// Failed - Dados não adicionados ao banco de dados
		if ( $erro_alterar == 'failed' ) {
			$msg = 'Dados não adicionado ao Banco de Dados';
			echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
					  <strong>ERRO</strong> Dados não alterados!
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					 	  <span aria-hidden='true'>&times;</span>
					  </button>
				  </div>";
		}  
	}

	// Erro ao Deletar
	if (isset($_GET['erro_deletar']) ) {

		$erro_deletar = $_GET['erro_deletar'];

		// Sucesso - Todos os requisitos foram aceitos
		if ($erro_deletar == 'sucess') {
			$msg = 'Filme Adicionado com Sucesso';
			echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
					  <strong>SUCESSO</strong> Dados Deletados!
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					 	  <span aria-hidden='true'>&times;</span>
					  </button>
				  </div>";
		} 
		// Failed - Dados não adicionados ao banco de dados
		if ( $erro_deletar == 'failed' ) {
			$msg = 'Dados não adicionado ao Banco de Dados';
			echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
					  <strong>ERRO</strong> Dados não Deletados!
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					 	  <span aria-hidden='true'>&times;</span>
					  </button>
				  </div>";
		}  
	}
?>

<form method="post" action="services/cadastra_tipo_ganhos.php">
	<div class="row">
		<div class="col-sm-3">
			<div class="input-group dates">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="material-icons">event_note</i>
					</span>
				</div>
				<label for="tipo_ganho" class="bmd-label-floating" style="
				padding-left: 55px;">Tipo de Ganhos*</label>
				<input id="tipo_ganho" type="text"  class="form-control" name="tipo_ganho">
			</div>
		</div>
	</div>

	<div class="row" style="margin-top: 30px; margin-left: 15px;">
		<!-- Botão Salvar
			 - ao clicar em salvar ele pegará os dados inseridos e selecionados
			   e adicionárá ao Banco de dados
		 -->
		<div class="col-sm-0">
			<button type="submit" class="btn btn-primary btn-success">
			  	<i class="material-icons">save</i> Salvar
			</button>
		</div>

		<!-- Botão Cancelar 
			 - Ao clicar no botão cancelar ele retornará a página inicial Dashboard
		-->
		<div class="col-sm-0">
			<a href="index.php?sec=dashboard">
				<button type="button" class="btn btn-success">
				  	<i class="material-icons">cancel</i> Cancelar
				</button>
			</a>
		</div>
	</div>
</form>

<div id="espacoForm">
	
</div>

<form method="post">
<div class="row d-flex justify-content-center">
	<!-- Tabela de Ultimas Ganhos adicionados -->
	<div class="col-lg-6 col-md-6">
		<div class="card">
		    <div class="card-header card-header-success">
		        <h4 class="card-title text-center">Ultimas Ganhos Adicionados</h4>
		    </div>
		    <div class="card-body table-responsive">
		        <table class="table table-hover">
		            <thead class="text-info text-center">

		            	<?php
		            		// Retorna do banco de dados os ultimos ganhos adicionados para exibir na tabela
							include("bd/conecta_bd.php");
							
							// Seleciona a tabela cadastrar_ganhos
							$sql_cadastrar_tipo_ganhos = "SELECT * FROM tipos_de_ganhos ORDER BY tipo_ganho ASC";
							$sel = $conecta_bd->query($sql_cadastrar_tipo_ganhos);

		            	?>

		                <tr>
		                    <th>Tipo de Ganhos</th>
		                    <th>Ações</th>
		                </tr>
		            </thead>
		            <tbody class="text-center">
		                <?php while ( $tipos = $sel->fetch_assoc() ) : ?>
		                <tr>
		                    <td><?php echo $tipos['tipo_ganho'] ?></td>
		                    <td class="td-actions text-center">
				                <a href="index.php?sec=edita_tipo_ganhos&id=<?php echo $tipos['id'] ?>">
				                	<button type="button" rel="tooltip" class="btn btn-success" title="Editar">
				                    	<i class="material-icons">edit</i>
				               		</button>
				                </a>

				                <a href="index.php?sec=deleta_tipo_ganhos&id=<?php echo $tipos['id'] ?>">
					                <button type="button" name="deletar" type="button" rel="tooltip" class="btn btn-danger" title="Deletar">
					                    <i class="material-icons">close</i>
					                </button>
				           		</a>
				            </td>
		                </tr>
		                <?php endwhile; ?>
		            </tbody>
		        </table>
		    </div>
		</div>
	</div>
</div>
</form>