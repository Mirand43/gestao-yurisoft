

<?php include "cabecalho.php"; ?>
<!-- Content Wrapper. Contains page content  -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Vendas
        <small>Vendas efectuadas</small>
      </h1>
    </section>
    <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><a href="Add_venda.php" class="btn btn-primary">Nova venda</a></h3>

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
                  <th>Id venda</th>
                  <th>Data de venda</th>
                  <th>Cliente</th>
                  <th>Total</th>
                  <th>Pago</th>
                  <th>Troco</th>
                  <th>Vendedor</th>
                  <th>Acção</th>
                </tr>

                <tr>
                  <?php $crud-> ComboVenda(); ?>
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


