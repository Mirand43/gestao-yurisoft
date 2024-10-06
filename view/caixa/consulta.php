<br>
<br>
<div class="container">


<form class="form-inline my-2 my-lg-0">
                 
<p>
            <!-- Button Modal para cadastrar Cliente-->
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
    Cadastrar cliente
  </button>

          
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </p>
        
        </form>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Código do produto</th>
      <th scope="col">Produto</th>
      <th scope="col">Preço</th>
      <th scope="col">Quantidade</th>
    </tr>
  </thead>
  <tbody>


  </tbody>
</table>

</div>
  

<script src="../js/jquery.slim.min.js"></script>
<script src="../js/bootstrap.js"></script>


<!-- Modal cadastrar Cliente -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include "Add_cliente.php"; ?>

      </div>
    </div>
  </div>
</div>



</body>
</html>