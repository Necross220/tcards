
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Iniciar sesión</title>
    <link rel="shortcut icon" href="src/images/temple-icon.png" type="image/x-icon">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- jQuery 3 -->
    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js"></script>
    <link href="//gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="//gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>


    <style>
        .login-page, .register-page {
            background-image: url(src/images/loginbg.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: bottom;
            background-blend-mode: multiply;
        }
    </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <img src="src/images/temple-icon.png" width="50px" height="50" alt="TCards"> <b>T</b>Cards
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">


        <form action="../../index2.html" method="post">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> Recuerdame
                        </label>
                    </div>
                </div>
                <br>
                <!-- /.col -->
                <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar sesión</button>
                </div>
                <!-- /.col -->
            </div>
        </form>.
        <br>

        <div class="text-center">
            <a href="#">Olvide mi contraseña</a><br>
            <a href="register.html" class="text-center">Crear cuenta</a>
        </div>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>
</html>
