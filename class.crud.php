<?php

/* Evitar acesso a uma pagina*/
$pagina="pagina.php"; //aqui colocariamos o nome da pagina.
if(basename($_SERVER["PHP_SELF"])=='$pagina'){
die("<script>alert('Sem permição de acesso !')</script>\n<script>window.location=('index.php')</script>");
}

class crud
{
 private $db;

  
 function __construct($DB_con)
 {
  $this->db = $DB_con;
  
 }
/*function __construct($DB_con)
 {
  $this->db = $DB_con;
  
 } */



 public function addcarrinho($idproduto, $produto, $qtd, $preco){

  //session_start();
  
  //addcarrinho($idstock, $_GET["produtp"] , $actual, $_GET["preco"], subtotal)
  $sub=$qtd * $preco;
  array_push($_SESSION['carrinho'], array($idproduto,$produto, $qtd, $preco, $sub));
  print_r ($_SESSION['carrinho']);
  return true;

 }



 public function produtoporid(){
   return true;
 }

public function listarcarrinho(){

  try
  {
      $total=0;
    
    ?><tr>  <?php
    for ($i=0; $i < sizeof($_SESSION['carrinho']) ; $i++) { 
      # code ...
     $dado= $_SESSION['carrinho'][$i];

     /* <tr>
                  <th>Código de Produto</th>
                  <th>Produto</th>
                  <th>Qtd</th>
                  <th>Preco</th>
                  <th>Subtotal</th>
                  <th>Acção</th>
                </tr>*/
      //array($idproduto,$produto, $qtd, $preco, $sub));
     ?>
     <td>  <?php print_r($dado[0]); ?> </td> 
     <td>  <?php print_r($dado[1]); ?> </td> 
     <td>  <?php print_r($dado[2]); ?> </td> 
     <td>  <?php print_r($dado[3]); ?> </td> 
     <td>  <?php print_r($dado[4]); ?> </td> 

     
     <?php
    ?></tr>  <?php

    $total+=$dado[4];

    
    }
      
   return $total;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage(); 
   return false;
  }

}



//Total do cliente
public function Totalcarrinho(){

  try
  {
      $total=0;
    
    ?><tr>  <?php
    for ($i=0; $i < sizeof($_SESSION['carrinho']) ; $i++) { 
      # code ...
     $dado= $_SESSION['carrinho'][$i];

     

    $total+=$dado[4];

    
    }
      
   return $total;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage(); 
   return false;
  }

}




 //Criar Stock
 public function CreateStock($produto, $inicial, $preco, $actual, $cadastro, $alteracao )
 {
  try
  {
                             //("INSERT INTO fornecedor( idfornecedor, nome, nif, morada, telefone, email ) VALUES(default, :nome, :nif, :morada, :telefone, :email)");
  
   $stmt = $this->db->prepare("INSERT INTO stock (idstock, quantidadeinicial, preco, datacadastro, quantidadeactual, dataalteracao, idproduto) VALUES (default, :quantidadeinicial, :preco, :datacadastro, :quantidadeactual, :dataalteracao, :idproduto)");

   $dateD=date('y-m-d');
   $stmt->bindparam(":quantidadeinicial",$inicial);
   $stmt->bindparam(":preco",$preco);
   $dataa=date('y-m-d');
   $stmt->bindparam(":datacadastro",$dataa);
   $stmt->bindparam(":quantidadeactual",$actual);
   $stmt->bindparam(":dataalteracao",$dataa);
   $stmt->bindparam(":idproduto",$produto);
   
   $stmt->execute();
   return true;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage(); 
   return false;
  }
  
 }

 public function CreateVenda( $total, $pago, $troco, $cliente, $funcionario)
 {
  try
  {

   $troco1= $pago - $total;
   if($troco1<0){
    print("o valor pago nao e' suficiente");
   return  false ;
 }
    //
                             //("INSERT INTO fornecedor( idfornecedor, nome, nif, morada, telefone, email ) VALUES(default, :nome, :nif, :morada, :telefone, :email)");
  
   $stmt = $this->db->prepare("INSERT INTO venda (idvenda, datavenda, total, pago, troco, idcliente, idfuncionario) 
                                    VALUES (default, :datavenda, :total, :pago, :troco, :idcliente, :idfuncionario)");

   $dateD=date('y-m-d');
   $stmt->bindparam(":datavenda",$dateD);
   $stmt->bindparam(":total",$total);
   //$dataa=date('y-m-d');


   $stmt->bindparam(":pago",$pago);
   $stmt->bindparam(":troco",$troco1);
   $stmt->bindparam(":idcliente",$cliente);
   $stmt->bindparam(":idfuncionario",$funcionario);
   
   $stmt->execute();


   for ($i=0; $i < sizeof($_SESSION['carrinho']) ; $i++) { 
    # code ...
   $dado= $_SESSION['carrinho'][$i];

   /* <tr>
                <th>Código de Produto</th>
                <th>Produto</th>
                <th>Qtd</th>
                <th>Preco</th>
                <th>Subtotal</th>
                <th>Acção</th>
              </tr>*/
    //array($idproduto,$produto, $qtd, $preco, $sub));
   ?>
   <td>  <?php print_r($dado[0]); ?> </td> 
   <td>  <?php print_r($dado[1]); ?> </td> 
   <td>  <?php print_r($dado[2]); ?> </td> 
   <td>  <?php print_r($dado[3]); ?> </td> 
   <td>  <?php print_r($dado[4]); ?> </td> 

   
   <?php
  ?></tr>  <?php

  $stmt1 = $this->db->prepare("INSERT INTO carrinho (idcarrinho, idstock, idvenda, quantidade, preco, subtotal) 
  VALUES (default, :idstock, (select max(idvenda) from venda), :quantidade, :preco, :subtotal)");

$dateD=date('y-m-d');
$stmt1->bindparam(":idstock",$dado[0]);
$stmt1->bindparam(":quantidade",$dado[2]);
//$dataa=date('y-m-d');
$stmt1->bindparam(":preco",$dado[3]);

$stmt1->bindparam(":subtotal",$dado[4]);


$stmt1->execute();

  
  }


  $_SESSION['carrinho'] = array();


        //header('Location: factura2.php');
   return true;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage(); 
   return false;
  }
  
 }

 //Apresentar Stock Caixa
 public function ComboStockA()
 {
  $stmt = $this->db->prepare("select s.*, p.nome  from stock s, produto p where p.idproduto=s.idproduto");
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
    ?>
          
         
    <tr>          
    <tr>         
     <td><?php print($row['nome']); ?></td>
     <td><?php print($row['quantidadeinicial']); ?></td>
     <td><?php print($row['quantidadeactual']); ?></td>
     <td><?php print($row['preco']); ?>,00 Akw</td>
     <td><?php print($row['datacadastro']); ?></td>
     <td><?php print($row['dataalteracao']); ?></td>
                <td align="center">
                <a href="addcarrinho.php?edit_id=<?php print($row['idstock']);?>&produtp=<?php print($row['nome']); ?>&preco=<?php print($row['preco']); ?>"><i class="glyphicon glyphicon-download"></i></a>
                </td>
        
                
    </tr> 
   
                
        <?php
   }
  }
  else
  {
  
  }
  
 }




