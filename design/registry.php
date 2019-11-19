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
            <div id="cardsMainWrap"></div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script>

        $(document).ready(function(){
            get_cards();
            get_folders(0);
            get_langs(0, $('#card_lang'));
        });

        $('#search_cards').click(() => {
            search_cards($('#searchbar').val(), '#cardsMainWrap')
        });


        $(document).on('click', '#btn_save_card', () => {

            new_cards(
                $('#card_number').val(),
                $('#card_name').val(),
                $('#card_lang option:selected').val(),
                $('#card_folder option:selected').val(),
                $('#card_holder').val(),
                $('#card_state').is(':checked') === true ? 1 : 0,
                $('#card_creator').val(),
                $('#card_creation').val(),
                $('#card_activo').is(':checked')  === true ? 1 : 0)
        });

        $(document).on('click', '[name=card_edit]', () => {
            $('#newcards').modal('toggle');
        });

        $(document).on('click', '[name=card_remove]', () => {
            Swal.fire({
                title: '¿Está seguro?',
                text: "Si borra la tarjeta se perderá por siempre.",
                imageUrl: '../src/images/remove-alert.png',
                imageWidth: 92,
                imageHeight: 92,
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Si, Borrar'
            }).then((result) => {
                if (result.value) {
                    let obj = {
                        case: 'remove_card',
                        id: $(this).closest('tr').find()
                    };

                    post_request('controllers/registry_control.php', '', obj);

                    Swal.fire(
                        'Listo',
                        'La tajeta ha sido eliminada',
                        'success'
                    );
                }
            })
        });

    </script>


<?php
    require_once "{$_ROOT}/includes/footer.php";
?>