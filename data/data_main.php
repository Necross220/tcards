<?php

    require_once "{$_SERVER['DOCUMENT_ROOT']}/data/data_connection.php";
    require_once "{$_SERVER['DOCUMENT_ROOT']}/data/qs/qs_main.php";
    require_once "{$_SERVER['DOCUMENT_ROOT']}/data/utilities.php";

    class data_main extends data_connection{

        //CONSTRUCTOR
        function __construct() {
            $this->conn = $this->get_connection();
            $this->main = new qs_main();
        }

        //GETS
        function get_login($email, $password){
            $stm = $this->conn->prepare($this->main->get_login());
            $stm->bindParam(':email', $email, PDO::PARAM_STR);
            $stm->bindParam(':password', $password, PDO::PARAM_STR);
            $stm->execute();
            return $this->get_obj($stm);
        }

        function get_menu_items(){
            $stm = $this->conn->prepare($this->main->get_menu_items());
            $stm->execute();
            return $this->get_obj($stm);
        }

        function get_notifications(){
            $stm = $this->conn->prepare($this->main->get_notifications());
            //$stm->bindParam(':id', $id);
            $stm->execute();
            return $this->get_obj($stm);
        }

        //INSERTS

        //UPDATES

        //DELETES

    }
