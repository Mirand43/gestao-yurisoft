<?php require_once "header.php"; ?>
<!--Formulario de cadastro de stock-->
<?php

//enviar os dados na BD
if (isset($_POST['btn-addcliente'])){  
  $nome= $_POST["nome"];
  $morada= $_POST["morada"];
  $telefone= $_POST["telefone"];
  $email= $_POST["email"]; 
 

/*Enviar dados na base de dados*/
if($crud->CreateCliente($nome, $morada, $telefone, $email )){


echo "cliente Adicionado";
}else{
echo " cliente não adicionado";

}  

}

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <section class="content-header">
      <h1>
        Cliente
        <small>Adicionar clientes</small>
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
                  <label for="inputEmail3" class="col-sm-2 control-label" >nome</label>

                  <div class="col-sm-10">
                    <input type="text" name="nome" class="form-control" id="inputPassword3" placeholder="Nome do cliente" required >
                </div>
              </div>
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">morada</label>

                  <div class="col-sm-10">
                    <input type="text" name="morada" class="form-control" id="inputPassword3" placeholder="morada" required >
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">telefone</label>

                  <div class="col-sm-10">
                    <input type="number" name="telefone" class="form-control" id="inputPassword3" placeholder="telefone" required >
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">email</label>

                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="inputPassword3" placeholder="E-mail">
                  </div>
                </div>

     <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" name="btn-addcliente">Adicionar</button>
                <a href="cliente.php" class="btn btn-danger">Voltar</a>
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