 public function VerDetalhesUltimaVenda()
 {
  $stmt = $this->db->prepare("SELECT c.*, p.nome as descricao from carrinho c, produto p, stock s WHERE p.idproduto = s.idproduto and c.idstock = s.idstock and c.idvenda=(SELECT MAX(v.idvenda) from venda v)");
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
    ?>
          
         
    <tr>          
    <tr>         
     <td><?php print($row['idstock']); ?></td>
     <td><?php print($row['descricao']); ?></td>
     <td><?php print($row['quantidade']); ?></td>
     <td><?php print($row['preco']); ?>,00 Akw</td>
     <td><?php print($row['subtotal']); ?></td>
     
   
                
        <?php
   }
  }
  else
  {
  
  }
  
 }


//Apresentar pra acrescentar na venda
 public function ListStockA()
 {
  $stmt = $this->db->prepare("select s.*, p.nome  from stock s, produto p where p.idproduto=s.idproduto");
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
    ?>
          
         
    
    <option value="<?php print($row['idstock']); ?>">
      <td><?php print($row['idstock']); ?></td>
      <td><?php print($row['nome']); ?></td>              
    </option> 
   
                
        <?php
   }
  }
  else
  {
  
  }
  
 }





 //Apresentar Venda
 public function ComboVenda()
 {
  $stmt = $this->db->prepare("select v.*, c.nome, f.nome as funcionario  from venda v, cliente c, funcionario f where c.idcliente=v.idcliente and f.idfuncionario=v.idfuncionario");
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
    ?>
          
                 
    <tr>         
     <td><?php print($row['idvenda']); ?></td>
     <td><?php print($row['datavenda']); ?></td>
     <td><?php print($row['nome']); ?></td>
     <td><?php print($row['total']); ?>,00 Akw</td>
     <td><?php print($row['pago']); ?>,00 Akw</td>
     <td><?php print($row['troco']); ?>,00 Akwz</td>
     <td><?php print($row['funcionario']); ?></td>
                <td align="center">
                <a href="addcarrinho.php?edit_id=<?php print($row['idstock']);?>&produtp=<?php print($row['nome']); ?>&preco=<?php print($row['preco']); ?>">detalhes<i class="glyphicon glyphicon-download"></i></a>
                <a href="addcarrinho.php?edit_id=<?php print($row['idstock']);?>&produtp=<?php print($row['nome']); ?>&preco=<?php print($row['preco']); ?>">Imprimir<i class="glyphicon glyphicon-download"></i></a>
                <a href="addcarrinho.php?edit_id=<?php print($row['idstock']);?>&produtp=<?php print($row['nome']); ?>&preco=<?php print($row['preco']); ?>">Anular<i class="glyphicon glyphicon-download"></i></a>
                </td>
        
                
    </tr> 
   
                
        <?php
   }
  }
  else
  {
  
  }
  
 }





 //Apresentar Relatório de Venda
 public function RelatorioVenda()
 {
  $stmt = $this->db->prepare("select v.*, c.nome, f.nome as funcionario  from venda v, cliente c, funcionario f where c.idcliente=v.idcliente and f.idfuncionario=v.idfuncionario");
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
    ?>
          
                 
    <tr>         
     <td><?php print($row['idvenda']); ?></td>
     <td><?php print($row['datavenda']); ?></td>
     <td><?php print($row['nome']); ?></td>
     <td><?php print($row['total']); ?>,00 Akw</td>
     <td><?php print($row['pago']); ?>,00 Akw</td>
     <td><?php print($row['troco']); ?>,00 Akwz</td>
     <td><?php print($row['funcionario']); ?></td>
                <td align="center">
                <a href="detalhe.php?edit_id=<?php print($row['idvenda']);?>">detalhes<i class="glyphicon glyphicon-download"></i></a>
                <a href="factura.php?edit_id=<?php print($row['idvenda']);?>">Imprimir<i class="glyphicon glyphicon-download"></i></a>
                </td>
        
                
    </tr> 
   
                
        <?php
   }
  }
  else
  {
  
  }
  
 }


//Pegar ID da venda
public function ComboVendaporID($id)
 {
  $stmt = $this->db->prepare("select v.*, c.nome, f.nome as funcionario  from venda v, cliente c, funcionario f where c.idcliente=v.idcliente and f.idfuncionario=v.idfuncionario and idvenda = :id");
   $stmt->bindparam(":id",$id);
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
          return $row;
   }
  }
  else
  {
  
  }
  
 }








 //Apresentar Stock
public function ComboStock()
 {
  $stmt = $this->db->prepare("select s.*, p.nome  from stock s, produto p where p.idproduto=s.idproduto");
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
    ?>
          
         
    <tr>          
    <tr>         
     <td><?php print($row['nome']); ?></td>
     <td><?php print($row['quantidadeinicial']); ?></td>
     <td><?php print($row['quantidadeactual']); ?></td>
     <td><?php print($row['preco']); ?>,00 Akw</td>
     <td><?php print($row['datacadastro']); ?></td>
     <td><?php print($row['dataalteracao']); ?></td>
                <td align="center">
                <a href="Edit_Stock.php?edit_id=<?php print($row['idstock']);?>"><i class="glyphicon glyphicon-pencil"></i></a>
                <a href="Edit_Quantidade.php?edit_id=<?php print($row['idstock']);?>"><i class="glyphicon glyphicon-download"></i></a>
                <a href="Delete_Stock.php?edit_id=<?php print($row['idstock']);  ?>"><i class="glyphicon glyphicon-trash"></i></a>
                </td>
        
                
    </tr> 
   
                
        <?php
   }
  }
  else
  {
  
  }
  
 }

  //Pegar ID do Stock
