<!-- 
	Pagina Cadastrar Despesa
	Está página faz o cadastro de  uma nova despesa

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

<!-- Inicio - Formulário -->
<form method="post" action="services/cadastra_despesa.php">

	<!-- Linha para data e descrição da Despesa -->
	<div class="row linha1">
		<!-- Inicio - Input que recebe a data
			 - Por padrão a data será o dia atual, porem o usuário poderá
			   inserir qualquer data que desejar digitando ou utilizando o 
			   calendário que irá aparecer assim que clicar no input
		 -->
		<div class="col-sm-3">
			<div class="input-group dates">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="material-icons">event_note</i>
					</span>
				</div>
				<label for="data" class="bmd-label-floating" style="
				padding-left: 55px;">Data *</label>
				
				<input id="data" type="text"  class="form-control" name="data">
				
			</div>
		</div>
		<!-- Fim - Input Data -->

		<!-- Inicio - Input Descrição da Despesa
			 - O usuário poderá adicionar a descrição da Despesa
			 		Ex: Futebol com os amigos
		 -->
		<div class="col-sm-8">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="material-icons">description</i>
					</span>
				</div>
				<label for="descricao_despesa" class="bmd-label-floating" style="
				padding-left: 55px;">Descrição da Despesa *</label>
				<input type="text" class="form-control" id="descricao_despesa" name="descricao_despesa">
			</div>
		</div>
		<!-- Fim - Input Descrição da Despesa -->
	</div>

	<!-- Linha para tipo de Despesa, valor recebido e se a Despesa é fixa ou não -->
	<div class="row linha2" style="margin-top: 30px; margin-left: 15px;">

		<!-- Inicio - Select Tipo de Despesa
			 - O usuário irá escolher entre os tipos disponiveis,
			   porem caso não tiver o tipo que ele deseja pode cadastrar um novo
			   clicando no link de cadastrar um novo tipo
		 -->
		<div class="col-sm-0" >
			<span class="input-group-text">
				<i class="material-icons">category</i>
			</span>
		</div>	
		<div class="col-sm-4">
			<div class="dropdown bootstrap-select form-control form-control-sm dropup ">
              	<select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1 tipo_despesa" name="tipo_despesa">

              		<!-- Retorna do Banco de Dados os Tipos de Despesas -->

	                <option>Tipo de Despesa *</option>

	               <?php
	                	include("bd/conecta_bd.php");
								
						// Seleciona a tabela cadastrar_ganhos
						$sql_tipo_despesas = "SELECT * FROM tipos_de_despesas ORDER BY tipo_despesa ASC";
						$sel = $conecta_bd->query($sql_tipo_despesas);
                	?>

		            <?php while ( $tipos = $sel->fetch_assoc() ) : ?>
		                <option value="<?php echo $tipos['tipo_despesa'] ?>"><?php echo $tipos['tipo_despesa'] ?></option>
		            <?php endwhile; ?>
	                
            	</select>
      		</div>
		</div>
		<!-- Fim -- Select tipo de Despesa -->
		
		<!-- Incio - Select Tipo de Pagamento -->
			<div class="col-sm-0" >
				<span class="input-group-text">
					<i class="material-icons">shop</i>
				</span>
			</div>	
			<div class="col-sm-4">
				<div class="dropdown bootstrap-select form-control form-control-sm dropup">
              	<select id="tipo_pagamento" class="form-control selectpicker" id="exampleFormControlSelect1" data-style="btn btn-link"   name="tipo_pagamento">
		                <option>Tipo de Pagamento*</option>
		                <option value="a_vista">A Vista</option>
		                <option value="parcelado">Parcelado</option>
	            	</select>
	      		</div>
			</div>
		<!-- Fim - Select Tipo Pagamento -->

		<!-- Incio - Checkbox de Despesa Fixa sim ou não 
			 - Caso selecionado será sim, assim será compudado este valor
			   mensalmente até que o usuário edite ou exclua este item
		-->
		<div class="col-sm-3" style="margin-top: 10px;">
			<div id="despesa_fixa"  class="form-check">
			    <label class="form-check-label">
			        <input class="form-check-input" type="checkbox" value="Sim" name="despesa_fixa">
			        	Despesa Fixa?
			        <span class="form-check-sign" value="Sim" name="despesa_fixa">
			            <span class="check" name="despesa_fixa"></span>
			        </span>
			    </label>
			</div>
		</div>
		<!-- Fim - Checkbox Despesa Fixa -->
	</div>

	<!-- Inicio - Linha para pagamento á vista -->
	<div class="row" id="mostra_linha_vista" style="margin-top: 25px; margin-left: 15px; display: none;">
		<div class="col-sm-0" >
			<span class="input-group-text">
				<i class="material-icons">attach_money</i>
			</span>
		</div>	
		<div class="col-sm-4">
			<div class="dropdown bootstrap-select form-control form-control-sm dropup ">
              	<select id="forma_pagamento_vista" class="form-control selectpicker" data-style="btn btn-link"  name="forma_pagamento_vista">
	                <option value="">Forma de Pagamento *</option>
	                <option value="dinheiro_vista">Dinheiro</option>
	                <option value="cartao_vista">Cartão</option>
	                <option value="transferencia_vista">Transferência</option>
	                <option value="deposito_vista">Depósito</option>
            	</select>
      		</div>
		</div>
		
		<div id="mostra_icone_vista" class="col-sm-0" style="display: none;">
			<span class="input-group-text">
				<i class="material-icons">payment</i>
			</span>
		</div>	
		<div id="mostra_cartao_vista" class="col-sm-4" style="display: none;">
			<div class="dropdown bootstrap-select form-control form-control-sm dropup ">
              	<select class="form-control selectpicker" data-style="btn btn-link" id="cartao_pagamento_vista" name="cartao_pagamento_vista">
	                <option value="">Cartão Utilizado *</option>
	                <!-- Retorna os Cartões Cadastrados do Banco de Dados -->
	                <?php
								
						// Seleciona a tabela cadastrar_cartoes
						$sql_cartoes = "SELECT * FROM cadastrar_cartoes ORDER BY titulo ASC";
						$sel_cartoes = $conecta_bd->query($sql_cartoes);
                	?>

		            <?php while ( $cartoes = $sel_cartoes->fetch_assoc() ) : ?>
		                <option value="<?php echo $cartoes['id'] ?>"><?php echo $cartoes['titulo'] ?></option>
		            <?php endwhile; ?>
            	</select>
      		</div>
		</div>

		<div class="col-sm-3">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="material-icons">monetization_on</i>
					</span>
				</div>
				<label for="valor_despesa" class="bmd-label-floating" style="
				padding-left: 55px;">Valor R$ 0,00*</label>
				<input type="text" class="form-control" id="valor_despesa" name="valor_despesa">
			</div>
		</div>
	</div>
	<!-- Fim - Linha pagamento á vista -->

	<!-- Linha para Pagamento Parcelado -->
	<div id="mostra_linha_parcelado" class="row" style="margin-top: 25px; margin-left: 15px; display: none;">
		<div class="col-sm-0" >
			<span class="input-group-text">
				<i class="material-icons">attach_money</i>
			</span>
		</div>	
		<div class="col-sm-5">
			<div class="dropdown bootstrap-select form-control form-control-sm dropup ">
              	<select id="forma_pagamento_parcelado" class="form-control selectpicker" data-style="btn btn-link"  name="forma_pagamento_parcelado">
	                <option value="tipo">Forma de Pagamento *</option>
	                <option value="cartao_parcelado">Cartão de Crédito</option>
	                <option value="boleto_parcelado">Boleto Bancário</option>
	                <option value="promissoria_parcelado">Notinha Promissória</option>
	                <option value="confianca_parcelado">Confiança</option>
            	</select>
      		</div>
		</div>

		<div id="mostra_icone_parcelado" class="col-sm-0" style="display: none;">
			<span class="input-group-text">
				<i class="material-icons">payment</i>
			</span>
		</div>	
		<div id="mostra_cartao_parcelado" class="col-sm-5" style="display: none;">
			<div class="dropdown bootstrap-select form-control form-control-sm dropup ">
              	<select class="form-control selectpicker" data-style="btn btn-link" id="cartao_pagamento_parcelado" name="cartao_pagamento_parcelado">
	                <option value="">Cartão Utilizado *</option>

	                <!-- Retorna os Cartões Cadastrados do Banco de Dados -->
	                <?php

						// Seleciona a tabela cadastrar_cartoes
						$sql_cartoes = "SELECT * FROM cadastrar_cartoes ORDER BY titulo ASC";
						$sel_cartoes = $conecta_bd->query($sql_cartoes);
                	?>

		            <?php while ( $cartoes = $sel_cartoes->fetch_assoc() ) : ?>
		                <option value="<?php echo $cartoes['id'] ?>"><?php echo $cartoes['titulo'] ?></option>
		            <?php endwhile; ?>

            	</select>
      		</div>
		</div>	
	</div>

	<div id="linha_parcelas_valor" class="row" style="margin-top: 25px; display: none;">
		<div class="col-sm-5">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="material-icons">monetization_on</i>
					</span>
				</div>
				<label for="qnt_parcelas" class="bmd-label-floating" style="
				padding-left: 55px;">Qnt Parcelas*</label>
				<input type="number" class="form-control" id="qnt_parcelas" name="qnt_parcelas">
			</div>
		</div>

		<div class="col-sm-5" style="margin-left: 15px;">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="material-icons">monetization_on</i>
					</span>
				</div>
				<label for="valor_parcelas" class="bmd-label-floating" style="
				padding-left: 55px;">Valor Parcela R$ 0,00*</label>
				<input type="text" class="form-control" id="valor_parcelas" name="valor_parcelas">
			</div>
		</div>
	</div>

	<!-- Inicio - Botões Salvar e Cancelar -->
	<div class="row" style="margin-top: 15px; margin-left: 15px;">

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

