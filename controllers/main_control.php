<?php

    //Dependecias
    require_once "{$_SERVER['DOCUMENT_ROOT']}/data/utilities.php";
    require_once  "{$_SERVER['DOCUMENT_ROOT']}/data/data_main.php";

    //dependencies and libraries
    $main = new data_main();
    $utl = new utilities();

    //Declaración y validación de variables globales
    $id = isset($_POST['user_id']) ? (int)$_POST['user_id'] : 0;
    $email = isset($_POST['email']) ? (string)filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : 0;
    $password = isset($_POST['password']) ? (string)filter_var($_POST['password'], FILTER_SANITIZE_STRING) : 0;

    //Case controller
    $case = isset($_POST['case']) ? (string)filter_var($_POST['case'], FILTER_SANITIZE_STRING)  : 'default';

    //Gets user info and logs in
    if($case === 'get_login') {

        try{
            $user = $main->get_login($email, $password);

            if(count($user) > 0){
                ob_start();
                session_start();
                $_SESSION['username'] = $user[0]['username'];
                $_SESSION['logged_in'] = true;
                echo "<script>window.location.assign('./index.php')</script>";
            }else{
                $_SESSION['logged_in'] = false;
                echo $utl->setMsg('warning', 'Advertencia: ', 'al combinación usuario y contraseña no coincide con nada en nuestros registros.');
            }

        }catch(Exception $ex){
            echo $utl->setMsg('danger','Error: ','algo salió mal, comuniquese con soporte técnico.');
            //echo $ex->getMessage();
        }
    }else if($case === 'get_menu'){

        $menus = $main->get_menu_items();

        if(count($menus) > 0){
            foreach ($menus as $menu){
                echo "
                    <li class='menu-item'>
                        <a href='/{$menu['url']}'>
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

    //Session destroy
    else if($case === 'log_out'){
        session_start();
        unset($_SESSION["username"]);
        unset($_SESSION["password"]);
        session_destroy();
        echo "<script>window.location.assign('./index.php')</script>";
    }

    //Safe in case that a case is not sent
    else if($case === 'default'){
        echo $utl->setMsg('info', 'Info: ', 'no se eligió un caso.', true, true);
    }