<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
require_once('./conn/conn.php');
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inserir serviços</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Nome do serviço </label>
                <input type="text" name="nome" class="form-control" placeholder="Inserir nome">
            </div>
            <div class="form-group">
                <label>Preço da peça</label>
                <input type="text" name="preco" class="form-control" placeholder="Inserir preço">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="submit" name="inserirbtn" class="btn btn-primary">Guardar</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Inserir peças
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Inserir 
            </button>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">
    <?php
                $query = "SELECT * FROM lavagem_seco";
                $query2 = "SELECT * FROM planos_preco_unico";
                $query_run = mysqli_query($conn, $query);
                $query2_run = mysqli_query($conn, $query2);

            ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Nome da peça </th>
            <th> Preço </th>
          </tr>
        </thead>
        <tbody>
        <?php
                        if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                        ?>
                            <tr>
                                <td><?php  echo $row['nome']; ?></td>
                                <td><?php  echo $row['preco']; ?></td>
                            </tr>
                            <?php
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                        ?>
        <?php
                        if(mysqli_num_rows($query2_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query2_run))
                            {
                        ?>
                            <tr>
                                <td><?php  echo $row['nome']; ?></td>
                                <td><?php  echo $row['preco']; ?></td>
                            </tr>
                            <?php
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                        ?>
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
?>