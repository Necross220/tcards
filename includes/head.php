<?php session_start();

    //Header root for files
    $_ROOT = $_SERVER['DOCUMENT_ROOT'];
    $_NAME = $_SERVER['SERVER_NAME'];

    //Dependencies
    require_once "{$_ROOT}/data/data_connection.php";
    require_once "{$_ROOT}/data/utilities.php";
    require_once "{$_ROOT}/data/data_cards.php";


    //Decaracion de librerias?
    $utl = new utilities();
    $conn = new data_connection();
    $main = new data_cards();

    if(isset($_SESSION['logged_in'])){
        if($_SESSION['logged_in'] === false){
            header('Location: ./login.php');
        }
    }else{
        header('Location: ./login.php');
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!--Tittle-->
    <title>TCards</title>
    <link rel="shortcut icon" href="/src/images/temple-icon.png" type="image/x-icon">
    <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
    <!--blueskin-->
    <link rel="stylesheet" href="/dist/css/skins/skin-blue.min.css">
    <!-- CUstom CSS -->
    <link rel="stylesheet" href="/css/styles.css">

    <!-- REQUIRED JS SCRIPTS -->
    <!-- jQuery 3 -->
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- DataTable JS & CSS -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <!-- Bootstrap 3.3.7 -->
    <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.min.js"></script>
    <script src="/js/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- DataTable JS & CSS -->
    <link rel="stylesheet" href="/css/jquery.dataTables.min.css">
    <script src="/js/jquery.dataTables.min.js"></script>
    <script src="/js/dataTables.buttons.min.js"></script>
    <script src="/js/buttons.print.min.js"></script>
    <script src="/js/jszip.min.js"></script>
    <script src="/js/pdfmake.min.js"></script>
    <script src="/js/vfs_fonts.js"></script>
    <script src="/js/buttons.html5.min.js"></script>
    <script src="/js/spanish.json" type="application/json"></script>

    <!-- Custom Javascript-->
    <script src="/js/app.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="./" class="logo" style="display: none;">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <img src="/src/images/temple-icon.png" width="50" height="50" alt="logo-mini" id="logo-mini" class="logo-mini">
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Notifications Menu -->
                    <li class="dropdown notifications-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning" id="notifications_counts"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header"><center><b class="text-center">Notificaciones de Tarjetas</b></center></li>
                            <li>
                                <!-- Inner Menu: contains the notifications -->
                                <ul class="menu" id="notifications">
                                    <li><a href='#'><i class='fa fa-question-circle text-yellow'></i> Hay <b id="txtFuera">0</b> tarjeta(s) fuera</a></li>
                                    <li><a href='#'><i class='fa fa-exclamation-circle text-red'></i> Hay <b id="txtVencidas">0</b> tarjeta(s) vencidas</a></li>
                                </ul>
                            </li>
                            <li class="footer">
                                <center><b class="text-center"><a href="#">Ir a reportes <i class="fa fa-share-square-o"></i></a></b></center></li>
                        </ul>
                    </li>
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{OBED URI}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                <p>
                                    [USERNAME AQUI]
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row text-center">
                                    <button type="button" class="btn btn-default">Perfil</button>
                                    <button type="button" class="btn btn-default">Configurar</button>
                                    <button type="button" class="btn bg-maroon">Salir</button>
                                </div>
                                <!-- /.row -->
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <center>
                <a href="./"><img style="display: block !important;" src="/src/images/temple-icon.png" width="auto" height="92" alt="logo-lg" id="logo" class="logo-lg"></a>
            </center>
            <!-- Menu -->
            <ul class="sidebar-menu" id="sidebar-menu" datax-widget="tree"></ul>
            <!-- /.enu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <script type="application/javascript">
        if($ !== jQuery){
            console.log('JQuery no inició correctamente.');
        } //checks if jquery is loading before the body

        //Brings menues
        post_request('controllers/main_control.php', $('#sidebar-menu'), {case: 'get_menu'});

        //Brings titles of pages and their description.
        // post_request('controllers/main_control.php', $('#sidebar-menu'), {case: 'get_page_desc'}, function(data){
        //     $('#page_title').html(data)
        // });

        //Brings notifications
        post_request('controllers/main_control.php', '', {case: 'get_notifications'}, function(data){
            data = JSON.parse(data);
            $('#notifications_counts').html(data.total_warnings);
            $('#txtFuera').html(data.fuera_tarjetas);
            $('#txtVencidas').html(data.vencidas_tarjetas);
        });

        $('.sidebar-toggle').click(function(){
            $('#logo').toggle();
            $('.logo').toggle();
        });
    </script>