<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
require_once('./conn/conn.php');
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Inserir dados das peças</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST">

                <div class="modal-body">

                    <div class="form-group">
                        <label> Nome da peça </label>
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
            <h6 class="m-0 font-weight-bold text-primary">Editar peças
            </h6>
        </div>

        <div class="card-body">
            <?php

    if(isset($_POST['edit_btn']))
    {
        $lavagem_id = $_POST['edit_id'];
                
                $query = "SELECT * FROM lavagem_seco WHERE lavagem_id='$lavagem_id' ";
                $query_run = mysqli_query($conn, $query);

                $query2 = "SELECT * FROM planos_preco_unico WHERE lavagem_id='$lavagem_id' ";
                $query2_run = mysqli_query($conn, $query2);

                foreach($query_run as $row)
                {
                    ?>
            <form action="code2.php" method="POST">

                <input type="hidden" name="edit_id" value="<?php echo $row['lavagem_id'] ?>">

                <div class="form-group">
                    <label>Nome da peça</label>
                    <input type="nome" name="edit_nome" value="<?php echo $row['nome'] ?>" class="form-control"
                        placeholder="Inserir Nome">
                </div>
                <div class="form-group">
                    <label>Preço da peça</label>
                    <input type="preco" name="edit_preco" value="<?php echo $row['preco'] ?>" class="form-control"
                        placeholder="Inserir Preço">
                </div>

                <a href="add.php" class="btn btn-danger"> Cancelar </a>
                <button type="submit" name="updatebtn" class="btn btn-primary"> Update </button>

            </form>
            <?php
                }
            }
        ?>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
?>