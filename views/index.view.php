    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Page Header
                <small>Optional description</small>
            </h1>
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
                            <h3 id="total_tarjetas">150</h3>

                            <p>Total tarjetas</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>53<sup style="font-size: 20px">%</sup></h3>

                            <p>Bounce Rate</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>44</h3>

                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>65</h3>

                            <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->

            <div class="input-group input-group-lg">
                <input type="text" class="form-control">
                <span class="input-group-btn">
                      <button type="button" class="btn btn-info btn-flat">Buscar</button>
                    </span>
            </div>

            <input type="checkbox" checked data-toggle="toggle">
            <button id="satest">Sweet alert</button>

            <div id="cardsMainWrap"></div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script>

        $(document).ready(function(){

            post_request('./controllers/index_control.php','#cardsMainWrap', {case: 'get_cards'}, function () {
                $('#cardsMain').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy',
                        'excel',
                        'csv',
                        'pdf',
                        'print'
                    ],
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
                    }
                });
            });

            post_request('./controllers/index_control.php','#total_tarjetas', {case: 'get_dashboard'}, function(data){

            });

            $('#satest').click(function(){
                Swal.fire({
                    title: 'Error!',
                    text: 'Do you want to continue',
                    type: 'error',
                    confirmButtonText: 'Cool'
                });
            });
        });

    </script>