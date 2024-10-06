<?php require_once "header.php"; ?>
<!--Formulario de cadastro de fornecedore-->
<?php

//include "../dbconfig.php"; 

if (isset($_POST['btn-addfornecedor'])){
  
  $nome= $_POST["nome"];
    $nif= $_POST["nif"];
  $local= $_POST["local"];
  $telefone= $_POST["telefone"];
  $email= $_POST["email"];
 
  

/*Enviar dados na base de dados*/
if($crud->Createfornecedor($nome, $nif, $local, $telefone, $email)){


echo "fornecedor adicionado";
}else{
echo "fornecedor não adicionado";

}  

}

?>

<!-- Content Wrapper. Contains page content  -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Fornecedor
        <small>Adicionar novo</small>
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
                  <label for="inputEmail3" class="col-sm-2 control-label" >Fornecedor</label>

                  <div class="col-sm-10">
                    <input type="text" name="nome" class="form-control" id="inputEmail3" placeholder="Nome do Fornecedor" required >
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">NIF</label>

                  <div class="col-sm-10">
                    <input type="number" name="nif" class="form-control" id="inputPassword3" placeholder="Número de Identificação Fiscal" required >
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Localização</label>

                  <div class="col-sm-10">
                    <input type="text" name="local" class="form-control" id="inputPassword3" placeholder="Localização do fornecedor" required >
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Telefone</label>

                  <div class="col-sm-10">
                    <input type="number" name="telefone" class="form-control" id="inputPassword3" placeholder="Número de telefone" required >
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="inputPassword3" placeholder="E-mail do fornecedor" required >
                  </div>
                </div>

                     <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" name="btn-addfornecedor">cadastrar</button>
                <a href="fornecedor.php" class="btn btn-danger">Voltar</a>
              </div>
              <!-- /.box-footer -->
                   
          </div>
     </form>
</div>

  
          <!-- /.form-group -->
       
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>


<?php include "rodape.php"; ?>