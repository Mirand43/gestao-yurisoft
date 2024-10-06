<?php

include "../dbconfig.php"; 


$idproduto = $_GET["del_id"];
$row= $crud->ComboProdutoporID($idproduto);

$estado=false;

if (isset($_POST['btn-delproduto'])){
  


/*Deletar Fornecedor($id)*/
if($crud->DeleteProduto($_GET["del_id"])){

$estado=true;
  echo "Produto Eliminado";
  }else{
  echo "Produto não Eliminado";
  
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
              <legend>Eliminar Produto</legend>
              <?php if($estado){?>
              <h2>Produto eliminado com sucesso!</h2>
              <?php }else {?>
             <h2> Pretente eliminar o Produto <?php  print($row['nome']); ?> ?</h2> 

              <?php }?>
                

              </div>
            <button type="submit" class="btn btn-danger" name="btn-delproduto">Sim </button>
            <a href="produto.php" class="btn btn-info">Não</a>
            <br>
            <br>          
            </fieldset>  
          </div>
     </form>
</div>
 </div>




<?php include "rodape.php"; ?>