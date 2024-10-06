<?php 
include "../dbconfig.php";
//mostrando informações da base de dados
?>

<?php include "header.php"; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Funcionários
        <small>Cadastrados</small>
      </h1>
    </section>
    <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><a href="Add_Funcionario.php" class="btn btn-primary">Add Funcionário</a></h3>

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
                  <th>Nome do Funcionário</th>
                  <th>Nacionalidade</th>
                  <th>Naturalidade</th>
                  <th>Nº de BI/Passport</th>
                  <th>Endereço</th>
                  <th>Telefone</th>
                  <th>Data de nascimento</th>
                  <th>Sexo</th>
                  <th>Perfil</th>
                  <th>accão</th>
                </tr>
                <tr>
                  <?php $crud-> ComboFuncionario() ?>
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