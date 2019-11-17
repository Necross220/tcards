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