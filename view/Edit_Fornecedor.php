<?php include "header.php"; ?>
<?php

include "../dbconfig.php"; 


$idfornecedor = $_GET["edit_id"];
$row = $crud->ComboFornecedorporID($idfornecedor);



if (isset($_POST['btn-addfornecedor'])){
  $nome = $_POST["nome"];
  $nif = $_POST["nif"];
  $morada = $_POST["local"];
  $telefone = $_POST["telefone"];
  $email = $_POST["email"];



/*Enviar dados na base de dados para actualizar*/
if($crud-> UpdateFornecedor($_GET["edit_id"] , $nome, $nif, $morada, $telefone, $email)){


echo "fornecedor actualizado";
}else{
echo "Ocorreu um erro na base de dados";

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
            
            <!-- form start -->
            <form class="form-horizontal" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" >Fornecedor</label>

                  <div class="col-sm-10">
                    <input type="text" name="nome" class="form-control" id="inputEmail3" placeholder="Nome do Fornecedor" required value='<?php print($row['nome']); ?>'>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">NIF</label>

                  <div class="col-sm-10">
                    <input type="number" name="nif" class="form-control" id="inputPassword3" placeholder="Número de Identificação Fiscal" required value='<?php print($row['nif']); ?>'>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Localização</label>

                  <div class="col-sm-10">
                    <input type="text" name="local" class="form-control" id="inputPassword3" placeholder="Localização do fornecedor" required value='<?php print($row['morada']); ?>'>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Telefone</label>

                  <div class="col-sm-10">
                    <input type="number" name="telefone" class="form-control" id="inputPassword3" placeholder="Número de telefone" required value='<?php print($row['telefone']); ?>'>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="inputPassword3" placeholder="Localização do fornecedor" required value='<?php print($row['email']); ?>' >
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