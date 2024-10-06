<?php

include "../dbconfig.php"; 



$idfornecedor = $_GET["edit_id"];
$row= $crud->ComboFornecedorporID($idfornecedor);

$estado=false;

if (isset($_POST['btn-delfornecedor'])){
  


/*Deletar Fornecedor($id)*/
if($crud->DeleteFornecedor($_GET["edit_id"]  )){

$estado=true;
  echo "fornecedor Eliminad";
  }else{
  echo "fornecedor não Eliminado";
  
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

<div class="container-fluid text-primary">
<!--Formulario de cadastro de fornecedor-->
        <div class="callout callout-dark">
           <form method="POST">
          <div class="form-group">
            <fieldset>
             <legend>Eliminar fornecedor</legend>
              <?php if($estado){?>
              <h2>Fornecedor eliminado com sucesso!</h2>
              <?php }else {?>
             <h2> Pretente eliminar o fornecedor <?php  print($row['nome']); ?> ?</h2> 

              <?php }?>
                

              </div>
            <button type="submit" class="btn btn-danger" name="btn-delfornecedor">Sim </button>
            <a href="fornecedor.php" class="btn btn-info">Não</a>
            <br>
            <br>          
            </fieldset>  
          </div>
     </form>
</div>
 </div>




<?php include "rodape.php"; ?>