public function ComboStockporID($id)
 {
  $stmt = $this->db->prepare("SELECT st.*, p.nome as nomeproduto FROM  stock st INNER JOIN produto p on st.idproduto = p.idproduto where idstock = :id");
   $stmt->bindparam(":id",$id);
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
          return $row;
   }
  }
  else
  {
  
  }
  
 }


 //Actualizar Stock
 public function UpdateStock($id, $produto, $inicial, $preco, $actual, $cadastro, $alteracao)
 {
  try
  {
   
  $stmt = $this->db->prepare("UPDATE stock set quantidadeinicial=:quantidadeinicial, preco=:preco, datacadastro=:datacadastro, quantidadeactual=:quantidadeactual, dataalteracao=:dataalteracao, idproduto=:idproduto WHERE idstock=:id");
  
   $stmt->bindparam(":id",$id);
   $stmt->bindparam(":quantidadeinicial",$inicial);
   $stmt->bindparam(":preco",$preco);
   $stmt->bindparam(":datacadastro",$cadastro);
   $stmt->bindparam(":quantidadeactual",$actual);
   $dataa=date('y-m-d');
   $stmt->bindparam(":dataalteracao",$dataa);
   $stmt->bindparam(":idproduto",$produto);
   
   
   $stmt->execute();
   return true;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage(); 
   return false;
  }
  
 }


 //Actualizar Quantidade
 public function UpdateQuantidade($id, $actual,  $alteracao)
 {
  try
  {
   
  $stmt = $this->db->prepare("UPDATE stock set  quantidadeactual=quantidadeactual+ :quantidadeactual, quantidadeinicial= quantidadeactual,  dataalteracao=:dataalteracao WHERE idstock=:id");
  
   $stmt->bindparam(":id",$id);
   $stmt->bindparam(":quantidadeactual",$actual);
   $dataa=date('y-m-d');
   $stmt->bindparam(":dataalteracao",$dataa);
   
   
   $stmt->execute();
   return true;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage(); 
   return false;
  }
  
 }


  //Deletar Stock
 public function DeleteStock($id){
  try
  {
   
   $stmt = $this->db->prepare("DELETE from stock WHERE idstock=:id");
   $stmt->bindparam(":id",$id);
  
   
   $stmt->execute();
   return true;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage(); 
   return false;
  }
  
 }



public function fecharlogin(){
  session_start();
      //
    session_unset();
    session_destroy();
return true;
}

 
 
 public function loginuser($username, $senha){

    //$stmt = $this->db->prepare("INSERT INTO funcionario( idfuncionario ,nome, nacionalidade, naturalidade, documentacao, endereco, telefone, datanascimento, sexo, senha, idperfil) VALUES(default,:nome,:nacionalidade,:naturalidade,:documentacao, :endereco,:tel, :datanascimento, :sexo, :senha, :perfil)");
  
    $stmt = $this->db->prepare("SELECT * FROM funcionario WHERE nome=:username and senha=:senha");
    $stmt->bindparam(":username",$username);
    $senhae=md5($senha) ;
    $stmt->bindparam(":senha",$senhae);
    $stmt->execute();
    //print($username );
  //print($senhae ); 
   print ($stmt->rowCount());
    if($stmt->rowCount()>0)
  {
     

   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
    //print(" encontrou  o user ");
   
//Iniciando a sessão:

if (session_status() == PHP_SESSION_ACTIVE) {
    session_destroy();
}
else{

//Destruindo a sessão:
session_start();
$_SESSION['username'] = $username;
$_SESSION['id_utilizador'] = $row['idfuncionario'];
$_SESSION['id_tipo_utilizador'] = $row['idperfil'];
$_SESSION['carrinho'] = array();
//Gravando valores dentro da sessão aberta:

//print(" criou sessao ");

if ($row['idperfil']==1){
header('Location: view/caixa');
break;
}

return true;
  }              
              
   }
  }
  else
  { 
      session_start();
      //
    session_unset();
    session_destroy();
    //unset ($_SESSION['login']);
      return false;
     
    
  }
 


//Apresentar total de venda
}


public function ConsultarVenda($id)
 {
  $stmt = $this->db->prepare("SELECT v.*, c.* from venda v, cliente c   where c. idcliente = v.idcliente and v.idvenda=:id ");
  $stmt->bindparam(":id",$id);
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
          return $row;
   }
  }
  else
  {
  
  }
  
 }

 public function ConsultarVenda2()
 {
  $stmt = $this->db->prepare("SELECT v.*, c.* from venda v, cliente c   where c. idcliente = v.idcliente and v.idvenda=(select max(idvenda) from venda)");
  $stmt->bindparam(":id",$id);
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
          return $row;
   }
  }
  else
  {
  
  }
  
 }
