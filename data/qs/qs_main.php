<?php


class qs_main{

    function get_cards(){
        return "SELECT * FROM tcards.cards";
    }


    function get_cards_count(){
        return "SELECT count(*) FROM tcards.cards";
    }

}