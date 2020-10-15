<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url?>bandeja/entrada" class="brand-link">
        <img src="<?=base_url?>views/assets/img/logo.png" alt="Grupo Guardado"
            class="brand-image img-fluid  elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Grupo Guardado</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) NOMBRE DE USUARIO-->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <span style="color: white;">
                    <i class="fas fa-user-circle fa-2x img-circle elevation-2" alt="User Image"></i>
                </span>
            </div>
            <div class="info">
                <a href="<?=base_url?>Perfil/VerDatos" class="d-block"><?=$_SESSION["nombre_usuario"];?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?=base_url?>bandeja/entrada" class="nav-link">
                        <i class="fas fa-envelope"></i>
                        <p>Bandeja de Entrada</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url?>pedidos/nuevo" class="nav-link">
                        <i class="fas fa-cart-plus"></i>
                        <p>Nuevo Pedido</p>
                    </a>
                </li>
                <li class="nav-header"><b>ADMINISTRADOR</b></li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cogs"></i>
                        <p>
                            Configuraciones
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?=base_url?>usuario/listado" class="nav-link">
                                <i class="fas fa-users"></i>
                                <p> Usuarios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=base_url?>estados/listado" class="nav-link">
                                <i class="far fa-folder-open"></i>
                                <p> Estados</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=base_url?>roles/listado" class="nav-link">
                                <i class="fas fa-ad"></i>
                                <p> Crear Roles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=base_url?>observaciones/listado" class="nav-link">
                                <i class="fas fa-puzzle-piece"></i>
                                <p> Add Observacion a Estado</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=base_url?>graficos/listado" class="nav-link">
                                <i class="fas fa-chart-bar"></i>
                                <p>Grafico</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<div class="content-wrapper p-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">