<?php
    /*
      @Author: Jheymison Simões dos Santos
      @Data: 27/04/200
      @ Descrição:
          Este é o Layout Base de toda a aplicação, é por este layou que consiguirá acesso as outras páginas
    */
?>

<!doctype html>
<html>
<head>
    <title>Saldo Positivo</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- Material Kit CSS -->
    <link href="assets/css/material-dashboard2.min.css" rel="stylesheet" />

    <link href="assets/css/material-dashboard.min.css" rel="stylesheet" />
    

    <link href="assets/demo/demo.css" rel="stylesheet" />

    <!-- Importando CSS dos Gráficos -->
    <link rel="stylesheet" type="text/css" href="chartist/chartist.min.css">

    <!-- Importando Scripts dos Gráficos -->
    <script type="text/javascript" src="chartist/chartist.min.js"></script>

    <!-- Importando meu CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/docsearch.js/2/docsearch.min.css" />
    <link rel="stylesheet" href="assets/demo/docs.min.css">

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script> -->
<!-- 
    <link href="assets/css/bootstrap-datepicker.css" rel="stylesheet"/>
    <script src="assets/js/bootstrap-datepicker.js"></script>  -->
    <!-- <script src="assets/js/bootstrap-datepicker.pt-BR.min.js" charset="UTF-8"></script> -->

</head>


