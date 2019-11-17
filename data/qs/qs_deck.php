<?php


class qs_deck{

    //GETS
    function get_cards(){
        return "
            SELECT
                c.id as card_id,
                c.numero,
                c.nombre as card_name,
                i.nombre as idioma,
                i.id as idioma_id,
                c.folder_id,
                c.holder,
                c.state,
                c.fecha_salida,
                c.fecha_entrada,
                c.active as c_active
            FROM
                 cards c
                 JOIN idiomas i ON c.idioma_id = i.id
            WHERE
                (c.numero = :id OR :id = 0)
            ORDER BY C.fecha_salida DESC
        ";
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

    function get_cards_folders(){
        return "SELECT * FROM folders WHERE activo = 1";
    }

    //INSERTS


    function new_cards(){
        return "INSERT INTO cards (name,numero,folder,holder, state,creator,creation,active) VALUES (:name,:numero,:folder,:holder, :state, :creator,:creation, :active) WHERE id = :id";
    }

    //UPDATES

    //DELETES

}