<!DOCTYPE html>
<html lang="Pt">
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>

</head>
<body>

<?php

include "../dbconfig.php"; 


if (isset($_POST['btn-addtipoproduto'])){
  $descricao = $_POST["tipo"];


/*Enviar dados na base de dados*/
if($crud->CreateTipoProduto($descricao)){


echo "Tipo de Produto Inserido";
}else{
echo "Tipo de Produto não Inserido";

}  

}

?>


<div class="container-fluid text-primary">
<!--Formulario de cadastro de tipo de produto-->
        <form method="POST">
          <div class="form-group">
            <fieldset>
              <legend>Produto</legend>
              <input type="hidden" name="idfuncionario" >
              <label>Tipo de produto</label>
              <input type="text" name="tipo" class="form-control" placeholder="Tipo de Produto" required>
        
               
              </div>
            <button type="submit" class="btn btn-success" name="btn-addtipoproduto">Salvar</button>
      		  <a href="admin.php" class="btn btn-danger">Voltar</a>
            <br>
            <br>          
            </fieldset>  
          </div>
     </form>
</div>