<?php
require_once('./conn/conn.php');
?>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <div class="sidebar-brand-icon rotate-n-15">
    </div>
    <div id="logo">
        <a href="/ilavagem/admin/index.php">
            <h1><span class="cinza">i</span>Lavagem</h1>
        </a>
    </div></a>

    <style>
    /* Edição Navbar --> logo */

    #logo a {
        text-decoration: none;
    }

    #logo h1 {
        padding-top: 20px;
        margin-left: 25px;
        color: #2a91e6;
        font-family: alternate-gothic-atf, sans-serif;
    }

    .cinza {
        color: lightgrey;
    }
    </style>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-folder-minus"></i>
            <span>Menu</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <li class="nav-item">
        <a class="nav-link" href="perfis.php">
            <i class="fas fa-address-card"></i>
            <span>Perfis Utilizadores</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="encomenda.php">
            <i class="fas fa-shopping-cart"></i>
            <span>Encomendas</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="inserir_servico.php">
            <i class="fas fa-folder-plus"></i>
            <span>Inserir e eliminar serviços</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="inserir_peca.php">
            <i class="fas fa-folder-plus"></i>
            <span>Inserir peças</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="add.php">
            <i class="fas fa-edit"></i>
            <span>Editar peças</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="del.php">
            <i class="fas fa-trash-alt"></i>
            <span>Eliminar peças</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                    aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                </li>

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                            ADMIN
                        </span>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>-->
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->


        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tem a certeza que quer sair?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Selecione "Logout" para terminar sessão.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>

                        <form action="/ilavagem/areacliente/login/" method="POST">

                            <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>

                        </form>


                    </div>
                </div>
            </div>
        </div>