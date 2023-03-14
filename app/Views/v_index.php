<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Arsip | <?= $judul ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url('template') ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('template') ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('template') ?>/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('template') ?>/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('template') ?>/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url('template') ?>/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        .content .content-home h1 {
            margin-top: 150px;
            justify-content: center;
            text-transform: capitalize;
            font-weight: 900;
            font-size: 34px;

        }

        .content img {
            margin-top: 80px;
            margin-left: 30px;
        }
    </style>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->

<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

        <header class="main-header">
            <nav class="navbar navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <a href="" class="navbar-brand"><b>E-Arsip</b> </a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="<?= $menu == 'home' ? 'active' : '' ?>"><a href="<?= base_url('Arsip') ?>">Home <span class="sr-only">(current)</span></a></li>
                            <li class="dropdown <?= $menu == 'arsip' ? 'active' : '' ?>">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown">Arsip <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li class="<?= $submenu == 'data-arsip' ? 'active' : '' ?>"><a href="<?= base_url('Arsip/DetailData') ?>">Data Arsip</a></li>
                                    <li class="<?= $submenu == 'buat-arsip' ? 'active' : '' ?>"><a href="<?= base_url('Arsip/add') ?>">Tambah Arsip</a></li>
                                </ul>
                            </li>
                            <li class="<?= $menu == 'bantuan' ? 'active' : '' ?>"><a href="https://web.whatsapp.com/">Bantuan</a></li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->

                            <!-- User Account Menu -->
                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- The user image in the navbar-->
                                    <img src="<?= base_url('foto/' . session()->get('foto')) ?>" class="user-image" alt="User Image">
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs"><?= session()->get('nama_user') ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        <img src="<?= base_url('foto/' . session()->get('foto')) ?>" class="img-circle" alt="User Image">
                                        <p>
                                            <?= session()->get('nama_user') ?>
                                            <!-- <small> <?= date('d-M-Y')  ?></small> -->
                                            <small><i class="fa fa-circle text-success"></i> Online</small>
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="text-center">
                                            <?php
                                            if (session()->get('level') == 1) { ?>
                                                <a class="nav-link btn btn-primary" href="<?= base_url('Home') ?>">
                                                    <i class="fa fa-sign-out"></i> Dashboard
                                                </a>
                                            <?php } else { ?>

                                                <a class="nav-link btn btn-primary" href="<?= base_url('Auth/Logout') ?>">
                                                    <i class="fa fa-sign-out"></i> Logout
                                                </a>


                                            <?php } ?>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-custom-menu -->
                </div>
                <!-- /.container-fluid -->
            </nav>
        </header>
        <!-- Full Width Column -->
        <div class="content-wrapper">
            <div class="container">
                <!-- Content Header (Page header) -->
                <!-- <section class="content-header">
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Top Navigation</li>
                    </ol>
                </section> -->

                <!-- Main content -->
                <section class="content">
                    <?php if ($isi) {
                        echo view($isi);
                    } ?>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.container -->
        </div>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="container text-center">
            <strong>Copyright &copy; All rights
                reserved.</strong>
        </div>
        <!-- /.container -->
    </footer>
    </div>

    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="<?= base_url('template') ?>/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- DataTables -->
    <script src="<?= base_url('template') ?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('template') ?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url('template') ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?= base_url('template') ?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url('template') ?>/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- Aos  -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- AdminLTE App -->
    <script src="<?= base_url('template') ?>/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('template') ?>/dist/js/demo.js"></script>
    <script>
        window.setTimeout(function() {
            $('.alert').fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            })
        }, 2500)


        AOS.init();
    </script>
    <script>
        $(function() {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false,
            })
        })
    </script>
</body>

</html>