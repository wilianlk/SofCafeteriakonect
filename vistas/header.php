<?php
if (strlen(session_id()) < 1)
    session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Konecta </title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="../public/css/bootstrap.min.css">


    <link rel="stylesheet" href="../public/css/font-awesome.min.css">

    <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../public/css/_all-skins.min.css">

    <link rel="stylesheet" href="img/apple-touch-ico.png">
    <link rel="stylesheet" href="img/favicon.ico">

    <link rel="stylesheet" href="../public/datatables/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../public/datatables/buttons.dataTables.min.css">
    <link rel="stylesheet" href="../public/datatables/responsive.dataTables.min.css">
    <link rel="stylesheet" href="../public/css/bootstrap-select.min.css">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">

        <a href="escritorio.php" class="logo">

            <span class="logo-mini"><b>Kone</b> cta</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg" style="text-transform: capitalize"><b> Konecta </b></span>
        </a>

        <nav class="navbar navbar-static-top">

            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">NAVEGACIÓM</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="user-image"
                                 alt="User Image">
                            <span class="hidden-xs"><?php echo $_SESSION['nombre']; ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="img-circle"
                                     alt="User Image">

                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Perfil</a>
                                </div>
                                <div class="pull-right">
                                    <a href="../ajax/usuario.php?op=salir" class="btn btn-default btn-flat">Salir</a>
                                </div>
                            </li>
                        </ul>
                    </li>


                </ul>
            </div>
        </nav>
    </header>

    <aside class="main-sidebar">

        <section class="sidebar">

            <ul class="sidebar-menu" data-widget="tree">

                <br>
                <?php
                if ($_SESSION['escritorio'] == 1) {
                    echo ' <li><a href="escritorio.php"><i class="fa  fa-home"></i> <span style="text-transform: capitalize;font-weight: bold;">Inicio</span></a>
        </li>';
                }
                ?>
                <?php
                if ($_SESSION['almacen'] == 1) {
                    echo ' <li class="treeview">
          <a href="#">
            <i class="fa fa-product-hunt"></i> <span style="text-transform: capitalize;font-weight: bold;">Productos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="articulo.php" style="font-weight: bold;"><i class="fa fa-circle-o"></i> Articulos</a></li>
            <li><a href="categoria.php" style="font-weight: bold;"><i class="fa fa-circle-o"></i> Categorias</a></li>
          </ul>
        </li>';
                }
                ?>

                <?php
                if ($_SESSION['ventas'] == 1) {
                    echo '<li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-bag"></i> <span style="text-transform: capitalize;font-weight: bold;">Ventas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="venta.php" style="font-weight: bold;"><i class="fa fa-check-circle-o"></i> ventas</a></li>
            <li><a href="cliente.php" style="font-weight: bold;"><i class="fa fa-check-circle-o"></i> clientes</a></li>
          </ul>
        </li>';
                }
                ?>

                <?php
                if ($_SESSION['acceso'] == 1) {
                    echo '  <li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i> <span style="text-transform: capitalize;font-weight: bold;">Acceso</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="usuario.php" style="font-weight: bold;"><i class="fa fa-circle-o"></i> Usuarios</a></li>
            <li><a href="permiso.php" style="font-weight: bold;"><i class="fa fa-circle-o"></i> Permisos</a></li>
          </ul>
        </li>';
                }
                ?>


                <?php
                if ($_SESSION['consultav'] == 1) {
                    echo '<li class="treeview">
          <a href="#">
            <i class="fa fa-bar-chart"></i> <span style="text-transform: capitalize;font-weight: bold;">Consulta Ventas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="ventasfechacliente.php" style="font-weight: bold;"><i class="fa fa-circle-o"></i> Consulta Ventas</a></li>

          </ul>
        </li>';
                }
                ?>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>