<?php
    require_once "{$_SERVER['DOCUMENT_ROOT']}/includes/head.php";
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 id="page_title">
                Registry
            </h1>
            <small id="page_desc">This is CRUD!!</small>

            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

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

            post_request('controllers/registry_control.php','#cardsMainWrap', {case: 'get_cards_crud'});

        });

        $('#search_cards').click(function(){

            search_cards($('#searchbar').val(), '#cardsMainWrap')

        });

    </script>


<?php
    require_once "{$_ROOT}/includes/footer.php";
?>