
<?php

include "../dbconfig.php"; 



$idstock = $_GET["edit_id"];
$row= $crud->ComboStockporID($idstock);

$estado=false;

if (isset($_POST['btn-delstock'])){
  


/*Deletar Fornecedor($id)*/
if($crud->DeleteStock($_GET["edit_id"]  )){

$estado=true;
  echo "Stock Eliminado";
  }else{
  echo "Stock não Eliminado";
  
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
        <form method="POST">
          <div class="form-group">
            <fieldset>
              <legend>Eliminar O Produto do stock </legend>
              <?php if($estado){?>
              <h2>Produto em stock eliminado com sucesso!</h2>
              <?php }else {?>
             <h2> Pretente eliminar o Produto <?php  print($row['nomeproduto']); ?>, do stock ? </h2> 

              <?php }?>
                

              </div>
            <button type="submit" class="btn btn-success" name="btn-delstock">Sim</button>
      		  <a href="stock.php" class="btn btn-danger">Voltar</a>
            <br>
            <br>          
            </fieldset>  
          </div>
     </form>
</div>


<?php include "rodape.php"; ?>