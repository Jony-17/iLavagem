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
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="inserir_encomenda.php" method="POST">

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="inserir_encomenda_btn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Encomendas dos utilizadores
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">
    <?php
                $query = "SELECT * FROM encomenda";
                $query_run = mysqli_query($conn, $query);
            ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID da encomenda </th>
            <th> ID do utilizador </th>
            <th> Serviço </th>
            <th> Origem </th>
            <th> Destino </th>
            <th> Ação </th>
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
                                <td><?php  echo $row['encomenda_id']; ?></td>
                                <td><?php  echo $row['utilizador_id']; ?></td>
                                <td>Lavagem<!--<?php  echo $row['encomenda_id']; ?>--></td>
                                <td><?php  echo $row['origem']; ?></td>
                                <td><?php  echo $row['destino']; ?></td>
                                <td>
                                    <form action="inserir_encomenda.php" method="post">
                                        <button type="submit" name="inserir_encomenda_btn1" class="btn btn-primary">EM PROCESSAMENTO</button>
                                        <button type="submit" name="inserir_encomenda_btn2" class="btn btn-primary">A SER ENTREGUE</button>
                                        <button type="submit" name="inserir_encomenda_btn3" class="btn btn-primary">CONCLUÍDA</button>
                                    </form>
                                </td>
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