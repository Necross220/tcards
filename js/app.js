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