<?php

    //Dependecias
    require_once "{$_SERVER['DOCUMENT_ROOT']}/data/utilities.php";
    require_once  "{$_SERVER['DOCUMENT_ROOT']}/data/data_main.php";

    //dependencies and libraries
    $main = new data_main();
    $utl = new utilities();

    //Declaración y validación de variables globales
    $usuario_id = isset($_POST['$usuario_id']) ? (int)$_POST['$usuario_id'] : 0;

    //Case controller
    $case = isset($_POST['case']) ? (string)filter_var($_POST['case'], FILTER_SANITIZE_STRING)  : 'default';

    //Gets items in the menu and organizes them
    if($case === 'get_menu'){

        $menus = $main->get_menu_items();


        if(count($menus) > 0){
            foreach ($menus as $menu){
                echo "
                        <li class='menu-item'>
                            <a href='{$menu['url']}'>
                                <i class='{$menu['icon']}'></i>
                                <span>{$menu['name']}</span>
                            </a>
                        </li>";
            }
        }

        echo "<li><a href='#'><i class='fa fa-question-circle'></i> <span>Ayuda</span></a></li>";
    }

    //Gets title and description
    if($case === 'get_page_desc'){

        $desc = $main->get_menu_items();

        echo json_encode($desc);
    }
    //Get notifications for the system
    else if($case === 'get_notifications'){

        $notifications = $main->get_notifications();

        if(count($notifications) > 0){
            foreach($notifications as $notification){
                echo json_encode($notification);
            }
        }else{
            echo '<li>No tienes Tarjetas Fuera</li>';
        }
    }
    //Safe in case that a case is not sent
    else if($case === 'default'){
        echo $utl->setMsg('info', 'Info: ', 'no se eligió un caso.', true, true);
    }