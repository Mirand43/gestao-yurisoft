<?php  
include_once '../dbconfig.php';

?>

<?php include "header.php"; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Fornecedor
        <small>ver detalhadamente</small>
      </h1>
    </section>
    <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><a href="Add_Fornecedor.php" class="btn btn-primary">Add Fornecedor</a></h3>

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
                  <th>NIF</th>
                  <th>Fornecedor</th>
                  <th>Local</th>
                  <th>Telefone</th>
                  <th>E-mail</th>
                  <th>Acção</th>
                </tr>
                <tr>
                  <?php $crud-> ComboFornecedor() ?>
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