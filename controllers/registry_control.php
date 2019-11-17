<?php

    //Dependecias
    require_once "{$_SERVER['DOCUMENT_ROOT']}/data/utilities.php";
    require_once  "{$_SERVER['DOCUMENT_ROOT']}/data/data_cards.php";

    //dependencies and libraries
    $deck = new data_cards();
    $utl = new utilities();

    //Declaración y validación de variables globales
    $id         = isset($_POST['id'])           ? (int)$_POST['id'] : 0;
    $name       = isset($_POST['name'])         ? (int)$_POST['name'] : 0;
    $state      = isset($_POST['state'])        ? (int)$_POST['state'] : 0;
    $numero     = isset($_POST['number'])       ? (int)$_POST['number'] : 0;
    $activo     = isset($_POST['active'])       ? (int)$_POST['active'] : 0;
    $folder     = isset($_POST['folder'])       ? (int)$_POST['folder'] : 0;
    $holder     = isset($_POST['holder'])       ? (int)$_POST['holder'] : 0;
    $creator    = isset($_POST['creator'])      ? (int)$_POST['creator'] : 0;
    $creation   = isset($_POST['creation'])     ? (int)$_POST['creation'] : 0;
    $usuario_id = isset($_POST['usuario_id'])   ? (int)$_POST['usuario_id'] : 0;

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
                            <th>Poseedor</th>
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
                        <td>{$card['holder']}</td>
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
        }
    }
    else if($case === 'get_folders'){

        try{
            $folders = $deck->get_cards_folders($id);
        }catch(Exception $ex){
            echo "<option>No cargaron los folderes</option>";
        }

        if(count($folders) > 0){
            echo "<option value=0>Todos</option>";
            foreach($folders as $folder){
                if((int)$folder['id'] === $id){
                    echo "<option value={$folder['id']} selected>{$folder['nombre']}</option>";
                }else{
                    echo "<option value={$folder['id']}>({$folder['id']}) - {$folder['nombre']}</option>";
                }
            }
        }else{
            echo "<option disabled selected>No hay folderes</option>";
        }

    }
    else if($case === 'new_cards'){

        try{
            $deck->new_cards($id,$name,$numero,$folder,$holder, $state,$creator,$creation, $activo);
            echo $utl->setMsg('success', 'Exito: ', 'se ha creado la nueva tarjeta');
        }catch (Exception $ex){
            echo $utl->setMsg('danger', 'Error: ', 'no se puedo crear la nueva tarjeta');
            //$utl->setMsg('danger', 'Error: ', substr($ex->getMessage(), 40));
            return;
        }

    }else if($case === 'default'){
        echo $utl->setMsg('info', 'Info: ', 'no se eligió un caso.', true, true);
    }