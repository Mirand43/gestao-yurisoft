<?php

include "../dbconfig.php"; 



$idfuncionario = $_GET["del_id"];
$row= $crud->ComboFuncionarioporID($idfuncionario);

$estado=false;

if (isset($_POST['btn-delfuncionario'])){
  


/*Enviar dados na base de dados   DeleteFuncionario($id)*/
if($crud->DeleteFuncionario($_GET["del_id"]  )){

$estado=true;
  echo "funcionario Eliminad";
  }else{
  echo "funcionario nao Eliminado";
  
  }  
  
  }
?>


<?php include "header.php"; ?>


 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>

        <small></small>
      </h1>
    </section>


<div class="container">
<!--Formulario de cadastro de fornecedor-->
        <div class="callout callout-dark">
           <form method="POST">
          <div class="form-group">
            <fieldset>
              <legend>Eliminar Funcionário</legend>
              <?php if($estado){?>
              <h2>Funcionário eliminado com sucesso!</h2>
              <?php }else {?>
             <h2> Pretente eliminar o Funcionário <?php  print($row['nome']); ?> ?</h2> 

              <?php }?>
                

              </div>
            <button type="submit" class="btn btn-danger" name="btn-delfuncionario">Sim </button>
            <a href="funcionario.php" class="btn btn-info">Voltar</a>
            <br>
            <br>          
            </fieldset>  
          </div>
     </form>
</div>
 </div>
</div>

<?php include "rodape.php";  ?>