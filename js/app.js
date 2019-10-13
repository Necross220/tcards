function post_request(urlFile, comp, arrayData, Callback, not_load = true){

    $.ajax({
        type: 'POST',
        url: '/' + urlFile,
        data: arrayData,
        beforeSend: function () {
            if (not_load)
                $(comp).html('<div class="text-center"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><br>Cargando...</div>');
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