<?php

    //Dependecias
    require_once "{$_SERVER['DOCUMENT_ROOT']}/data/utilities.php";
    require_once  "{$_SERVER['DOCUMENT_ROOT']}/data/data_cards.php";

    //dependencies and libraries
    $deck = new data_cards();
    $utl = new utilities();

    //Declaración y validación de variables globales
    $id         = isset($_POST['id'])           ? (int)$_POST['id'] : 0;
    $name       = isset($_POST['name'])         ? (string)filter_var($_POST['name'], FILTER_SANITIZE_STRING) : '';
    $lang_id    = isset($_POST['lang_id'])      ? (int)$_POST['lang_id'] : 0;
    $state      = isset($_POST['state'])        ? (int)$_POST['state']  : 0;
    $number     = isset($_POST['number'])       ? (int)$_POST['number'] : 0;
    $active     = isset($_POST['active'])       ? (int)$_POST['active'] : 0;
    $folder     = isset($_POST['folder'])       ? (int)$_POST['folder'] : 0;
    $holder     = isset($_POST['holder'])       ? (string)filter_var($_POST['holder'], FILTER_SANITIZE_STRING) : '';
    $creator    = isset($_POST['creator'])      ? (string)filter_var($_POST['creator'], FILTER_SANITIZE_STRING) : '';
    $creation   = isset($_POST['creation'])     ? (string)filter_var($_POST['creation'], FILTER_SANITIZE_STRING) : '';
    $user_id    = isset($_POST['user_id'])   ? (int)$_POST['user_id'] : 0;

    //Case controller
    $case = isset($_POST['case']) ? (string)filter_var($_POST['case'], FILTER_SANITIZE_STRING)  : 'default';

    if($case === 'get_cards_crud'){

        try{
            //conneccion a base de datos por las tarjetas
            $cards = $deck->get_cards($number);
        }catch (Exception $ex){
            $utl->setMsg('danger', 'Error: ', 'Algo salió mal, es todo lo que sabemos', true, true);
            return;
        }

        if(count($cards) > 0 ){

            echo "
                <div class='input-group input-group-lg'>
                    <input id='searchbar' type='tetx' class='form-control' autofocus>
                    <span class='input-group-btn'>
                          <button type='button' id='new_cards' class='btn btn-info btn-flat bg-teal-active' data-toggle='modal' data-target='#newcards'><i class='fa fa-plus'></i> Nueva</button>
                          <button type='button' id='search_cards' class='btn btn-info btn-flat'><i class='fa fa-search'></i> Buscar</button>
                        </span>
                </div>
    
                <br>
            ";
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
                            <th>Acciones</th>
                            <th>active</th>
                        </tr>
                    </thead>
            ";

            foreach ($cards as $card){

                $state = $card['state'] == 1
                    ? "<span class='badge bg-green text-center' data-state='{$card['state']}'>Dentro</span>"
                    : "<span class='badge bg-red text-center' data-state='{$card['state']}'>Fuera</span>";

                $active = $card['c_active'] == 1
                    ? "<td>SI</td>"
                    : "<td>NO <i class='fa fa-warning' style='color:#F39A1F;'></i></td>";


                echo "
                    <tr>
                        <td hidden name='{$card['card_id']}'>{$card['card_id']}</td>
                        <td>{$card['number']}</td>
                        <td>{$card['name']}</td>
                        <td>{$card['folder_id']}</td>
                        <td>{$card['holder']}</td>
                        <td>{$card['lang']}</td>
                        <td>{$state}</td>
                        <td>{$card['time_out']}</td>
                        <td>{$card['time_in']}</td>
                        <td>
                            <div class='btn-group'>
                              <button type='button' class='btn btn-info btn-flat' name='card_edit'><i class='fa fa-edit'></i></button>
                              <button type='button' class='btn bg-maroon btn-flat' name='card_remove'><i class='fa fa-remove'></i></button>
                            </div>		
                        </td>
                        {$active}
                    </tr>
                ";
            }

            echo "</table>";

            echo "<script>
                var DTable = $('#cardsMain').DataTable({
                    dom: 'frtip',
                    buttons: 'none',
                    responsive: true,
                    pageLength : 12,
                    'language': {
                        'url':'/js/spanish.json'
                    }
                });
            
                $('#searchbar').keyup(function() {
                    DTable.search($(this).val()).draw();
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
                    echo "<option value={$folder['id']} selected>{$folder['name']}</option>";
                }else{
                    echo "<option value={$folder['id']}>({$folder['id']}) - {$folder['name']}</option>";
                }
            }
        }else{
            echo "<option disabled selected>No hay folderes</option>";
        }

    }
    else if($case === 'new_cards'){

        try{
            $deck->new_cards($name,$number,$lang_id,$folder,$holder, $state,$creator,$creation, $active);
            echo $utl->setMsg('success', 'Exito: ', 'se ha creado la nueva tarjeta.');
        }catch (Exception $ex){
            if($ex->getCode() === '23000'){
                echo $utl->setMsg('danger', 'Error: ', 'número de tarjeta duplicado.');
                return;
            }else{
                echo $utl->setMsg('danger', 'Error: ', 'no se puedo crear la nueva tarjeta.');
                return;
            }
        }

    }

    else if($case === 'remove_card'){

    }

    else if($case === 'default'){
        echo $utl->setMsg('info', 'Info: ', 'no se eligió un caso.', true, true);
    }