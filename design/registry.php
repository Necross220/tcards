<?php
    require_once "{$_SERVER['DOCUMENT_ROOT']}/includes/head.php";
    require "../design/modals/modal_new_cards.php";
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
                      <button type="button" id="new_cards" class="btn btn-info btn-flat bg-teal-active" data-toggle="modal" data-target="#newcards"><i class="fa fa-plus"></i> Nueva</button>
                      <button type="button" id="search_cards" class="btn btn-info btn-flat"><i class="fa fa-search"></i> Buscar</button>
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
            get_cards();
            get_folders(0);
            get_langs(0, $('#langs'));
        });

        $('#search_cards').click(() => {
            search_cards($('#searchbar').val(), '#cardsMainWrap')
        });


        $(document).find('#btn_save_card').on('click', function () {

            new_cards(
                $('#card_number').val(),
                $('#card_name').val(),
                $('#card_folder').val(),
                $('#card_holder').val(),
                $('#card_state').is('checked') === true ? 1 : 0,
                $('#card_creator').val(),
                $('#card_creation').val(),
                $('#card_activo').is('checked')  === true ? 1 : 0)
        });

    </script>


<?php
    require_once "{$_ROOT}/includes/footer.php";
?>