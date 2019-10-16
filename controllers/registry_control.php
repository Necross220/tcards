<?php

    //Dependecias
    require_once "{$_SERVER['DOCUMENT_ROOT']}/data/utilities.php";
    require_once  "{$_SERVER['DOCUMENT_ROOT']}/data/data_cards.php";

    //dependencies and libraries
    $deck = new data_cards();
    $utl = new utilities();

    //Declaración y validación de variables globales
    $usuario_id = isset($_POST['usuario_id']) ? (int)$_POST['usuario_id'] : 0;
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

    //Case controller
    $case = isset($_POST['case']) ? (string)filter_var($_POST['case'], FILTER_SANITIZE_STRING)  : 'default';

    if($case === 'get_cards_crud'){

        try{
            //conneccion a base de datos por las tarjetas
            $cards = $deck->get_cards($id);
        }catch (Exception $ex){
            $utl->setMsg('danger', 'Error: ', 'Algo salió mal, es todo lo que sabemos', true, true);
            return;
        }

        if(count($cards) > 0 ){
            echo  "
                <table id='cardsMain' class='table table-striped text-center' width='100%'>
                    <thead>
                        <tr>
                            <th hidden>id</th>
                            <th>Número tarjeta</th>
                            <th>Nombre</th>
                            <th>Folder</th>
                            <th>Idioma</th>
                            <th>Estado</th>
                            <th>Fecha Salida</th>
                            <th>Fecha Entrada</th>
                            <th>Activo</th>
                        </tr>
                    </thead>
            ";

            foreach ($cards as $card){

                $state = $card['state'] == 1
                    ? "<span class='badge bg-green text-center' data-state='{$card['state']}'>Dentro</span>"
                    : "<span class='badge bg-red text-center' data-state='{$card['state']}'>Fuera</span>";

                $active = $card['c_active'] == 1
                    ? "<span class='badge bg-green'>SI</span>"
                    : "<span class='badge bg-red'>NO</span>";


                echo "
                    <tr>
                        <td hidden>{$card['card_id']}</td>
                        <td>{$card['numero']}</td>
                        <td>{$card['card_name']}</td>
                        <td>{$card['folder_id']}</td>
                        <td>{$card['idioma']}</td>
                        <td>{$state}</td>
                        <td>{$card['fecha_salida']}</td>
                        <td>{$card['fecha_entrada']}</td>
                        <td>$active</td>
                    </tr>
                ";
            }

            echo "</table>";

            echo "<script>
                $('#cardsMain').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy',
                        'excel',
                        'csv',
                        'pdf',
                        'print'
                    ],
                    responsive: true,
                    pageLength : 12,
                    'language': {
                        'url':'/js/spanish.json'
                    }
                });
            </script>";
        }else{
            echo $utl->setMsg('info', 'Info: ', 'no se encontraron resgistros');
        }
    }else if($case === 'default'){
        echo $utl->setMsg('info', 'Info: ', 'no se eligió un caso.', true, true);
    }