public function totalvendas(){
    $stmt = $this->db->prepare("select count(*) as total  from venda");
    $stmt->execute();
   
    if($stmt->rowCount()>0)
    {
     while($row=$stmt->fetch(PDO::FETCH_ASSOC))
     {
      return ($row['total']); 
  
                 
     
                  
          
     }
    }
    else
    {
      return 0;
    }
    
   }

   public function totalProduto(){

    $stmt = $this->db->prepare("select sum(quantidadeactual) as total  from stock");

    $stmt->execute();
   
    if($stmt->rowCount()>0)
    {
     while($row=$stmt->fetch(PDO::FETCH_ASSOC))
     {
        return ($row['total']); 
          
     }
    }
    else
    {
      return 0;
    }
    
   }


  //pagp
   public function totalFuncionarios(){
    $stmt = $this->db->prepare("select count(*) as total  from funcionario");
    $stmt->execute();
   
    if($stmt->rowCount()>0)
    {
     while($row=$stmt->fetch(PDO::FETCH_ASSOC))
     {
      return ($row['total']); 
  
                 
     
                  
          
     }
    }
    else
    {
      return 0;
    }
    
   }
   public function totalPagoVenda(){
    $stmt = $this->db->prepare("select sum(pago) as total  from venda");
    $stmt->execute();
   
    if($stmt->rowCount()>0)
    {
     while($row=$stmt->fetch(PDO::FETCH_ASSOC))
     {
      return ($row['total']); 
          
     }
    }
    else
    {
      return 0;
    }
    
   }

 //Criar Funcionario
 public function CreateFuncionario($nome,$nacionalidade,$naturalidade,$documentacao, $endereco,$tel,  $sexo, $datanascimento, $senha, $perfil )
 {
  try
  {
   
   $stmt = $this->db->prepare("INSERT INTO funcionario( idfuncionario ,nome, nacionalidade, naturalidade, documentacao, endereco, telefone, datanascimento, sexo, senha, idperfil) VALUES(default,:nome,:nacionalidade,:naturalidade,:documentacao, :endereco,:tel, :datanascimento, :sexo, :senha, :perfil)");
   $stmt->bindparam(":nome",$nome);
   $stmt->bindparam(":nacionalidade",$nacionalidade);
   $stmt->bindparam(":naturalidade",$naturalidade);
   $stmt->bindparam(":documentacao",$documentacao);
   $stmt->bindparam(":endereco",$endereco);
   $stmt->bindparam(":tel",$tel); 
   $stmt->bindparam(":datanascimento",$datanascimento);
   $stmt->bindparam(":sexo",$sexo);
   $senhae=md5($senha);
   $stmt->bindparam(":senha",$senhae);
   $stmt->bindparam(":perfil",$perfil);
   
   $stmt->execute();
   return true;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage(); 
   return false;
  }
  
 }

 //Actualizar Funcionario
 public function UpdateFuncionario($id,$nome,$nacionalidade,$naturalidade,$documentacao, $endereco,$tel,  $sexo, $datanascimento, $senha, $perfil )
 {
  try
  {
    $stmt ="";
    if($senha!=""){
      $stmt = $this->db->prepare("UPDATE funcionario set nome=:nome, nacionalidade=:nacionalidade, naturalidade=:naturalidade, documentacao=:documentacao, endereco=:endereco, telefone=:tel, datanascimento=:datanascimento, sexo=:sexo, senha=:senha, idperfil=:perfil WHERE idfuncionario=:id");
   
     }else{
      $stmt = $this->db->prepare("UPDATE funcionario set nome=:nome, nacionalidade=:nacionalidade, naturalidade=:naturalidade, documentacao=:documentacao, endereco=:endereco, telefone=:tel, datanascimento=:datanascimento, sexo=:sexo,  idperfil=:perfil WHERE idfuncionario=:id");
   
     }
   
   $stmt = $this->db->prepare("UPDATE funcionario set nome=:nome, nacionalidade=:nacionalidade, naturalidade=:naturalidade, documentacao=:documentacao, endereco=:endereco, telefone=:tel, datanascimento=:datanascimento, sexo=:sexo, senha=:senha, idperfil=:perfil WHERE idfuncionario=:id");
   $stmt->bindparam(":id",$id);
   $stmt->bindparam(":nome",$nome);
   $stmt->bindparam(":nacionalidade",$nacionalidade);
   $stmt->bindparam(":naturalidade",$naturalidade);
   $stmt->bindparam(":documentacao",$documentacao);
   $stmt->bindparam(":endereco",$endereco);
   $stmt->bindparam(":tel",$tel); 
   $stmt->bindparam(":datanascimento",$datanascimento);
   $stmt->bindparam(":sexo",$sexo);
   if($senha!=""){
   $senhae=md5($senha);
   $stmt->bindparam(":senha",$senhae);
  }
   $stmt->bindparam(":perfil",$perfil);
   
   $stmt->execute();
   return true;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage(); 
   return false;
  }
  
 }

 //Deletar Funcionario
 public function DeleteFuncionario($id){
  try
  {
   
   $stmt = $this->db->prepare("DELETE from funcionario WHERE idfuncionario=:id");
   $stmt->bindparam(":id",$id);
  
   
   $stmt->execute();
   return true;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage(); 
   return false;
  }
  
 }

 public function DeleteProduto($id){
    try
    {
     
     $stmt = $this->db->prepare("DELETE from produto WHERE idproduto=:id");
     $stmt->bindparam(":id",$id);
    
     
     $stmt->execute();
     return true;
    }
    catch(PDOException $e)
    {
     echo $e->getMessage(); 
     return false;
    }
    
   }


//Apresentar Funcionario
public function ComboFuncionario()
 {
  $stmt = $this->db->prepare("select f.*, p.descricao as nivel from funcionario f, perfil p where p.idperfil=f.idperfil");
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
    ?>
          
         
    <tr>         
     <td><?php print($row['nome']); ?></td>
     <td><?php print($row['nacionalidade']); ?></td>
     <td><?php print($row['naturalidade']); ?></td>
     <td><?php print($row['documentacao']); ?></td>
     <td><?php print($row['endereco']); ?></td>
     <td><?php print($row['telefone']); ?></td>
     <td><?php print($row['datanascimento']); ?></td>
     <td><?php print($row['sexo']); ?></td>
    
     <td><?php print($row['nivel']); ?></td> 

                <td align="center">
                <a href="Edit_Funcionario.php?edit_id=<?php print($row['idfuncionario']);?>"><i class="glyphicon glyphicon-pencil"></i> </a>
                <a href="Delete_Funcionario.php?del_id=<?php print($row['idfuncionario']);  ?>"><i class="glyphicon glyphicon-trash"></i></a>
                </td>
        
                
    </tr> 
   
                
        <?php
   }
  }
  else
  {
  
  }
  
 }



public function ComboFuncionarioporID($id)
 {
  $stmt = $this->db->prepare("SELECT f.*, p.descricao as nivelperfil FROM  funcionario f INNER JOIN perfil p on f.idperfil = p.idperfil where idfuncionario = :id");
   $stmt->bindparam(":id",$id);
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
          return $row;
   }
  }
  else
  {
  
  }
  
 }



