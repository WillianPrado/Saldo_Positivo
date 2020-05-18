<?php
    /*
      @Author: Jheymison Simões dos Santos
      @Data: 27/04/200
      @ Descrição:
          Esta é a página Dashboard, ela mostrara o resumo de saldos, ganhos e despesas para o usuário através de gráficos e tabelas.
          Página principal da aplicação.
    */

?>

<?php
	// Consultas no banco de dados
	// SELECT data, valor, SUM(valor) FROM cadastrar_ganhos WHERE data >= "2020-01-01" AND DATA <= "2020-01-31"

	// Conectando banco de dadoos
	include("bd/conecta_bd.php");

	// Mes de Janeiro
	$sql_janeiro = "SELECT SUM(valor) FROM cadastrar_ganhos WHERE data >= '2020-01-01' AND data <= '2020-01-31'";
	$sel_janeiro = $conecta_bd->query($sql_janeiro); // Roda SQL
	$mes_janeiro = $sel_janeiro->fetch_assoc();

	foreach($mes_janeiro as $mes_janeiro){
		$valor_janeiro = $mes_janeiro;
	}

	// Mes de Fevereiro
	$sql_fevereiro = "SELECT SUM(valor) FROM cadastrar_ganhos WHERE data >= '2020-02-01' AND data <= '2020-02-31'";
	$sel_fevereiro = $conecta_bd->query($sql_fevereiro); // Roda SQL
	$mes_fevereiro = $sel_fevereiro->fetch_assoc();

	foreach($mes_fevereiro as $mes_fevereiro){
		$valor_fevereiro = $mes_fevereiro;
	}

	// Mes de Março
	$sql_março = "SELECT SUM(valor) FROM cadastrar_ganhos WHERE data >= '2020-03-01' AND data <= '2020-03-31'";
	$sel_março = $conecta_bd->query($sql_março); // Roda SQL
	$mes_março = $sel_março->fetch_assoc();

	foreach($mes_março as $mes_março){
		$valor_março = $mes_março;
	}

	// Mes de Abril
	$sql_abril = "SELECT SUM(valor) FROM cadastrar_ganhos WHERE data >= '2020-04-01' AND data <= '2020-04-31'";
	$sel_abril = $conecta_bd->query($sql_abril); // Roda SQL
	$mes_abril = $sel_abril->fetch_assoc();

	foreach($mes_abril as $mes_abril){
		$valor_abril = $mes_abril;
	}

	// Mes de Maio
	$sql_maio = "SELECT SUM(valor) FROM cadastrar_ganhos WHERE data >= '2020-05-01' AND data <= '2020-05-31'";
	$sel_maio = $conecta_bd->query($sql_maio); // Roda SQL
	$mes_maio = $sel_maio->fetch_assoc();

	foreach($mes_maio as $mes_maio){
		$valor_maio = $mes_maio;
	}

?>

<!-- Input que envia os valores ao Javascript -->
<div hidden id="mes_janeiro"><?php echo $valor_janeiro . " <small>R$</small>"; ?></div>
<div hidden id="mes_fevereiro"><?php echo $valor_fevereiro . " <small>R$</small>"; ?></div>
<div hidden id="mes_marco"><?php echo $valor_março . " <small>R$</small>"; ?></div>
<div hidden id="mes_abril"><?php echo $valor_abril . " <small>R$</small>"; ?></div>
<div hidden id="mes_maio"><?php echo $valor_maio . " <small>R$</small>"; ?></div>



<div class="row d-flex justify-content-center" style="margin-bottom: 40px;">
	<div class="col-lg-5 col-md-6 col-sm-3 d-flex justify-content-center">
		<select id="meses" class="selectpicker" data-style="btn btn-success btn-round">
			<option value="1">Janeiro</option>
			<option value="2">Fevereiro</option>
			<option value="3">Março</option>
			<option value="4">Abril</option>
			<option value="5" selected>Maio</option>
			<option value="6">Junho</option>
			<option value="7">Julho</option>
			<option value="8">Agosto</option>
			<option value="9">Setembro</option>
			<option value="10">Outubro</option>
			<option value="11">Novembro</option>
			<option value="12">Dezembro</option>
		</select>
	</div>
</div>