<!-- Esta div seve apenas para aparecer a borda que fica entre o formulário 
		e a tabela que mostrará os ultimos ganhos	
-->
<div id="espacoForm">
	
</div>
<!-- Fim espaço -->


<!-- Inicio - Tabela que mostra os ultimas despesas -->
<div class="row">
	<!-- Tabela de Ultimas Despesas adicionados -->
	<div class="col-lg-12 col-md-12">
		<div class="card">
		    <div class="card-header card-header-success">
		        <h4 class="card-title text-center">Ultimas Despesas Adicionadas</h4>
		    </div>
		    <div class="card-body table-responsive">
		        <table class="table table-hover">
		            <thead class="text-info text-center">
		                <tr>
		                    <th>Data</th>
		                    <th>Descrição</th>
		                    <th>Tipo Despesa</th>
		                    <th>Tipo Pagamento</th>
		                    <th>Fixa</th>
		                    
		                    <th>Valor</th>
		                    <th>Pagamento</th>
		                    <th>Ações</th>
		                </tr>
		            </thead>
		            <tbody class="text-center">
		            	<?php
		            		// Retorna do banco de dados os ultimas despesas adicionadas para exibir na tabela
							include("bd/conecta_bd.php");
							
							// Seleciona a tabela cadastrar_ganhos
							$sql_cadastrar_despesas = "SELECT * FROM cadastrar_despesas ORDER BY id DESC";
							$sel = $conecta_bd->query($sql_cadastrar_despesas);

							// Paginação - está area mostrará proximas páginas de ultimos ganhos
							$total_dados = $sel->num_rows;

							// Total de dados por página
							$registros = 5;

							// Retorno da página e inserção na URL (Por Padrão é página 1)
							$url_page = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

							// Quantidade de páginas
							$total_paginas = ceil($total_dados / $registros);

							// Página inicial
							$page_inicial = ($registros * $url_page) - $registros;

							// Página anterior
							$page_previous = $url_page - 1;

							// Próxima Página
							$page_next = $url_page + 1;

							// Ultima Página
							$page_las = $total_paginas - 1;

							// Alteração no sql_cadastrar_ganhos
							$sql = $sql_cadastrar_despesas . " LIMIT $page_inicial, $registros";
							$sel = $conecta_bd->query($sql);
		            	?>

		            	<!-- Percorre todos os dados adicionados na tabela do banco de dados e o retorna em cada linha -->
		            	<!-- Inicio - While -->
		            	<?php while ( $dados = $sel->fetch_assoc() ) : ?>

		            		<?php
		            			// Formatando data par ainserção no banco de dados
		            			$date = $dados['data'];
		            			$data = implode('/', array_reverse(explode('-', $date)));
		            			$id_dados = $dados['id'];
		            			// Pega valor das Tabelas pagamentos_a_vista e pagamentos_parcelados

		            		?>
			                <tr>
			                    <td><?php  echo $data ?></td>
			                    <td id="n_ultrapassa"><?php  echo $dados['descricao']?></td>
			                    <td><?php  echo $dados['tipo_despesa']?></td>
			                    <td><?php  echo $dados['tipo_pagamento']?></td>
			                    <td><?php  echo $dados['despesa_fixa']?></td>
			                    

			                    <!-- Retorna o Valor se For Pagamento A Vista -->
			                    <?php if ($dados['tipo_pagamento'] == "a_vista") : ?>
			                    	<?php
			                    	// Busca os dados nba tabela de pagamento a_vista
			                    		$sql_valor_despesa = "SELECT * FROM pagamentos_a_vista WHERE id_cadastrar_despesas = '$id_dados'";
			            				$sel_valor_despesa = $conecta_bd->query($sql_valor_despesa);
			                    	?>
			                    	<?php while ( $valor_vista = $sel_valor_despesa->fetch_assoc() ) : ?>

				                    	<td>R$ <?php echo $valor_vista['valor_despesa'] ?></td>
				                    	<td><?php echo $valor_vista['forma_pagamento'] ?></td>

				                	<?php endwhile; ?>

				                <!-- Retorna valor se for pagamento Parcelado -->
				                <?php else: ?>
				                	<?php
			                    	// Busca os dados nba tabela de pagamento parcelado
			                    		$sql_valor_parcela = "SELECT * FROM pagamentos_parcelados WHERE id_cadastrar_despesas = '$id_dados'";
			            				$sel_valor_parcela = $conecta_bd->query($sql_valor_parcela);
			                    	?>
			                    	<?php while ( $valor_parcela = $sel_valor_parcela->fetch_assoc() ) : ?>

				                    	<td>R$ <?php echo $valor_parcela['valor_parcela'] ?></td>
				                    	<td><?php echo $valor_parcela['forma_pagamento'] ?></td>

				                	<?php endwhile; ?>

			                    <?php endif; ?>

			                    <td class="td-actions text-center">
					                <a href="index.php?sec=edita_despesas&id=<?php echo $dados['id'] ?>">
					                	<button type="button" rel="tooltip" class="btn btn-success" title="Editar">
					                    	<i class="material-icons">edit</i>
					               		</button>
					                </a>
					                <a href="index.php?sec=deleta_despesas&id=<?php echo $dados['id'] ?>">
						                <button type="button" rel="tooltip" class="btn btn-danger" title="Deletar">
						                    <i class="material-icons">close</i>
						                </button>
					                </a>
					            </td>
			                </tr>
		                <?php endwhile; ?>
		                <!-- Fim - While -->
		            </tbody>
		        </table>
		    </div>
		</div>
	</div>