//criar fornecedor
public function CreateFornecedor($nome, $nif, $morada, $telefone, $email)
 {
  try
  {
    
   $stmt = $this->db->prepare("INSERT INTO fornecedor( idfornecedor, nome, nif, morada, telefone, email ) VALUES(default, :nome, :nif, :morada, :telefone, :email)");
   $stmt->bindparam(":nome",$nome);
   $stmt->bindparam(":nif",$nif);
   $stmt->bindparam(":morada",$morada);
   $stmt->bindparam(":telefone",$telefone);
   $stmt->bindparam(":email",$email);
   
   $stmt->execute();
   return true;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage(); 
   return false;
  }
  
 }

 //Actualizar Fornecedor
 public function UpdateFornecedor($id, $nome, $nif, $morada, $telefone, $email)
 {
  try
  {
   
   $stmt = $this->db->prepare("UPDATE fornecedor set nome=:nome, nif=:nif, morada=:morada, telefone=:telefone, email=:email WHERE idfornecedor=:id");
   $stmt->bindparam(":id",$id);
   $stmt->bindparam(":nome",$nome);
   $stmt->bindparam(":nif",$nif);
   $stmt->bindparam(":morada",$morada);
   $stmt->bindparam(":telefone",$telefone);
   $stmt->bindparam(":email",$email);
   
   $stmt->execute();
   return true;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage(); 
   return false;
  }
  
 }

  //Deletar Fornecedor
 public function DeleteFornecedor($id){
  try
  {
   
   $stmt = $this->db->prepare("DELETE from fornecedor WHERE idfornecedor=:id");
   $stmt->bindparam(":id",$id);
  
   
   $stmt->execute();
   return true;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage(); 
   return false;
  }
  
 }



//Apresentar Fornecedores por lista
public function ListFornecedor()
 {
  $stmt = $this->db->prepare("select * from fornecedor");
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
    ?>
 <option value=<?php print($row['idfornecedor']); ?>><?php print($row['nome']); ?></option>
  
    
                
        <?php
   }
  }
  else
  {
  ?>
  <option value="1">Erro ao Apresentar</option>
  <?php
  }
  
 }



//Apresentar Fornecedores
public function ComboFornecedor()
 {
  $stmt = $this->db->prepare("select * from fornecedor");
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
    ?>

    <tr>
      <td><?php print($row['nif']); ?></td>
      <td><?php print($row['nome']); ?></td>
      <td><?php print($row['morada']); ?></td>
      <td><?php print($row['telefone']); ?></td>
      <td><?php print($row['email']); ?></td>

      <td align="center">
                <a href="Edit_Fornecedor.php?edit_id=<?php print($row['idfornecedor']);?>"><i class="glyphicon glyphicon-pencil"></i></a>
                <a href="Delete_Fornecedor.php?edit_id=<?php print($row['idfornecedor']);  ?>"><i class="glyphicon glyphicon-trash"></i></a>
                </td>
    </tr>
                
        <?php
   }
  }
  else
  {
  
  }
  
 }


//Pegar ID do fornecedor
 public function ComboFornecedorporID($id)
 {
  $stmt = $this->db->prepare("SELECT * FROM fornecedor where idfornecedor = :id");
   $stmt->bindparam(":id",$id);
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
          return $row;
   }
  }
  else
  {
  
  }
  
 }



//criar perfil
public function CreatePerfil($descricao)
 {
  try
  {
    
   $stmt = $this->db->prepare("INSERT INTO perfil( idperfil, descricao ) VALUES(default, :descricao)");
   $stmt->bindparam(":descricao",$descricao);
   
   $stmt->execute();
   return true;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage(); 
   return false;
  }
  
 }



//Apresentar perfil
public function ComboPerfil()
 {
  $stmt = $this->db->prepare("select descricao, idperfil from perfil");
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
    ?>
                
                
   <option value=<?php print($row['idperfil']); ?>><?php print($row['descricao']); ?></option>
        
               
                <?php
   }
  }
  else
  {
   ?>
             <option value="1">Erro ao Apresentar</option>
            <?php
  }
  
 }


 //Criar Produto
public function CreateProduto($nome,$codbarra,$tipo,$fornecedor  )
 {
  try
  {
    
   $stmt = $this->db->prepare("INSERT INTO produto( idproduto, nome, codbarra, idtipoproduto, idfornecedor ) VALUES(default, :nome, :codbarra, :idtipoproduto, :idfornecedor)");
   $stmt->bindparam(":nome",$nome);
   $stmt->bindparam(":codbarra",$codbarra);
   $stmt->bindparam(":idtipoproduto",$tipo);
   $stmt->bindparam(":idfornecedor",$fornecedor);
   
   $stmt->execute();
   return true;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage(); 
   return false;
  }
  
 }

 
 public function getdate(){

   // date_default_timezone_get('America/Sao_Paulo');
    //$date=date('y-m-d H:i');

    $date=date('y-m-d');
    return $date;
 }



 //Criar Produto
public function UpdateProduto($id, $nome,$codbarra,$tipo,$fornecedor  )
{
 try
 {
   
  $stmt = $this->db->prepare("UPDATE produto  set nome=:nome, codbarra=:codbarra, idtipoproduto=:idtipoproduto, idfornecedor=:idfornecedor where  idproduto = :id");
  $stmt->bindparam(":nome",$nome);
  $stmt->bindparam(":id",$id);
  $stmt->bindparam(":codbarra",$codbarra);
  $stmt->bindparam(":idtipoproduto",$tipo);
  $stmt->bindparam(":idfornecedor",$fornecedor);
  
  $stmt->execute();
  return true;
 }
 catch(PDOException $e)
 {
  echo $e->getMessage(); 
  return false;
 }
 
}


//Apresentar produto
public function ComboProduto()
 {
  $stmt = $this->db->prepare("SELECT p.*, tp.descricao as tipodeproduto, f.nome as nomefornecedor from produto p INNER JOIN fornecedor f on f.idfornecedor=p.idfornecedor INNER JOIN tipoproduto tp on tp.idtipoproduto =p.idtipoproduto");
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
    ?>


    <tr>
      <td><?php print($row['codbarra']); ?></td>
      <td><?php print($row['nome']); ?></td>
      <td><?php print($row['tipodeproduto']); ?></td>
      <td><?php print($row['nomefornecedor']); ?></td>
      <td>
                <a href="Edit_Produto.php?edit_id=<?php print($row['idproduto']);?>"><i class="glyphicon glyphicon-pencil"></i></a> 
                <a href="Delete_Produto.php?del_id=<?php print($row['idproduto']);  ?>"> <i class="glyphicon glyphicon-trash"></i></a>
                </td>
      
    </tr>
 

        
               
                <?php
   }
  }
  else
  {
   ?>
             <option value="1">Erro ao Apresentar</option>
            <?php
  }
  
 }



