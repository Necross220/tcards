<?php


    class qs_main{

        //GETS
        function get_login(){
            return "SELECT 
                        * 
                    FROM 
                         users usr 
                         JOIN accounts acc ON usr.id = acc.user_id 
                    WHERE 
                          acc.email = :email AND
                          acc.password = :password";
        }

        function get_menu_items(){
            return "SELECT * FROM menu m WHERE m.active = 1 ORDER BY m.order ASC";
        }

        function get_langs(){
            return "SELECT * FROM languages l WHERE l.active = 1 and (l.id = :lang_id OR  :lang_id = 0) ORDER BY l.id ASC";
        }

        function get_notifications(){
            return "SELECT 
                        COUNT(IF(c.state = 1, NULL, 1))                                     AS cards_out,
                        COUNT(IF(TO_SECONDS(c.time_in) > 28800 && c.state = 0, 1, NULL))    AS cards_due,
                        COUNT(IF(c.state = 1, NULL, 1)) + COUNT(IF(TO_SECONDS(c.time_out) > 28800 && c.state = 0, 1, NULL))  AS total_warnings
                    FROM
                        cards c";
        }

        //INSERTS

        //UPDATES

        //DELETES
    }

