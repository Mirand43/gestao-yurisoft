<?php

include "dbconfig.php"; 

$falha="nulo";
if (isset($_POST['btn-entrar'])){

	$nome = $_POST['nome'];
	$senha = $_POST['senha'];

	if ($crud->loginuser($nome, $senha)){
		header('Location: view/admin.php');
    //cho $_SESSION['username']; 
    $falha="Nao";
	}
	else{
    $falha="sim";
		echo "Nome de Usuário ou Senha errada";
	}
 } 

?>

<!DOCTYPE html>
<html lang="Pt">
<head>
	<title>Sistema de Gestão</title>
	<meta charset="utf-8">
      <link href="img/logo.png" rel="icon">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">


</head>
<body class="hold-transition login-page">




	<div class="login-box">
  <div class="login-logo">
   <b>Yuri-</b>Soft</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Iniciar sessão</p>

    <form method="POST">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="nome" placeholder="Nome de usuário">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="senha" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
     
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="btn-entrar">Iniciar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


  </div>
  <!-- /.login-box-body -->
</div>


<!--
<header class="btn-dark">
	<center><h2>Sistema de gestão de vendas da Yuri-Soft</h2></center>
</header>

<form method="POST">
	<div class="container">
		<fieldset>
			<legend>Login</legend>
			<div class="row form-group">
			<div class="col-sm-3">
				<img src="img/avatar1.png" width="270px">
			</div>
			
			<div class="col">
			<label>Usuário</label>
			<input type="text" name="nome" class="form-control col-sm-4">

			<label>Senha</label>
			<input type="password" name="senha" class="form-control col-sm-4">
			<div style="margin-top: 8px;">
				
			<button type="submit" class="btn btn-primary" name="btn-entrar">Entrar</button>
			
			</div>
			</div>
			</div>
		</fieldset>

	</div>
</form>
--!>

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>