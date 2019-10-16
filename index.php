<?php
    require_once 'includes/head.php';
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 id="page_title">
                Dashboard
            </h1>
            <small id="page_desc">Reporterria, despacho </small>

            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3 id="total_tarjetas">-
                            </h3>

                            <p>Total tarjetas</p>
                        </div>
                        <div class="icon">
                            <i class="fa  fa-clipboard"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Más información <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3 id="dentro_tarjetas">-</h3>

                            <p>Tarjetas en caja</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-archive"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Más información <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3 id="fuera_tarjetas">-</h3>

                            <p>Tarjetas fuera</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-question-circle"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Más información <i class="fa fa-question-circle"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3 id="vencidas_tarjetas">-</h3>

                            <p>Tarjetas vencidas</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-exclamation-circle"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Más información <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
            </div>

            <br>
            <!-- /.row -->

            <div class="input-group input-group-lg">
                <input id="searchbar" type="number" class="form-control">
                <span class="input-group-btn">
                      <button type="button" id="search_cards" class="btn btn-info btn-flat">Buscar</button>
                    </span>
            </div>

            <br>

            <div id="cardsMainWrap"></div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script>

        $(document).ready(function(){

            post_request('./controllers/index_control.php','#cardsMainWrap', {case: 'get_cards'});

            post_request('./controllers/index_control.php','', {case: 'get_dashboard'}, function(data){

                data = JSON.parse(data);

                $('#total_tarjetas').html(data.total_tarjetas);
                $('#dentro_tarjetas').html(data.dentro_tarjetas);
                $('#fuera_tarjetas').html(data.fuera_tarjetas);
                $('#vencidas_tarjetas').html(data.vencidas_tarjetas);
            });
        });

        $('#search_cards').click(function(){

            search_cards($('#searchbar').val(), '#cardsMainWrap')

        });

    </script>


<?php
    require_once 'includes/footer.php';
?>