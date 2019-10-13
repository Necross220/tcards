<?php


class qs_main{

    function get_cards(){
        return "SELECT * FROM tcards.cards";
    }


    function get_cards_count(){
        return "SELECT
                    COUNT(*)                                                AS total_tarjetas,
                    COUNT(IF(c.state = 1, 1, NULL))                         AS dentro_tarjetas,
                    COUNT(IF(c.state = 1, NULL, 1))                         AS fuera_tarjetas,
                    COUNT(IF(TO_SECONDS(c.fecha_salida) > 28800 && c.state = 0, 1, NULL))  AS vencidas_tarjetas
                FROM
                    tcards.cards c";
    }

    function get_menu_items(){
        return "
            SELECT * FROM menu WHERE active = 1;
        ";
    }

}