<!-- Cards - Demostrativos de Valores -->
<div class="row" id="cardsValores">

	<!-- Card para Saldo Dinsponivel -->
	<!-- Retorna do banco de dados o valor disponovel depois de calcular todos os ganhos e despesas -->

	<div class="col-lg-4 col-md-6 col-sm-6 cardValInd">
		<div class="card card-stats">
			<div class="card-header card-header-success card-header-icon">
				<div class="card-icon">
					<i class="material-icons">attach_money</i>
				</div>
				<p class="card-category">Saldo Disponivel</p>
				<h3 class="card-title">0,00
					<small>R$</small>
				</h3>
			</div>
			<div class="card-footer">
				<div class="stats">
                    <i class="material-icons text-success">done</i> Parabéns - Saldo Positivo
                    <!-- <i class="material-icons text-danger">highlight_off</i> Economize - Saldo Negativo -->
                 </div>
			</div>
		</div>
    </div>

	<!-- Card de total de ganhos - receita -->
	<!-- Retorna do banco de dados o total de ganhos cadastrados -->

	<div class="col-lg-4 col-md-6 col-sm-6 cardValInd">
		<div class="card card-stats">
			<div class="card-header card-header-info card-header-icon">
				<div class="card-icon">
					<i class="material-icons">trending_up</i>
				</div>
				<p class="card-category">Total Ganhos</p>
				<h3 id="total_ganhos" class="card-title"><?php echo $valor_maio . " <small>R$</small>"; ?>
				</h3>
			</div>
			<div class="card-footer">
				<div class="stats">
					<i class="material-icons text-info">description</i>
					<a href="#">Visualizar Transações de Ganhos</a>
				</div>
			</div>
		</div>
    </div>

	<!-- Card de total de Despesas -->
	<!-- Retorna do banco de dados o total de despesas cadastrados -->
	
	<div class="col-lg-4 col-md-6 col-sm-6 cardValInd">
		<div class="card card-stats">
			<div class="card-header card-header-danger card-header-icon">
				<div class="card-icon">
					<i class="material-icons">trending_down</i>
				</div>
				<p class="card-category">Total Despesas</p>
				<h3 class="card-title">0,00
					<small>R$</small>
				</h3>
			</div>
			<div class="card-footer">
				<div class="stats">
					<i class="material-icons text-danger">clear_all</i>
					<a href="#">Visualizar Transações de Despesas</a>
				</div>
			</div>
		</div>
    </div>
</div>

<!-- Cards - Demonstrativos de Valores em Graficos -->

<div class="row" id="cardGrafico">
	<!-- Gráfico de Saldo -->
	<div class="col-md-4 cardValInd">
		<div class="card">
			<div class="card-header card-chart card-header-success">

				<!-- Mostra o Gráfico -->
				<div class="ct-chart chartSaldo" id=""></div>
				<script>
					var data = {

							labels: ['Seg', 'Ter', 'Qua', 'Qui', 'Sex'],

							series: [
								[5, 2, 4, 2, 0]
							]
						};

						new Chartist.Line('.chartSaldo', data);
				</script>

			</div>
			<div class="card-body" id="textoCard">
				<h4 class="card-title">Demonstrativo do Saldo</h4>
				
			</div>
			<div class="card-footer">
				<div class="stats">
					<i class="material-icons">access_time</i> Atualizado a 4 min atrás
				</div>
			</div>
		</div>
	</div>

	<!-- Gráfico de Ganhos -->
	<div class="col-md-4 cardValInd">
		<div class="card">
			<div class="card-header card-chart card-header-info">

				<!-- Mostra o Gráfico -->
				<div class="ct-chart chartGanhos" id="websiteViewsChart"></div>

				<!-- Define os valores dos gráficos -->
				<script>
					var data = {

							labels: ['Seg', 'Ter', 'Qua', 'Qui', 'Sex'],
							series: [
								[1, 2, 3, 4, 5]
							]
						};

						new Chartist.Bar('.chartGanhos', data);
				</script>

			</div>
			<div class="card-body" id="textoCard">
				<h4 class="card-title">Demonstrativo do Saldo</h4>
				
			</div>
			<div class="card-footer">
				<div class="stats">
					<i class="material-icons">access_time</i> Atualizado a 4 min atrás
				</div>
			</div>
		</div>
	</div>

	<!-- Gráfico de Despesas -->
	<div class="col-md-4 cardValInd">
		<div class="card">
			<div class="card-header card-chart card-header-danger">

				<!-- Mostra o Gráfico -->
				<div class="ct-chart chartDespesas" id=""></div>

				<!-- Define os valores dos fráficos -->
				<script>
					var data = {

							labels: ['Seg', 'Ter', 'Qua', 'Qui', 'Sex'],

							series: [
								[5, 5, 4, 2, 1]
							]
						};

						new Chartist.Line('.chartDespesas', data);
				</script>

			</div>
			<div class="card-body" id="textoCard">
				<h4 class="card-title">Demonstrativo de Despesas</h4>
				
			</div>
			<div class="card-footer">
				<div class="stats">
					<i class="material-icons">access_time</i> Atualizado a 4 min atrás
				</div>
			</div>
		</div>
	</div>

