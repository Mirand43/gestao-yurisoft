<?php require_once "header.php"; ?>
<!--Formulario de cadastro de stock-->
<?php

//include "../dbconfig.php"; 

if (isset($_POST['btn-addstock'])){
  
  $produto= $_POST["produto"];
    $inicial= $_POST["inicial"];
  $actual= $_POST["inicial"]; 
  $preco= $_POST["preco"];
  $cadastro= $_POST["cadastro"];
  $alteracao= $_POST["cadastro"];
 

/*Enviar dados na base de dados*/
if($crud->CreateStock($produto, $inicial, $actual, $preco, $cadastro, $alteracao )){


echo "produto Adicionado";
}else{
echo " produto não adicionado";

}  

}

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">


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
                    <select class="form-control" name="produto">
                      <?php $crud-> ListProduto() ?>                    
                    </select>
                </div>
              </div>
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Quantidade</label>

                  <div class="col-sm-10">
                    <input type="number" name="inicial" class="form-control" id="inputPassword3" placeholder="Quantidade do produto" required >
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Preço</label>

                  <div class="col-sm-10">
                    <input type="number" name="preco" class="form-control" id="inputPassword3" placeholder="preço do produto" required >
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-10">
                    <input type="hidden" name="cadastro" class="form-control" value="<?php print( $crud->getdate()); ?>">
                  </div>
                </div>
     <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" name="btn-addstock">cadastrar</button>
                <a href="stock.php" class="btn btn-danger">Voltar</a>
              </div>
              <!-- /.box-footer -->
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



<?php include "rodape.php"; ?>