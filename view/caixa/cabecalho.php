<?php require_once "../../dbconfig.php"; ?>

<!DOCTYPE html>
<html lang="Pt">
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../../bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

</head>


<?php //include "cabecalho.php"; ?>
<?php //include "inicio.php"; ?>
<?php //include  "menu.php"; ?>


<?php 

session_start();
      if ( !isset( $_SESSION['username'])){
        header('Location: ../'); 

      }else if(session_status() == PHP_SESSION_ACTIVE) {
        //echo  ($_SESSION['username']." logado "); 
        if($_SESSION['id_tipo_utilizador']!=1)
       // print($_SESSION['id_tipo_utilizador']);
        header('Location: /gestao');
        //http://10.1.1.1/gestao/view/stock.php
}
else {
 header('Location: ../');

}
?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Y</b>S</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Yuri-</b>Soft</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../img/Avatar.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo  ($_SESSION['username']);  ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../img/Avatar.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo  ($_SESSION['username']);  ?>
                  <small><?php echo  ($crud-> getdate());?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="fecharlogin.php" class="btn btn-default btn-flat">Terminar sessão</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../img/Avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo  ($_SESSION['username']);  ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Yuri-Soft</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Produtos</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!--<li class="active"><a href="Add_Produto.php"><i class="fa fa-circle-o"></i> Cadastrar</a></li>-->
            <li><a href="stock.php"><i class="fa fa-circle-o"></i> Ver</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Vendas</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="Add_venda.php"><i class="fa fa-circle-o"></i> Nova</a></li>
            <li><a href="venda.php"><i class="fa fa-circle-o"></i> Ver</a></li>
          </ul>
        </li>
       <!-- <li>
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Clientes</span>
         <span class="pull-right-container">
              <small class="label pull-right bg-green">ver </small>
            </span>
          </a>
        </li>-->
       <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Clientes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="Add_cliente.php"><i class="fa fa-circle-o"></i> Adicionar</a></li>
            <li><a href="cliente.php"><i class="fa fa-circle-o"></i> Ver</a></li>
          </li>
          </ul>
        </li>
       <!-- <li class="treeview">
          <a href="#">s
            <i class="fa fa-laptop"></i>
            <span>Funcionários </span> 
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="Add_Funcionario.php"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
            <li><a href="funcionario.php"><i class="fa fa-circle-o"></i> Ver</a></li>
          </ul>
        </li>-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Relatórios </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="relvenda.php"><i class="fa fa-circle-o"></i> Vendas</a></li>
            <!--<li><a href="#"><i class="fa fa-circle-o"></i> Stock</a></li>-->
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>



