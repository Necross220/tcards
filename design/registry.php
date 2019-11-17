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

        //Declaaaracion de variables globales
        let $cards_wrap = $('#cardsMainWrap');
        let $cards_number = $('#card_number').val();
        let $cards_name = $('#card_name').val();
        let $cards_folder = $('#card_folder').val();
        let $cards_holder = $('#card_holder').val();
        let $cards_state = $('#card_state').is('checked') === true ? 1 : 0;
        let $cards_creator = $('#card_creator').val();
        let $cards_creation = $('#card_creation').val();
        let $cards_active = $('#card_activo').is('checked')  === true ? 1 : 0;

        $(document).ready(function(){
            get_cards();
            get_folders(0);
        });

        $('#search_cards').click(() => {
            search_cards($('#searchbar').val(), '#cardsMainWrap')
        });


        $(document).find('#btn_save_card').on('click', function () {
            new_cards($cards_number,$cards_name,$cards_folder,$cards_holder,$cards_state,$cards_creator,$cards_creation,$cards_active)
        });

        //functions
        function get_cards(){
            var obj = {
                case: 'get_cards_crud'
            };
            post_request('controllers/registry_control.php','#cardsMainWrap', obj,'',true, '#messenger');
        }


        function get_folders($cards_folder = 0){
            var obj = {
                case: 'get_folders',
                folder: $cards_folder
            };
            post_request('controllers/registry_control.php','#card_folder', obj,'',true, '#messenger');
        }

        function new_cards($cards_number,$cards_name,$cards_folder,$cards_holder,$cards_state,$cards_creator,$cards_creation,$cards_active){

            //Clean all the inputs
            $('card_number').html('');
            $('card_name').html('');
            $('card_folder').html('');
            $('card_holder').html('');
            $('card_creator').html('');
            $('card_creation').html('');

            var obj = {
                case: 'new_cards',
                number: $cards_number.val(),
                name: $cards_name.val(),
                folder: $cards_folder.val(),
                holder: $cards_holder.val(),
                state: $cards_state,
                creator: $cards_creator.val(),
                creation: $cards_creation.val(),
                active: $cards_active,
            };

            post_request('controllers/registry_control.php', '#msg_new_cards', obj,function(){});
        }

    </script>


<?php
    require_once "{$_ROOT}/includes/footer.php";
?>