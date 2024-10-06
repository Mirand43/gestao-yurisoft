<?php 

$idstock = $_GET["edit_id"];

$row = $crud->ComboStockporID($idstock); 

if (isset($_POST['btn-editquantidade'])){

  $actual = $_POST["inicial"];
  $alteracao = $_POST["inicial"];


/*Enviar dados na base de dados */
if($crud->addcarrinho($idstock, $_GET["produtp"] , $actual, $_GET["preco"])){


echo "Quantidade acrescentada";
}else{
echo "Quantidade não acrescentada";

}  

}


?>

            <form class="form-horizontal" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" >Produto</label>

                  <div class="col-sm-10">
                    <select class="form-control select2" name="nome">
                  <?php $crud-> ListStockA() ?>
                </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Quantidade</label>

                  <div class="col-sm-10">
                    <input type="number" name="inicial" class="form-control" id="inputPassword3" placeholder="Quantidade desejada" required >
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label" value='<?php print($row['preco']); ?>'>Preço</label>

                  <div class="col-sm-3">
                    <input type="number" name="preco" class="form-control" id="inputPassword3" disabled >
                  </div>
                  
                  <label for="inputPassword3" class="col-sm-2 control-label">Subtotal</label>

                  <div class="col-sm-3">
                    <input type="number" name="subtotal" class="form-control" id="inputPassword3" disabled >
                  </div>
                </div>