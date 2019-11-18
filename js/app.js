function post_request(urlFile, comp, arrayData, Callback, not_load = true, loading = '#messenger', is_select = false){

    $.ajax({
        type: 'POST',
        url: '/' + urlFile,
        data: arrayData,
        xhr: function () {
            var xhr = $.ajaxSettings.xhr();
            xhr.onprogress = function e() {
                // For downloads
                if (e.lengthComputable) {
                    console.log(e.loaded / e.total);
                }
            };
            xhr.upload.onprogress = function (e) {
                // For uploads
                if (e.lengthComputable) {
                    // console.log(e.loaded / e.total);
                }
            };
            return xhr;
        },
        beforeSend: function () {
            if (not_load){
                if(is_select === false){
                    $(comp).html('<div class="text-center"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><br>Cargando...</div>');
                }else{
                    $(comp).html('<option selected hidden disabled>Cargando...</option>');
                }
            }

        },
        success: function (data) {

            data = data.trim();

            ('function' == typeof Callback) && Callback(data);

            if(data !== '') $(comp).html(data);
        }
    });
}

function search_cards(id, comp){
    let obj = {
        case: 'get_cards',
        id: id
    };

    post_request('./controllers/index_control.php',comp, obj);
}

//Checks that all cards are in by an especified hour
function alarm_check(){

}

function log_out(){
    post_request('controllers/main_control.php', 'body', {case: 'log_out'});
}

function get_cards(){
    var obj = {
        case: 'get_cards_crud'
    };
    post_request('controllers/registry_control.php','#cardsMainWrap', obj,'',true, '#messenger');
}

function get_folders(cards_folder = 0){
    var obj = {
        case: 'get_folders',
        folder: cards_folder
    };
    post_request('controllers/registry_control.php','#card_folder', obj,'',true, '#messenger');
}

function get_langs(lang_id = 0, comp){

    obj = {
        case: 'get_langs',
        lang_id: lang_id
    };

    post_request('controllers/main_control.php', comp, obj, '', true, '#messenger', true);
}

function new_cards(cards_number,cards_name,cards_folder,cards_holder,cards_state,cards_creator,cards_creation,cards_active, comp = '#msg_new_cards'){
    //The value function is given on
    var obj = {
        case: 'new_cards',
        number: cards_number,
        name: cards_name,
        folder: cards_folder,
        holder: cards_holder,
        state: cards_state,
        creator: cards_creator,
        creation: cards_creation,
        active: cards_active,
    };

    post_request('controllers/registry_control.php', comp, obj);
}