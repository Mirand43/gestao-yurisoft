<?php include "cabecalho.php"; ?>
<?php

include "../../dbconfig.php"; 

if (isset($_POST['btn-addcliente'])){
  $cliente = $_POST["nome"];
  $local = $_POST["morada"];
  $telefone = $_POST["telefone"];
  $email = $_POST["email"];


/*Enviar dados na base de dados*/
if($crud->CreateCliente( $cliente, $local, $telefone, $email)){


echo "Adicionado";
}else{

echo "Não adicionado";

}  

}

?>

<!-- Content Wrapper. Contains page content  -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cliente
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
                  <label for="inputEmail3" class="col-sm-2 control-label" >Cliente</label>

                  <div class="col-sm-10">
                    <input type="text" name="nome" class="form-control" id="inputEmail3" placeholder="Nome do Cliente" required >
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Morada</label>

                  <div class="col-sm-10">
                    <input type="text" name="morada" class="form-control" id="inputPassword3" placeholder="Localização do cliente" required >
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Telefone</label>

                  <div class="col-sm-10">
                    <input type="number" name="local" class="form-control" id="inputPassword3" placeholder="Contacto do cliente" required >
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="inputPassword3" placeholder="E-mail do cliente caso tenha">
                  </div>
                </div>

                     <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" name="btn-addcliente">cadastrar</button>
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