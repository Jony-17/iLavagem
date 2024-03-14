<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
require_once('./conn/conn.php');
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inserir nome do serviço</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code_servico.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Nome do serviço </label>
                <input type="text" name="nome" class="form-control" placeholder="Inserir nome">
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="submit" name="inserirbtn_servico" class="btn btn-primary">Guardar</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Inserir e eliminar serviços
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Inserir 
            </button>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">
    <?php
                $query = "SELECT * FROM servicos";
                $query_run = mysqli_query($conn, $query);
            ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Nome da peça </th>
            <th> Ação </th>
            <!--<th> Preço </th>-->
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
                                <td>
                                <form action="code4.php" method="post">
                                        <input type="hidden" name="delete_nome" value="<?php echo $row['nome']; ?>">
                                        <button type="submit" name="deletebtn_servico" class="btn btn-danger"> ELIMINAR</button>
                                    </form>
                                </td>
                                <!--<td><?php  echo $row['preco']; ?></td>-->
                            </tr>
                            <?php
                            } 
                        }
                        else {
                            echo "Não foram inseridos serviços";
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