//Apresentar produto
public function ComboProduto1()
 {
  $stmt = $this->db->prepare("SELECT p.*, tp.descricao as tipodeproduto, f.nome as nomefornecedor from produto p INNER JOIN fornecedor f on f.idfornecedor=p.idfornecedor INNER JOIN tipoproduto tp on tp.idtipoproduto =p.idtipoproduto");
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
    ?>


    <tr>
      <td><?php print($row['codbarra']); ?></td>
      <td><?php print($row['nome']); ?></td>
      <td><?php print($row['tipodeproduto']); ?></td>
      <td><?php print($row['nomefornecedor']); ?></td>
      <td>
                <a href="diminiur_Produto.php?edit_id=<?php print($row['idproduto']);?>"><i class="glyphicon glyphicon-minus"></i></a> 
                <a href="aument_Produto.php?del_id=<?php print($row['idproduto']);  ?>"> <i class="glyphicon glyphicon-plus"></i></a>
                </td>
      
    </tr>
 

        
               
                <?php
   }
  }
  else
  {
   ?>
             <option value="1">Erro ao Apresentar</option>
            <?php
  }
  
 }

 
//Pegar ID do produto
 public function ComboProdutoporID($id)
 {
     
  $stmt = $this->db->prepare("SELECT p.*, tp.descricao as tipodeproduto, f.nome as nomefornecedor from produto p INNER JOIN fornecedor f on f.idfornecedor=p.idfornecedor INNER JOIN tipoproduto tp on tp.idtipoproduto =p.idtipoproduto where idproduto = :id");

   $stmt->bindparam(":id",$id);
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
      print('tem dados');
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
          return $row;
   }
  }
  else
  {
  
  }
  
 }



 //Apresentar produto por lista
public function ListProduto()
 {
  $stmt = $this->db->prepare("SELECT p.*, tp.descricao as tipodeproduto, f.nome as nomefornecedor from produto p INNER JOIN fornecedor f on f.idfornecedor=p.idfornecedor INNER JOIN tipoproduto tp on tp.idtipoproduto =p.idtipoproduto");
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
    ?>


    <option value="<?php print($row['idproduto']); ?>">
      <td><?php print($row['nome']); ?></td>
    </option>
 

        
               
                <?php
   }
  }
  else
  {
   ?>
             <option value="1">Erro ao Apresentar</option>
            <?php
  }
  
 }




 //Criar Tipo de Produto
public function CreateTipoProduto($descricao )
 {
  try
  {
    
   $stmt = $this->db->prepare("INSERT INTO tipoproduto( idtipoproduto, descricao ) VALUES(default, :descricao)");
   $stmt->bindparam(":descricao",$descricao);
   
   $stmt->execute();
   return true;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage(); 
   return false;
  }
  
 }


 //Apresentar tipo de produto
public function ComboTipoProduto()
 {
  $stmt = $this->db->prepare("select * from tipoproduto");
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
    ?>

   <option value=<?php print($row['idtipoproduto']); ?> ><?php print($row['descricao']); ?>
   </option>
        
               
                <?php
   }
  }
  else
  {
   ?>
             <option value="1">Erro ao Apresentar</option>
            <?php
  }
  
 }





 //Criar Produto
public function UpdateCliente($id, $nome,$codbarra,$tipo,$fornecedor  )
{
 try
 {
   
  $stmt = $this->db->prepare("UPDATE cliente  set nome=:nome, morada=:morada, telefone=:telefone, email=:email where  idcliente = :id");
    $stmt->bindparam(":id",$id);
  $stmt->bindparam(":nome",$nome);
  $stmt->bindparam(":morada",$codbarra);
  $stmt->bindparam(":telefone",$tipo);
  $stmt->bindparam(":email",$fornecedor);
  
  $stmt->execute();
  return true;
 }
 catch(PDOException $e)
 {
  echo $e->getMessage(); 
  return false;
 }
 
}



 

//criar cliente
public function CreateCliente($cliente, $local, $telefone, $email)
 {
  try
  {
    
   $stmt = $this->db->prepare("INSERT INTO cliente( idcliente, nome, morada, telefone, email ) VALUES(default, :nome, :morada, :telefone, :email)");
   $stmt->bindparam(":nome",$cliente);
   $stmt->bindparam(":morada",$local);
   $stmt->bindparam(":telefone",$telefone);
   $stmt->bindparam(":email",$email);
   
   $stmt->execute();
   return true;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage(); 
   return false;
  }
  
 }


 //Apresentar Cliente
public function ComboCliente()
 {
  $stmt = $this->db->prepare("select * from cliente");
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
    ?>
          
         
    <tr>         
     <td><?php print($row['nome']); ?></td>
     <td><?php print($row['morada']); ?></td>
     <td><?php print($row['telefone']); ?></td>
     <td><?php print($row['email']); ?></td> 

                <td align="center">
                <a href="Edit_Cliente.php?edit_id=<?php print($row['idcliente']);?>"><i class="glyphicon glyphicon-pencil"></i> </a></td>
        
                
    </tr> 
   
                
        <?php
   }
  }
  else
  {
  
  }
  
 }


 //Apresentar em lista Cliente
public function ListCliente()
 {
  $stmt = $this->db->prepare("select * from cliente");
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
    ?>
          
     <option value="<?php print($row['idcliente']); ?>">
      <td><?php print($row['nome']); ?></td> 
    </option>
   
                
        <?php
   }
  }
  else
  {
  
  }
  
 }





  //Pegar ID do Stock
