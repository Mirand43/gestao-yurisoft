<?php

include "../dbconfig.php"; 


if (isset($_POST['btn-addproduto'])){
  $nome = $_POST["nome"];
  $codbarra = $_POST["cod"];
  $tipo = $_POST["tipo"];
  $fornecedor = $_POST["fornecedor"];



/*Enviar dados na base de dados*/
if($crud->CreateProduto($nome, $codbarra, $tipo, $fornecedor )){


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
        <small>Cadastro de produtos</small>
      </h1>
    </section>


            <div class="col-md-11">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Preencha os campos</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" >Produto</label>

                  <div class="col-sm-10">
                    <input type="text" name="nome" class="form-control" id="inputEmail3" placeholder="Nome do Produto" required >
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Código de barra</label>

                  <div class="col-sm-10">
                    <input type="number" name="cod" class="form-control" id="inputPassword3" placeholder="Código de barra" required >
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label ">Tipo</label>

                  <div class="col-sm-4">
                <select class="form-control select2" name="tipo" required >
                  <?php $crud-> ComboTipoProduto() ?>
                </select>
                  </div>
                  
                  <label for="inputPassword3" class="col-sm-2 control-label ">Fornecedor</label>
                  <div class="col-sm-4">
                <select class="form-control select2" name="fornecedor" required >
                  <?php $crud-> ListFornecedor() ?>
                </select>
                </div>
                </div>
                   <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" name="btn-addproduto">cadastrar</button>
                <a href="produto.php" class="btn btn-danger">Voltar</a>
              </div>
              <!-- /.box-footer -->
        
                  </div>
                </div>
              </div>
        </div>


<?php include "rodape.php"; ?>
             
           