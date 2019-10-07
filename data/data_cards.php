<?php

    require_once "{$_SERVER['DOCUMENT_ROOT']}/data/conection.php";
    require_once "{$_SERVER['DOCUMENT_ROOT']}/data/qs/qs_main.php";
    require_once "{$_SERVER['DOCUMENT_ROOT']}/data/utilities.php";

    class data_cards extends data_connection{

        //CONSTRUCTOR
        function __construct() {
            $this->conn = $this->get_connection();
            $this->main = new qs_main();
        }

        //GETS
        function get_cards(){
            $stm = $this->conn->prepare($this->main->get_cards());
            $stm->execute();
            return $this->get_obj($stm);
        }

        function get_cards_count(){
            $stm = $this->conn->prepare($this->main->get_cards_count());
            $stm->execute();
            return $this->get_obj($stm);
        }

        function get_menu_items(){

        }
        //INSERTS

        //UPDATES

        //DELETES

    }
