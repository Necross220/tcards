<div class="modal fade" id="newcards" tabindex="-1" role="dialog" aria-labelledby="newcards" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-folder-o"></i> Crear tarjetas</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-close"></i></span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="card_number">Número:</label>
                            <input type="number" name="card_number" id="card_number" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label for="card_name">Nombre:</label>
                            <input type="text" name="card_name" id="card_name" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label for="card_folder">Folder:</label>
                            <select name="card_folder" id="card_folder" class="form-control"></select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="card_holder">Poseedor:</label>
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-primary" disabled>
                                        <span class="fa fa-user"></span>
                                    </button>
                                </div>
                                <input type="text" placeholder="Hno. Juan" name="card_holder" id="card_holder" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="card_creator">Creador:</label>
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-primary" disabled>
                                        <span class="fa fa-user"></span>
                                    </button>
                                </div>
                                <input type="text" placeholder="Hna. Maria" name="card_creator" id="card_creator" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="card_nummber">Fecha creacion:</label>
                            <input type="date" name="card_creation" value="<?= date('Y-m-d'); ?>" id="card_creation" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="langs">Lenguaje:</label>
                            <select name="langs" id="langs" class="form-control"></select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div id="msg_new_cards"></div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="pull-left text-left">
                    <input type="checkbox" data-toggle="toggle" data-width="75" data-size="small" data-offstyle="warning" data-on="Dentro" data-off="Fuera"  name="card_state" id="card_state" class="form-control" checked>
                    <input type="checkbox" data-toggle="toggle" data-width="75" data-size="small" data-on="Activo" data-off="Inactivo" name="card_activo" id="card_activo" class="form-control" checked>
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa   fa-chevron-left"></i> Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn_save_card"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>