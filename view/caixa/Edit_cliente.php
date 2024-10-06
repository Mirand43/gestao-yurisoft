<?php

include "../../dbconfig.php";

$idcliente = $_GET["edit_id"];
$row = $crud->ComboClienteporID($idcliente);

if (isset($_POST['btn-editcliente'])){
  $cliente = $_POST["nome"];
  $local = $_POST["morada"];
  $telefone = $_POST["telefone"];
  $email = $_POST["email"];



/*Enviar dados na base de dados*/
if($crud->UpdateCliente( $idcliente ,$cliente, $local, $telefone, $email)){


echo "Cliente Actualizado";
}else{
echo "Cliente não Actualizado";

}  

}

?>

<?php include "cabecalho.php"; ?>

<!-- Content Wrapper. Contains page content  -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cliente
        <small>Editar dados do Cliente</small>
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
                  <label for="inputEmail3" class="col-sm-2 control-label" >Cliente</label>

                  <div class="col-sm-10">
                    <input type="text" name="nome" class="form-control" id="inputEmail3" placeholder="Nome do Cliente" required value='<?php print($row['nome']); ?>'>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Morada</label>

                  <div class="col-sm-10">
                    <input type="text" name="morada" class="form-control" id="inputPassword3" placeholder="Número de Identificação Fiscal" required value='<?php print($row['morada']); ?>'>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Telefone</label>

                  <div class="col-sm-10">
                    <input type="number" name="telefone" class="form-control" id="inputPassword3" placeholder="Contacto do cliente" required value='<?php print($row['telefone']); ?>'>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="inputPassword3" placeholder="E-mail do cliente caso tenha" value='<?php print($row['email']); ?>'>
                  </div>
                </div>

                     <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" name="btn-editcliente">Actualizada</button>
                <a href="cliente.php" class="btn btn-danger">Voltar</a>
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