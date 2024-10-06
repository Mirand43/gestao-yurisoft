<?php

include "../dbconfig.php";


if (isset($_POST['btn-addfuncionario'])) {

  $senha1 = $_POST["senha1"];
  $senha2 = $_POST["senha2"];

  if ($senha1 == $senha2) {

    $nome = $_POST["nome"];
    $nacionalidade = $_POST["nacionalidade"];
    $naturalidade = $_POST["naturalidade"];
    $documentacao = $_POST["documentacao"];
    $endereco = $_POST["endereco"];
    $telefone = $_POST["telefone"];
    $datanascimento = $_POST["datanascimento"];
    $sexo = $_POST["sexo"];
    $senha = $_POST["senha1"];
    $idperfil = $_POST["idperfil"];

    /*Enviar dados na base de dados*/
    if (
      $crud->CreateFuncionario(
        $nome,
        $nacionalidade,
        $naturalidade,
        $documentacao,
        $endereco,
        $telefone,
        $sexo,
        $datanascimento,
        $senha,
        $idperfil
      )
    ) {
      echo "Funcionario cadastrado";
    } else {
      echo "Funcionario não cadastrado";
    }
  }

}
?>


<?php require_once "header.php"; ?>
<!-- Content Wrapper. Contains page content  -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Funcionário
      <small>Cadastrar funcionário</small>
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
            <label for="inputEmail3" class="col-sm-2 control-label">Usuário</label>

            <div class="col-sm-10">
              <input type="text" name="nome" class="form-control" id="inputEmail3" placeholder="Nome do funcionário"
                required>
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Nacionalidade</label>

            <div class="col-sm-4">
              <input type="text" name="nacionalidade" class="form-control" id="inputPassword3"
                placeholder="Nacionalidade do Usuário" required>
            </div>

            <label for="inputPassword3" class="col-sm-2 control-label">Naturalidade</label>

            <div class="col-sm-4">
              <input type="text" name="naturalidade" class="form-control" id="inputPassword3"
                placeholder="Naturalidade do Usuário" required>
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Nº do documento</label>

            <div class="col-sm-4">
              <input type="text" name="documentacao" class="form-control" id="inputPassword3"
                placeholder="Nº BI/Passaporte" required>
            </div>

            <label for="inputPassword3" class="col-sm-2 control-label">Telefone</label>

            <div class="col-sm-4">
              <input type="number" name="telefone" class="form-control" id="inputPassword3"
                placeholder="+244 990 000 000" required>
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Endereço</label>

            <div class="col-sm-4">
              <input type="text" name="endereco" class="form-control" id="inputPassword3" placeholder="Endereço actual"
                required>
            </div>


            <label for="inputPassword3" class="col-sm-2 control-label">Data de Nascimento</label>

            <div class="col-sm-4">
              <input type="date" name="datanascimento" class="form-control" id="inputPassword3"
                placeholder="Código de barra" required>
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Perfil</label>

            <div class="col-sm-4">
              <select class="form-control" name="idperfil">
                <?php $crud->ComboPerfil() ?>
              </select>
            </div>


            <label for="inputPassword3" class="col-sm-2 control-label">Sexo</label>

            <div class="col-sm-4">
              <select class="form-control" name="sexo">
                <option>Masculino</option>
                <option>Femenino</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Senha</label>

            <div class="col-sm-4">
              <input type="password" name="senha1" class="form-control" id="inputPassword3"
                placeholder="Endereço actual" required>
            </div>


            <label for="inputPassword3" class="col-sm-2 control-label">Confirmar senha</label>

            <div class="col-sm-4">
              <input type="password" name="senha2" class="form-control" id="inputPassword3"
                placeholder="Código de barra" required>
            </div>
          </div>


        </div>

        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-info pull-right" name="btn-addfuncionario">cadastrar</button>
          <a href="funcionario.php" class="btn btn-danger ">Cancela</a>
        </div>
        <!-- /.box-footer -->

    </div>
  </div>
</div>
</div>

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