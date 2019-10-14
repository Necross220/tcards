<?php


    class qs_main{

        //GETS
        function get_login(){
            return "SELECT 
                        * 
                    FROM 
                         usuarios usr 
                         JOIN accounts acc ON usr.id = acc.usuario_id 
                    WHERE 
                          acc.email = :email AND
                          acc.password = :password";
        }

        function get_menu_items(){
            return "SELECT * FROM menu m WHERE m.active = 1 ORDER BY m.order ASC";
        }

        function get_notifications(){
            return "SELECT 
                        COUNT(IF(c.state = 1, NULL, 1))                         AS fuera_tarjetas,
                        COUNT(IF(TO_SECONDS(c.fecha_salida) > 28800 && c.state = 0, 1, NULL))  AS vencidas_tarjetas,
                        COUNT(IF(c.state = 1, NULL, 1)) + COUNT(IF(TO_SECONDS(c.fecha_salida) > 28800 && c.state = 0, 1, NULL))  AS total_warnings
                    FROM
                        cards c";
        }

        //INSERTS

        //UPDATES

        //DELETES
    }