<body>
  <div class="wrapper ">
      <div class="sidebar" data-color="green" data-background-color="white">
          <!--
          Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

          Tip 2: you can also add an image using data-image tag
          -->
          <?php

              /*
                  @isset(): Verifica se a Seção na Página
                      Caso sim:
                            Verifica qual a seção e da um titulo para elas
                            @Var: pageInfo: tipo String, retorna a página atual;
                                  É utilizado nos links do menu, para deixa-los ativados quando a página atual estiver sendo usada
                            @Var: pageFormat: tipo String, verifica qual á pagina atual e da um titulo á ela
              */

              if(isset($_GET['sec'])){
                  $pageInfo = $_GET['sec'];
                  if($pageInfo == "dashboard"){
                      $pageFormat = "Dashboard";
                  } elseif ($pageInfo == "cadastrar_ganho") {
                      $pageFormat = "Cadastrar Ganho";
                  } elseif($pageInfo == "edita_ganhos"){
                      $pageFormat = "Editar Ganhos";
                  } elseif($pageInfo == "deleta_ganhos"){
                      $pageFormat = "Deletar Ganho";
                  } elseif($pageInfo == "cadastrar_despesa"){
                      $pageFormat = "Cadastrar Despesas";
                  } elseif($pageInfo == "edita_despesas"){
                      $pageFormat = "Editar Despesas";
                  } elseif($pageInfo == "vizualizar_transacoes"){
                      $pageFormat = "Visualizar Transações";
                  } elseif($pageInfo == "tipo_ganhos"){
                      $pageFormat = "Cadastrar Tipos de Ganhos";
                  } elseif($pageInfo == "tipo_despesas"){
                      $pageFormat = "Cadastrar Tipos de Despesas";
                  } elseif($pageInfo == "edita_tipo_ganhos"){
                      $pageFormat = "Alterar Tipos de Ganhos";
                  } elseif($pageInfo == "deleta_tipo_ganhos"){
                      $pageFormat = "Deletar Tipo";
                  } elseif($pageInfo == "edita_tipo_despesas"){
                      $pageFormat = "Alterar Tipos de Despesa";
                  } elseif($pageInfo == "deleta_tipo_despesas"){
                      $pageFormat = "Deletar Tipo";
                  }
              } else {
                  $pageFormat = "Dashboard";
                  $pageInfo ="dashboard";
              }
          ?>

          <div class="logo">
              <!-- Logo do Site -->
              <a href="index.php?sec=dashboard">
                <img id="logoSite" src="assets/img/logo.png">
              </a>

          </div>
          <div class="sidebar-wrapper">
              <ul class="nav">
                  <!-- Utilização do $pageInfo para manter o link em active -->
                  <li class="nav-item <?=($pageInfo == 'dashboard')?'active':''?>">
                      <a class="nav-link" href="index.php?sec=dashboard">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                      </a>
                  </li>
                  <!-- Utilização do $pageInfo para manter o link em active -->
                  <li class="nav-item dropdown <?=($pageInfo == 'cadastrar_ganho' || $pageInfo == 'cadastrar_despesa')?'active':''?>">
                      <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="material-icons">add</i>
                          <p>Novo</p>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <a class="dropdown-item nav-link" href="index.php?sec=cadastrar_ganho">
                              <i class="material-icons">attach_money</i>
                              Novo Ganho
                          </a>
                          <a class="dropdown-item nav-link" href="index.php?sec=cadastrar_despesa">
                              <i class="material-icons">account_balance_wallet</i>
                              Nova Despesa
                          </a>
                          <a class="dropdown-item nav-link" href="#">
                              <i class="material-icons">credit_card</i>
                              Nova Cartão
                          </a>
                      </div>
                  </li>

                  <!-- Utilização do $pageInfo para manter o link em active -->
                  <li class="nav-item <?=($pageInfo == 'vizualizar_transacoes')?'active':''?>" >
                      <a class="nav-link" href="index.php?sec=vizualizar_transacoes">
                        <i class="material-icons">assessment</i>
                        <p>Transações</p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link" href="#0">
                        <i class="material-icons">trending_up</i>
                        <p>Metas / Objetivos</p>
                      </a>
                  </li>

                  <li class="nav-item dropdown">
                      <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">assignment</i>
                        <p>Relatórios</p>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <a class="dropdown-item nav-link" href="#">
                              <i class="material-icons">attach_money</i>
                              Ganhos
                          </a>
                          <a class="dropdown-item nav-link" href="#">
                              <i class="material-icons">account_balance_wallet</i>
                              Despesas
                          </a>
                          <a class="dropdown-item nav-link" href="#">
                              <i class="material-icons">credit_card</i>
                              Tipo de Pagamento
                          </a>
                      </div>
                  </li>

                  <li class="nav-item dropdown <?=($pageInfo == 'tipo_ganhos' || $pageInfo == 'tipo_despesas')?'active':''?>">
                      <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">category</i>
                        <p>Categorias</p>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <a class="dropdown-item nav-link" href="index.php?sec=tipo_ganhos">
                              <i class="material-icons">attach_money</i>
                              Tipo de Ganhos
                          </a>
                          <a class="dropdown-item nav-link" href="index.php?sec=tipo_despesas">
                              <i class="material-icons">account_balance_wallet</i>
                              Tipo de Despesas
                          </a>
                      </div>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link" href="#0">
                        <i class="material-icons">perm_identity</i>
                        <p>Visualizar Perfil</p>
                      </a>
                  </li>


              </ul>
          </div>
          }
      </div>
      <div class="main-panel">
          <!-- Navbar -->
          <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
              <div class="container-fluid">
                  <div class="navbar-wrapper">
                      
                      <!-- $pageFormat: retorna o titulo da página -->
                      <h1><?php echo $pageFormat ?><h1>
                  </div>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="navbar-toggler-icon icon-bar"></span>
                      <span class="navbar-toggler-icon icon-bar"></span>
                      <span class="navbar-toggler-icon icon-bar"></span>
                  </button>
                  <div class="collapse navbar-collapse justify-content-end">
                      <ul class="navbar-nav">
                          <li class="nav-item">
                              <!-- <a class="nav-link" href="javascript:;">
                                  <i class="material-icons">notifications</i>
                                  Perfil
                              </a> -->
                              <div class="card">
                                  <div class="card-body">
                                      <div class="row">
                                          <div class="col">
                                              <div class="dropdown nomePerfil">
                                                  <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Jheymison
                                                  </a>
                                                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                      <a class="dropdown-item " href="#">
                                                          <i class="material-icons">perm_identity</i>
                                                          Perfil
                                                      </a>
                                                      <a class="dropdown-item " href="#">
                                                          <i class="material-icons">clear</i>
                                                          Logout
                                                      </a>
                                                  </div>
                                              </div>   
                                          </div>
                                          <div class="col">
                                              <img class="card imgPerfil" src="assets/img/img-perfil.png" rel="nofollow" alt="Card image cap">
                                          </div>
                                      </div>
                                             
                                  </div>
                              </div>
                          </li>
                          <!-- your navbar here -->
                      </ul>
                  </div>
              </div>
          </nav>
          <!-- End Navbar -->

          <!-- Páginas vão aqui -->
          <div class="content">
              <div class="container-fluid">
                  <?php
                      /*  
                          Esta parte verifica qual página será incerida no layou;
                          Quando clicado em algum menu, retornará a pagina solicitada

                          @Var isset: verifica se á páginas;
                          @Var secoes: instaciamento das páginas criadas;
                          @Var sec: recebe as páginas criadas;
                          @in_array: verifica as páginas e as jogam na url, caso não exista a página solicitada retorna a página principal.
                      */

                      if (isset($_GET['sec'])) {
                            # code...
                            // seçoes aceitaveis para inclusao
                            $secoes = ['cadastrar_ganho', 'edita_ganhos', 'deleta_ganhos', 'cadastrar_despesa', 'edita_despesas', 'vizualizar_transacoes', 'tipo_ganhos', 'tipo_despesas', 'edita_tipo_ganhos', 'deleta_tipo_ganhos', 'edita_tipo_despesas', 'deleta_tipo_despesas', ];
                            $sec = $_GET['sec'];

                          if (in_array($sec, $secoes)) { //existe esta secao
                              include("pages/" . $sec . ".php");
                          }else{ // nao existe
                              include("pages/dashboard.php");
                          }
                      }else {
                          include('./pages/dashboard.php');
                      }
                  ?>
              </div>
          </div>

          <!-- Rodapé -->
          <footer class="footer">
              <div class="container-fluid">
                  
                  <!-- your footer here -->
              </div>
          </footer>
      </div>
  </div>

  

  <!-- Importando Javascript -->

  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <!-- <script src="assets/js/plugins/bootstrap-datetimepicker.min.js"></script> -->
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Chartist JS -->
  <script src="assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.min.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>

<!--   <script src="assets/js/bootstrap-datepicker.min.js"></script> 
  <script src="assets/js/bootstrap-datepicker.min.js"></script> 
  <script src="assets/js/bootstrap-datepicker.pt-BR.min.js" charset="UTF-8"></script> -->

  <!-- Importando meu Js -->
  <script src="assets/js/script.js"></script>
</html>