public function ComboClienteporID($id)
 {
  $stmt = $this->db->prepare("SELECT * FROM cliente where idcliente = :id");
   $stmt->bindparam(":id",$id);
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
          return $row;
   }
  }
  else
  {
  
  }
}



 public function create($fname,$lname,$email,$contact)
 {
  try
  {
   $stmt = $this->db->prepare("INSERT INTO tbl_users(first_name,last_name,email_id,contact_no) VALUES(:fname, :lname, :email, :contact)");
   $stmt->bindparam(":fname",$fname);
   $stmt->bindparam(":lname",$lname);
   $stmt->bindparam(":email",$email);
   $stmt->bindparam(":contact",$contact);
   $stmt->execute();
   return true;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage(); 
   return false;
  }
  
 }
 public function createcontacto($fname,$email,$zona,$dep,$voip,$tel1,$tel2,$empresa)
 {
  try
  {
   $stmt = $this->db->prepare("INSERT INTO pessoa(nome,email,id_area,id_zona,id_empresa) VALUES(:fname, :email, :id_area, :id_zona, :id_empresa)");
   $stmt->bindparam(":fname",$fname);
   $stmt->bindparam(":email",$email);
   $stmt->bindparam(":id_area",$dep);
   $stmt->bindparam(":id_zona",$zona);
   $stmt->bindparam(":id_empresa",$empresa);
   $stmt->execute();
   /* voip*/
   $stmt = $this->db->prepare("INSERT INTO contacto(numero,id_pessoa,id_tipo) VALUES(:fname, (select max(id_pessoa) from pessoa), 1)");
   $stmt->bindparam(":fname",$voip); 
   $stmt->execute();
   
   /* boss*/
   $stmt = $this->db->prepare("INSERT INTO contacto(numero,id_pessoa,id_tipo) VALUES(:fname, (select max(id_pessoa) from pessoa), 2)");
   $stmt->bindparam(":fname",$tel1);
   
   $stmt->execute();
   
    /* pessoal*/
   $stmt = $this->db->prepare("INSERT INTO contacto(numero,id_pessoa,id_tipo) VALUES(:fname, (select max(id_pessoa) from pessoa), 3)");
   $stmt->bindparam(":fname",$tel2);
   
   $stmt->execute();
   
   return true;
  }
  catch(PDOException $e)
  {
	  ?>
	  
    <div class="container">
	</br> </br>
	<div class="alert alert-warning">
    <strong> 
	
	<?php
	
  /* echo $e->getMessage();*/
  echo ('Erro! O Contacto '.$fname.' Já está Registrado no Sistema');
   
   
   ?>
   
   </strong> 
	</div>
	</div>
    <?php
   return false;
   
  }
  
 }
 
 
 public function getID($id)
 {
  $stmt = $this->db->prepare("SELECT * FROM tbl_users WHERE id=:id");
  $stmt->execute(array(":id"=>$id));
  $editRow=$stmt->fetch(PDO::FETCH_ASSOC);
  return $editRow;
 }
 
 public function getIDpessoa($id)
 {
	  $query = "SELECT p.id_pessoa, p.nome, p.email, a.descricao as Area, z.descricao as Zona, z.id_zona, a.id_area,  z.indicativo , c.numero as Voip  FROM pessoa p inner join area a on p.id_area=a.id_area inner join zona z on p.id_zona = z.id_zona inner join contacto c on c.id_pessoa = p.id_pessoa where p.id_pessoa = ".$id." order by p.nome, p.id_pessoa "; 

  $stmt = $this->db->prepare($query);
  $stmt->execute(array(":id"=>$id));
  $editRow=$stmt->fetch(PDO::FETCH_ASSOC);
  return $editRow;
 }
 
 public function update($id,$fname,$lname,$email,$contact)
 {
  try
  {
   $stmt=$this->db->prepare("UPDATE tbl_users SET first_name=:fname,last_name=:lname, email_id=:email, contact_no=:contact   WHERE id=:id ");
   $stmt->bindparam(":fname",$fname);
   $stmt->bindparam(":lname",$lname);
   $stmt->bindparam(":email",$email);
   $stmt->bindparam(":contact",$contact);
   $stmt->bindparam(":id",$id);
   $stmt->execute();
   
   return true; 
  }
  catch(PDOException $e)
  {
   echo $e->getMessage(); 
   return false;
  }
 }




 
