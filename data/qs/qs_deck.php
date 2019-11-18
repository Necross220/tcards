<?php


class qs_deck{

    //GETS
    function get_cards(){
        return "
            SELECT
                c.id as card_id,
                c.number,
                c.name,
                l.name as lang,
                l.id as lang_id,
                c.folder_id,
                c.holder,
                c.state,
                c.time_out,
                c.time_in,
                c.active as c_active
            FROM
                 cards c
                 JOIN languages l ON c.lang_id = l.id
            WHERE
                (c.number = :number OR :number = 0)
            ORDER BY c.time_out DESC
        ";
    }

    function get_cards_count(){
        return "SELECT
                    COUNT(*)                                                AS total_tarjetas,
                    COUNT(IF(c.state = 1, 1, NULL))                         AS dentro_tarjetas,
                    COUNT(IF(c.state = 1, NULL, 1))                         AS fuera_tarjetas,
                    COUNT(IF(TO_SECONDS(c.time_out) > 28800 && c.state = 0, 1, NULL))  AS vencidas_tarjetas
                FROM
                    tcards.cards c";
    }

    function get_cards_folders(){
        return "SELECT * FROM folders WHERE active = 1";
    }

    //INSERTS


    function new_cards(){
        return "INSERT INTO 
                    cards   ( name, number, lang_id, folder_id, holder, state, creator, creation, active ) 
                    VALUES  ( :name,:number, :lang_id, :folder, :holder, :state, :creator, :creation, :active )";
    }

    //UPDATES

    //DELETES

}