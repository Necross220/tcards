<?php

    require_once "{$_SERVER['DOCUMENT_ROOT']}/data/data_connection.php";
    require_once "{$_SERVER['DOCUMENT_ROOT']}/data/qs/qs_deck.php";
    require_once "{$_SERVER['DOCUMENT_ROOT']}/data/utilities.php";

    class data_cards extends data_connection{

        //CONSTRUCTOR
        function __construct() {
            $this->conn = $this->get_connection();
            $this->deck = new qs_deck();
        }

        //GETS
        function get_cards($id = 0){
            $stm = $this->conn->prepare($this->deck->get_cards());
            $stm->bindParam(":id", $id, PDO::PARAM_INT);
            $stm->execute();
            return $this->get_obj($stm);
        }

        function get_cards_count(){
            $stm = $this->conn->prepare($this->deck->get_cards_count());
            $stm->execute();
            return $this->get_obj($stm);
        }

        function get_cards_folders($id = 0){
            $stm = $this->conn->prepare($this->deck->get_cards_folders());
            $stm->bindParam(":id", $id, PDO::PARAM_INT);
            $stm->execute();
            return $this->get_obj($stm);
        }

        //INSERTS
        function new_cards($id,$name,$numero,$folder,$holder, $state, $creator,$creation, $active){
            $stm = $this->conn->prepare($this->deck->new_cards());
            $stm->bindParam(":id", $id, PDO::PARAM_INT);
            $stm->bindParam(":name", $name, PDO::PARAM_INT);
            $stm->bindParam(":numero", $numero, PDO::PARAM_INT);
            $stm->bindParam(":folder", $folder, PDO::PARAM_INT);
            $stm->bindParam(":holder", $holder, PDO::PARAM_INT);
            $stm->bindParam(":state", $state, PDO::PARAM_INT);
            $stm->bindParam(":creator", $creator, PDO::PARAM_STR);
            $stm->bindParam(":creation", $creation, PDO::PARAM_STR);
            $stm->bindParam(":active", $active, PDO::PARAM_INT);
            $stm->execute();
            return $this->get_obj($stm);
        }

        //UPDATES

        //DELETES

    }
