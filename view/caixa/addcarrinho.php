<?php include "cabecalho.php"; ?>
<?php

$idstock = $_GET["edit_id"];
$row = $crud->ComboStockporID($idstock); 

if (isset($_POST['btn-addquat'])){
  $actual = $_POST["inicial"];
  $alteracao = $_POST["inicial"];


/*Enviar dados na base de dados */
if($crud->addcarrinho($idstock, $_GET["produtp"] , $actual, $_GET["preco"])){
echo "Quantidade Adicionada";

}else{
echo "Quantidade não acrescentada";

}  

}

?>




 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Stock
        <small>Aumentar a quantidade do produto</small>
      </h1>
    </section>
    <!-- /.row -->


<div class="col-md-11">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Quantidade a ser vendida</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
        <form method="POST">
          <div class="box-body">
            <fieldset>
              <div class="row">
              

              <!-- Quantidade inicial, preço e Data de cadastro -->

              <div class="col-xs-4">
                <label>Quantidade</label>
                <input type="number" name="inicial" class="form-control" placeholder="Quantidade a vender">
              </div>
              </div>

              <div class="row">
                <div class="col">
                  <!--Data de Cadastro -->
                  <input type="hidden" name="cadastro" class="form-control" value='<?php print($row['cadastro']); ?>'>
                </div>
              </div>

            <div class="box-footer">
              <button type="submit" class="btn btn-success" name="btn-addquat">Adicionar</button>
      		  <a href="stock.php" class="btn btn-danger">Voltar</a>   
            </div>

            </fieldset>  
          </div>
     </form>
</div>

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