public function logar($nome ,$senha)
 {
  /*try
  {*/
   
   //verfificar se tem primeiro
   
   
   $stmt1=$this->db->prepare("select nome, senha from users WHERE nome =:nome and senha =:senha");
   $stmt1->bindparam(":nome",$nome);
   $stmt1->bindparam(":senha",$senha);
   $stmt1->execute();
   $contacto = $stmt1 -> fetch(PDO::FETCH_ASSOC);
   //se o metodo fetch não retornar um array, significa que o ID não corresponde a um contacto
   
   if($stmt1->rowCount()>0)
   {
		 // session_start inicia a sessão
    session_start();
     
    $_SESSION['login'] = $nome;
    $_SESSION['senha'] = $senha;
	//header('location:pesquisar.php');
	echo "<script >	document.location='pesquisar.php'	</script>";
	
   }
  //Caso contrário redireciona para a página de autenticação
  
else {
    //Destrói
    session_destroy();
 
    //Limpa
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
 
    //Redireciona para a página de autenticação
	
	echo "<script >		document.location='login.php?falha=1'	</script>";
	
  //  header('location:login.php?falha="erro"');
     
}
    
 /* }
  catch(PDOException $e)
  {
   echo $e->getMessage(); 
   return false;
  }*/
 }




 public function delete($id)
 {
  $stmt = $this->db->prepare("DELETE FROM tbl_users WHERE id=:id");
  $stmt->bindparam(":id",$id);
  $stmt->execute();
  return true;
 }

  public function deletep($id)
 {
  $stmt = $this->db->prepare("DELETE FROM pessoa WHERE id_pessoa=:id");
  $stmt->bindparam(":id",$id);
  $stmt->execute();
  
  $stmt = $this->db->prepare("DELETE FROM contacto WHERE id_pessoa=:id");
  $stmt->bindparam(":id",$id);
  $stmt->execute();
  
  return true;
 }
 
 /*colocar os dados na combobox*/
 
 
 
 
 /*colocar os dados na combobox*/
 
 
 public function combozonaedtit($idzona)
 {
  $stmt = $this->db->prepare("select descricao, id_zona from zona");
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
    ?>
                
                
                <option <?php if($row['id_zona'] == $idzona)   print("SELECTED ");?> value=<?php print($row['id_zona']); ?> ><?php print($row['descricao']); ?></option>
				
               
                <?php
   }
  }
  else
  {
   ?>
             <option value="1">Erro ao Apresentar</option>
            <?php
  }
  
 }
 
  
 
 
 /* paging */
 
 public function dataview($query)
 {
  $stmt = $this->db->prepare($query);
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
	 
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
    ?>
                <tr>
                
                <td><?php print($row['nome']); ?></td>
                <td><?php print($row['email']); ?></td>
                <td><?php print($row['Area']); ?></td>
                <td><?php print($row['Zona']); ?></td>
				
				<td><?php print($row['boss']); ?></td>
                <td><?php print($row['Voip']); ?></td>
				
				 
				<td align="center">
                <a href="ver.php?edit_id=<?php print($row['id_pessoa']); ?>&empresa=<?php print($row['id_empresa']); ?>&nome=<?php print($row['nome']); ?>&email=<?php print($row['email']); ?>&Area=<?php print($row['Area']); ?>&Zona=<?php print($row['Zona']); ?>&indicativo=<?php print($row['indicativo']); ?>&Voip=<?php print($row['Voip']); ?>"><i class="glyphicon glyphicon-search"></i></a>
                </td>
                <td align="center">
                <a href="editar.php?edit_id=<?php print($row['id_pessoa']); ?>&empresa=<?php print($row['id_empresa']); ?>&nome=<?php print($row['nome']); ?>&email=<?php print($row['email']); ?>&Area=<?php print($row['Area']); ?>&Zona=<?php print($row['Zona']); ?>&indicativo=<?php print($row['indicativo']); ?>&Voip=<?php print($row['Voip']); ?>"><i class="glyphicon glyphicon-pencil"></i></a>
                </td>
                <td align="center">
                <a href="deletar.php?edit_id=<?php print($row['id_pessoa']); ?>&empresa=<?php print($row['id_empresa']); ?>&nome=<?php print($row['nome']); ?>&email=<?php print($row['email']); ?>&Area=<?php print($row['Area']); ?>&Zona=<?php print($row['Zona']); ?>&indicativo=<?php print($row['indicativo']); ?>&Voip=<?php print($row['Voip']); ?>"><i class="glyphicon glyphicon-trash"></i></a>
                </td>
				
                </tr>
                <?php
   }
   
  }
  else
  {
   ?>
            <tr>
            <td colspan="10" align="center" >Nenhum Registo Encontrado...</td>
            </tr>
            <?php
  }
  
 }
 
 public function dataview1($query)
 {
  $stmt = $this->db->prepare($query);
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
	 
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
    ?>
                <tr>
              
                <td><?php print($row['nome']); ?></td>
                <td><?php print($row['email']); ?></td>
                <td><?php print($row['Area']); ?></td>
                <td><?php print($row['Zona']); ?></td>
				
				<td><?php print($row['boss']); ?></td>
                <td><?php print($row['Voip']); ?></td>
				
				 
				<td align="center">
                <a href="verb.php?edit_id=<?php  print($row['id_pessoa']); ?>&empresa=<?php print($row['id_empresa']); ?> &nome=<?php print($row['nome']); ?>&email=<?php print($row['email']); ?>&Area=<?php print($row['Area']); ?>&Zona=<?php print($row['Zona']); ?>&indicativo=<?php print($row['indicativo']); ?>&Voip=<?php print($row['Voip']); ?>"><i class="glyphicon glyphicon-search"></i></a>
                </td>
                
				
                </tr>
                <?php
   }
   
  }
  else
  {
   ?>
            <tr>
            <td colspan="10" align="center" >Nenhum Registo Encontrado...</td>
            </tr>
            <?php
  }
  
 }
 
 public function paging($query,$records_per_page)
 {
  $starting_position=0;
  if(isset($_GET["page_no"]))
  {
   $starting_position=($_GET["page_no"]-1)*$records_per_page;
  }
  $query2=$query." limit $starting_position,$records_per_page";
  return $query2;
 }
 
 public function paginglink($query,$records_per_page)
 {/*
  
  $self = $_SERVER['PHP_SELF'];
  
  $stmt = $this->db->prepare($query);
  $stmt->execute();
  
  $total_no_of_records = $stmt->rowCount();
  
  if($total_no_of_records > 0)
  {
   ?><ul class="pagination"><?php
   $total_no_of_pages=ceil($total_no_of_records/$records_per_page);
   $current_page=1;
   if(isset($_GET["page_no"]))
   {
    $current_page=$_GET["page_no"];
   }
   if($current_page!=1)
   {
    $previous =$current_page-1;
    echo "<li><a href='".$self."?page_no=1&pesquisa=".$_GET["pesquisa"]."'>Primeira</a></li>";
    echo "<li><a href='".$self."?page_no=".$previous."&pesquisa=".$_GET["pesquisa"]."'>Anterior</a></li>";
   }
   for($i=1;$i<=$total_no_of_pages;$i++)
   {
    if($i==$current_page)
    {
     echo "<li><a href='".$self."?page_no=".$i."&pesquisa=".$_GET["pesquisa"]."' style='color:red;'>".$i."</a></li>";
    }
    else
    {
     echo "<li><a href='".$self."?page_no=".$i."&pesquisa=".$_GET["pesquisa"]."'>".$i."</a></li>";
    }
   }
   if($current_page!=$total_no_of_pages)
   {
    $next=$current_page+1;
    echo "<li><a href='".$self."?page_no=".$next."&pesquisa=".$_GET["pesquisa"]."'>Proxima</a></li>";
    echo "<li><a href='".$self."?page_no=".$total_no_of_pages."&pesquisa=".$_GET["pesquisa"]."'>Ultima</a></li>";
   }*/




	
  
  $self = $_SERVER['PHP_SELF'];
  
  $stmt = $this->db->prepare($query);
  $stmt->execute();
  
  $total_no_of_records = $stmt->rowCount();
  
  if($total_no_of_records > 0)
  {
   ?><ul class="pagination"><?php
   $total_no_of_pages=ceil($total_no_of_records/$records_per_page);
   $current_page=1;
   if(isset($_GET["page_no"]))
   {
    $current_page=$_GET["page_no"];
   }
   if(isset($_GET["pesquisa"]))
   {
    $parametro=$_GET["pesquisa"];
   }else{$parametro="";}
   
   if($current_page!=1)
   {
    $previous =$current_page-1;
    echo "<li><a href='".$self."?page_no=1&pesquisa=".$parametro."'>Primeira</a></li>";
    echo "<li><a href='".$self."?page_no=".$previous."&pesquisa=".$parametro."'>Anterior</a></li>";
   }
   for($i=1;$i<=$total_no_of_pages;$i++)
   {
    if($i==$current_page)
    {
     echo "<li><a href='".$self."?page_no=".$i."&pesquisa=".$parametro."' style='color:red;'>".$i."</a></li>";
    }
    else
    {
     echo "<li><a href='".$self."?page_no=".$i."&pesquisa=".$parametro."'>".$i."</a></li>";
    }
   }
   if($current_page!=$total_no_of_pages)
   {
    $next=$current_page+1;
    echo "<li><a href='".$self."?page_no=".$next."&pesquisa=".$parametro."'>Proxima</a></li>";
    echo "<li><a href='".$self."?page_no=".$total_no_of_pages."&pesquisa=".$parametro."'>Ultima</a></li>";
   }
		


   ?></ul><?php
  }
 }
 
 /* paging */
 
}
