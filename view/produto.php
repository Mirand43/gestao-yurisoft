<?php  
//include_once '../dbconfig.php';

?>

<?php include "header.php"; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Produtos cadastrados
        <small></small>
      </h1>
    </section>
    <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><a href="Add_Produto.php" class="btn btn-primary">Add Produto</a></h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 350px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Código de barra</th>
                  <th>Produto</th>
                  <th>Tipo</th>
                  <th>Fornecedor</th>
                  <th>Acção</th>
                </tr>
                <tr>
                  <?php $crud-> ComboProduto() ?>
                </tr>
              </table>
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