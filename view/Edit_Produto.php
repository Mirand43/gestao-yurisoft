<?php

include "../dbconfig.php";

$idproduto = $_GET["edit_id"];
$row = $crud->ComboProdutoporID($idproduto);

if (isset($_POST['btn-editproduto'])){
  $nome = $_POST["nome"];
  $codbarra = $_POST["cod"];
  $tipo = $_POST["tipo"];
  $fornecedor = $_POST["fornecedor"];



/*Enviar dados na base de dados*/
if($crud->UpdateProduto($idproduto, $nome, $codbarra, $tipo, $fornecedor )){


echo "Produto Inserido";
}else{
echo "Produto não Inserido";

}  

}

?>

<?php include "header.php"; ?>

<!-- Content Wrapper. Contains page content  -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Produto
        <small>Editar produto</small>
      </h1>
    </section>


<div class="col-md-11">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Editar os campos desejados</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" >Produto</label>

                  <div class="col-sm-10">
                    <input type="text" name="nome" value='<?php print($row['nome']); ?>' class="form-control" id="inputEmail3" placeholder="Nome do Produto" required >
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Código de barra</label>

                  <div class="col-sm-10">
                    <input type="number" name="cod" value='<?php print($row['codbarra']); ?>' class="form-control" id="inputPassword3" placeholder="Código de barra" required >
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label ">Tipo</label>

                  <div class="col-sm-4">
                <select class="form-control select2" name="tipo">
                  <?php $crud-> ComboTipoProduto() ?> 

                    <option selected="yes" value=<?php print($row['idtipoproduto']); ?>><?php print($row['tipodeproduto']); ?></option>
                </select>
                  </div>
                  
                  <label for="inputPassword3" class="col-sm-2 control-label ">Fornecedor</label>
                  <div class="col-sm-4">
                <select class="form-control select2" name="fornecedor">
                  <?php $crud-> ListFornecedor() ?>
                    <option selected="yes" value=<?php print($row['idfornecedor']); ?>><?php print($row['nomefornecedor']); ?></option>
                </select>
                </div>
                </div>

                <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right" name="btn-editproduto">Actualizar</button>
                 <a href="produto.php" class="btn btn-danger">Voltar</a>
              </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">

          <!-- small box -->
          
        <!-- ./col -->
      </div>
      <!-- /.row -->
      
          <div class="form-group">
            
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  
<!-- ./wrapper -->

                  </div>
                </div>


<?php include "rodape.php"; ?>