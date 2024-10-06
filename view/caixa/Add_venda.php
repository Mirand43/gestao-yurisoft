
<?php include "cabecalho.php"; ?>
<?php

include "../../dbconfig.php"; 
$total=$crud->  Totalcarrinho();
if (isset($_POST['btn-addcliente'])){
  $cliente = $_POST["cliente"];
  $funcionario = $_SESSION['id_utilizador'] ;
  $pago = $_POST["pago"];
  $total = $total+0;

/*Enviar dados na base de dados*/
//CreateVenda($data, $total, $pago, $troco, $cliente, $funcionario)

if($crud->CreateVenda( $total,  $pago, 0, $cliente, $funcionario)){

  //$total= 0;
//header('Location: factura2.php');
echo "Adicionado";

}else{

echo "Não adicionado";

}  

}

?>


<!-- Content Wrapper. Contains page content  -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Venda
        <small>Efectuar nova venda</small>
      </h1>
    </section>

<form class="form-horizontal" method="POST">
            <div class="col-md-11">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              
              <button type="submit" name="btn-addcliente" class="btn btn-info pull-right">Completar venda</button>
              <a href="factura2.php" class="btn btn-primary">Imprimir factura </a>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" >Cliente</label>

                  <div class="col-sm-4">
                    <select class="form-control select2" name="cliente">
                      <?php $crud-> ListCliente() ?>
                    </select>
                  </div>

                    <strong for="inputEmail13" class="col-sm-2 control-label">Total:</strong>
                    <small><?php print ($total); ?>,00 Akz</small>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Pago</label>

                  <div class="col-sm-4">
                    <input type="number" name="pago" class="form-control" id="pago" placeholder="Número de Identificação Fiscal" required >
                  </div>

                  <strong for="inputPassword3" class="col-sm-2 control-label">Troco</strong>

                    <small>0,00 Akz</small>
                  </div>

                  <!-- /.box-body -->
              <div class="box-footer">

              <div>
                <a href="stock.php" class="btn btn-info">Add Produto</a>
                <a href="Add_Cliente.php" class="btn btn-success">Novo Cliente</a>
            </div>
    
              <table class="table table-hover">
              <h3 class="box-title">Produtos a vender</h3>

                <table class="table table-hover table-striped">
                  <tbody>
                  <tr>
                    
                    <td>Código de Produto</td>
                    <td>Produto</td>
                    <td>Quantidade</td>
                    <td>Preço</td>
                    <td>Subtotal</td>
                                      
                  </tr>

                <?php 
                 ;
                     $total=0;
                   
                   ?><tr>  <?php
                   for ($i=0; $i < sizeof($_SESSION['carrinho']) ; $i++) { 
                     # code ...
                    $dado= $_SESSION['carrinho'][$i];
               
                    /* <tr>
                                 <th>Código de Produto</th>
                                 <th>Produto</th>
                                 <th>Qtd</th>
                                 <th>Preco</th>
                                 <th>Subtotal</th>
                                 <th>Acção</th>
                               </tr>*/
                     //array($idproduto,$produto, $qtd, $preco, $sub));
                    ?>
                    <td>  <?php print_r($dado[0]); ?> </td> 
                    <td>  <?php print_r($dado[1]); ?> </td> 
                    <td>  <?php print_r($dado[2]); ?> </td> 
                    <td>  <?php print_r($dado[3]); ?> </td> 
                    <td>  <?php print_r($dado[4]); ?> </td> 
               
                    
                    <?php
                   ?></tr>  <?php
               
                   $total+=$dado[4];
               
                   
                   }
                     
                 
                ?>
                  
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              
            </div>
          </div>
            <!-- /.box-body -->
          </div>

<?php include "rodape.php"; ?>