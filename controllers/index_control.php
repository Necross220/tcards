<?php

    //Dependecias
    require_once "{$_SERVER['DOCUMENT_ROOT']}/data/utilities.php";
    require_once  "{$_SERVER['DOCUMENT_ROOT']}/data/data_cards.php";

    //dependencies and libraries
    $main = new data_cards();
    $utl = new utilities();


    //Case controller
    $case = isset($_POST['case']) ? (string)filter_var($_POST['case'], FILTER_SANITIZE_STRING)  : 'default';

    if($case === 'get_cards'){
        //conneccion a base de datos por las tarjetas
        $cards = $main->get_cards();

        if(count($cards) > 0 ){
            echo  "
                <table id='cardsMain' class='table table-striped'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Folder</th>
                        </tr>
                    </thead>
            ";

            foreach ($cards as $card){
                 echo "
                    <tr>
                        <td>{$card['id']}</td>
                        <td>{$card['nombre']}</td>
                        <td>{$card['folder_id']}</td>
                    </tr>
                ";
            }

            echo "</table>";
        }else{
            echo $utl->setMsg('info', 'Info: ', 'no se encontraron resgistros');
        }
    }else if($case === 'get_dashboard'){
        $cards_count = $main->get_cards_count()[0];

        if(count($cards_count) > 0){
            echo $cards_count;
        }else{
            echo 0;
        }
    }

    else if($case === 'default'){
        echo $utl->setMsg('info', 'Info: ', 'no se eligió un caso.', true, true);
    }