</div>
<!-- Fim Tabela Ultimas Depesas -->

<!-- Inicio - Paginação da Tabela caso o usuário deseje ver mais dados -->
<div class="row" style="margin-top: 20px;">
	<div class="col-sm">
		<nav aria-label="Page navigation example">
			<ul class="pagination justify-content-center alert-success">
				<li class="page-item">
					<a class="page-link" href="index.php?sec=cadastrar_despesa&pagina=<?=($total_paginas == 1)?$total_paginas = 1:$page_previous?>" title="Previous">
						<span class="material-icons">arrow_back_ios</span> 
					</a>
				</li>

				<!-- Gera os numeros das páginas em HTML -->
				<?php
					for ( $i = 1; $i <= 3; $i++ ) {
						$ativa = ($url_page == $i)? "active" : "";
						?>
							<li class="page-item <?php echo $ativa ?>">
								<a class="page-link" href="index.php?sec=cadastrar_despesa&pagina=<?php echo $i ?>">
									<?php echo $i?>
								</a>
							</li>
						<?php
					}
				?>
				<li class="page-item">
					<a class="page-link" href="index.php?sec=cadastrar_despesa&pagina=<?php echo $page_next ?>" title="Next">
						<span class="material-icons">arrow_forward_ios</span> 
					</a>
				</li>
			</ul>
		</nav>
	</div>
</div>
<!-- Fim - Páginação -->
