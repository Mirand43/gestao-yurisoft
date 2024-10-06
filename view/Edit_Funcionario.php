
<?php include "header.php"; ?>

<?php

include "../dbconfig.php"; 


 $idfuncionario = $_GET["edit_id"];
 $row= $crud->ComboFuncionarioporID($idfuncionario);





if (isset($_POST['btn-edit_funcionario'])){
  $nome = $_POST["nome"];
  $nacionalidade = $_POST["nacionalidade"];
  $naturalidade = $_POST["naturalidade"];
  $documentacao = $_POST["documentacao"];
  $endereco = $_POST["endereco"];
  $telefone = $_POST["telefone"];
  $datanascimento = $_POST["datanascimento"];
  $sexo = $_POST["sexo"];
  $senha = $_POST["senha"];
  $idperfil = $_POST["idperfil"];


/*Enviar dados na base de dados*/
if($crud->UpdateFuncionario($_GET["edit_id"] , $nome,$nacionalidade,$naturalidade,$documentacao, $endereco,$telefone,  $sexo, $datanascimento, $senha, $idperfil )){


echo "funcionario actualizado";
}else{
echo "funcionario nao actualizado";

}  

}

?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Funcionário
        <small>Editar dados</small>
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
                  <label for="inputEmail3" class="col-sm-2 control-label" >Usuário</label>

                  <div class="col-sm-10">
                    <input type="text" name="nome" class="form-control" id="inputEmail3" placeholder="Nome do funcionário" value='<?php print($row['nome']); ?>' >
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nacionalidade</label>

                  <div class="col-sm-4">
                    <input type="text" name="nacionalidade" class="form-control" id="inputPassword3" placeholder="Nacionalidade do Usuário" value='<?php print($row['nacionalidade']); ?>' >
                  </div>

                  <label for="inputPassword3" class="col-sm-2 control-label">Naturalidade</label>

                  <div class="col-sm-4">
                    <input type="text" name="naturalidade" class="form-control" id="inputPassword3" placeholder="Naturalidade do Usuário" value='<?php print($row['naturalidade']); ?>' >
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nº do documento</label>

                  <div class="col-sm-4">
                    <input type="text" name="documentacao" class="form-control" id="inputPassword3" placeholder="numero do documento" value='<?php print($row['documentacao']); ?>' >
                  </div>

                  <label for="inputPassword3" class="col-sm-2 control-label">Telefone</label>

                  <div class="col-sm-4">
                    <input type="number" name="telefone" class="form-control" id="inputPassword3" placeholder="+244 990 000 000" value='<?php print($row['telefone']);?>' >
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Endereço</label>

                  <div class="col-sm-4">
                    <input type="text" name="endereco" class="form-control" id="inputPassword3" placeholder="Endereço actual" value='<?php print($row['endereco']);?>' >
                  </div>

                  
                  <label for="inputPassword3" class="col-sm-2 control-label">Data de Nascimento</label>

                  <div class="col-sm-4">
                    <input type="date" name="datanascimento" class="form-control" id="inputPassword3" placeholder="dd/mm/aaaa" value='<?php print($row['datanascimento']); ?>' >
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Perfil</label>

                  <div class="col-sm-4">
                    <select class="form-control" name="idperfil">
                    <?php $crud-> ComboPerfil() ?>

                     

                    <option selected="yes" value=<?php print($row['idperfil']); ?>><?php print($row['nivelperfil']); ?></option>
   
                  </select>                
                  </div>


                  <label for="inputPassword3" class="col-sm-2 control-label">Sexo</label>

                  <div class="col-sm-4">
                    <select class="form-control" name="sexo">
                <?php if($row['sexo']=="Masculino"){?>

                <option  value="Masculino" selected="yes" > <?php  print("Masculino"); ?></option>
                <option  value="Femenino" > <?php  print("Femenino"); ?></option>
                <?php }else{
                
                ?> <option  value="Masculino" > <?php  print("Masculino"); ?></option>
                <option  value="Femenino"  selected="yes"> <?php  print("Femenino"); ?></option>
               <?php }?>
                     </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Senha</label>

                  <div class="col-sm-4">
                    <input type="password" name="senha"  class="form-control" id="inputPassword3" placeholder="Alterar Senhar" required >
                  </div>

                  <label for="inputPassword3" class="col-sm-2 control-label">Confirmar senha</label>
                  <div class="col-sm-4">
                    <input type="password" name="senha2" class="form-control" id="inputPassword3" placeholder="Confirme a senha" required >
                  </div>
                </div>
                <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" name="btn-edit_funcionario">Salvar</button>
                <a href="funcionario.php" class="btn btn-danger">Cancelar</a>
              </div>
                <!-- /.box-footer -->
        
                  </div>
                </div>
              </div>
        </div>
 

<?php include "rodape.php"; ?>
          