</div>


<!-- Cards de Tabelas, retorna os ultimos ganhos e despesas cadastradas -->
<div class="row" id="cardTable">

	<!-- Tabela de Ultimos ganhos cadastrados -->
	<div class="col-lg-6 col-md-12 cardValInd">
		<div class="card">
		    <div class="card-header card-header-info">
		        <h4 class="card-title text-center">Ultimos Ganhos</h4>
		        <p class="card-category text-center">Ganhos adicionados anteriormente</p>
		    </div>
		    <div class="card-body table-responsive">
		        <table class="table table-hover">
		            <thead class="text-success">
		                <tr>
		                    <th>Data</th>
		                    <th>Descrição</th>
		                    <th>Valor</th>
		                    <th>Tipo Renda</th>
		                </tr>
		            </thead>
		            <tbody>
		                <tr>
		                    <td>26/04/2020</td>
		                    <td>Formatação de PC</td>
		                    <td>R$ 80,00</td>
		                    <td>Renda Extra</td>
		                </tr>
		                <tr>
		                    <td>25/04/2020</td>
		                    <td>Limpeza de Disco</td>
		                    <td>R$ 0,00</td>
		                    <td>Renda Extra</td>
		                </tr>
		                <tr>
		                    <td>23/04/2020</td>
		                    <td>Férias do Serviço</td>
		                    <td>R$ 1.200,00</td>
		                    <td>Férias</td>
		                </tr>
		                <tr>
		                    <td>22/04/2020</td>
		                    <td>Meu Salário do Serviço</td>
		                    <td>R$ 1.200,00</td>
		                    <td>Salário</td>
		                </tr>
		            </tbody>
		        </table>
		    </div>
		</div>
	</div>

	<!-- Tabela de Ultimas despesas cadastradas -->
	<div class="col-lg-6 col-md-12">
		<div class="card">
		    <div class="card-header card-header-danger">
		        <h4 class="card-title text-center">Ultimas Despesas</h4>
		        <p class="card-category text-center">Despesas adicionados anteriormente</p>
		    </div>
		    <div class="card-body table-responsive">
		        <table class="table table-hover">
		            <thead class="text-warning">
		                <tr>
		                    <th>Data</th>
		                    <th>Descrição</th>
		                    <th>Valor</th>
		                    <th>Tipo Despesa</th>
		                </tr>
		            </thead>
		            <tbody>
		                <tr>
		                    <td>26/04/2020</td>
		                    <td>Cinema</td>
		                    <td>R$ 50,00</td>
		                    <td>Lazer</td>
		                </tr>
		                <tr>
		                    <td>25/04/2020</td>
		                    <td>Conta de Água</td>
		                    <td>R$ 90,00</td>
		                    <td>Moradia</td>
		                </tr>
		                <tr>
		                    <td>23/04/2020</td>
		                    <td>Conta de Energia</td>
		                    <td>R$ 200,00</td>
		                    <td>Moradia</td>
		                </tr>
		                <tr>
		                    <td>22/04/2020</td>
		                    <td>Concerto do Carro</td>
		                    <td>R$ 1.200,00</td>
		                    <td>Imprevista</td>
		                </tr>
		            </tbody>
		        </table>
		    </div>
		</div>
	</div>
</div>
	



