<?php require_once "../../dbconfig.php"; 

$idvenda = $_GET["edit_id"];
$row = $crud->ComboVendaporID($idvenda);



?>


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

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Yuri-Soft</title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <img src="../../img/logo.png" class="image-circle" alt="YuriSoft" width="60px">Yuri-Soft
          <small class="pull-right">Data: <?php print( $crud->getdate()); ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        
        <address>
          <strong>Yuri-</strong>Soft<br>
          Distrito da maianga Avenida rocha pinto<br>
          Rua da praça do campo<br>
          <strong>Contacto:</strong> +244 123-5432<br>
          <strong>E-mail:</strong> yurisoft@gmail.com<br>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        Cliente
        <address>
          <strong>Nome:</strong> <?php print ($row['nome']);?><br>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Factura nº # <?php print ($row['idvenda']);?></b><br>
        <br>
        <b>Data de pagamento:</b> <?php print ($row['datavenda']);?><br>
        
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>


          <tr> 
            <th>Codigo</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Preco Unitario</th>
            <th>sub-total</th>
          </tr>
          </thead>
          <tbody>

            <tr>
            <td><?php print($row['idstock']); ?></td>
            <td><?php print($row['descricao']); ?></td>
            <td><?php print($row['quantidade']); ?></td>
            <td><?php print($row['preco']); ?>,00 Akw</td>
            <td><?php print($row['total']); ?></td>
            </tr>

         
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
        <p class="lead">Formas de pagamento:</p>
        <img src="../../img/atlantico.jpg" alt="Banco Atlântico" width="50px">
        <img src="../../img/bic.jpg" alt="Banco BIC" width="60px">
        <img src="../../img/bai.jpg" alt="Banco BAI" width="50px">
        <img src="../../img/bfa.jpg" alt="Banco BFA" width="60px">

        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
         0000 2232 3456 0100, 1120 3550 3300 3000, 1120 3550 3300 3000.
        </p>
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
        <p class="lead">Data</p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Total:</th>
              <td><?php print ($row['total']);?> Kz</td>
            </tr>
            <tr>
          
            <tr>
              <th>Troco:</th>
              <td><?php print ($row['troco']);?> Kz</td>
            </tr>

            <tr>
              <th><strong>Operador:</strong> <?php print ($row['funcionario']);?></th>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
