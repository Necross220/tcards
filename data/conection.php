<?php

error_reporting(E_ALL);

class data_connection {
    # @object, Objeto PDO
    private $pdo;

    # @object, Consulta preparada PDO
    private $sSQL;

    # @array,  Configuración de la BD
    private $credenciales;

    # @bool ,  Si conectado a la BD
    private $isConnected = false;

    # @array, Parámetros de la consulta SQL
    private $parametros;

    public function __construct() {
        $this->get_connection();
        $this->parametros = array();
    }

    function get_connection() {
        try {

            $options = array(
                PDO::ATTR_PERSISTENT => false,
                PDO::ATTR_EMULATE_PREPARES => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
            );

            $this->conn = new PDO("mysql:dbname=tcards;host=localhost;charset=utf8", "root", '12345678wW', $options);


            return $this->conn;
        } catch (PDOException $e) {
            error_log($this->error = $e->getMessage(), 0);
            echo "<h1><b>Favor Intentar en unos momentos</b></h1>".$e->getMessage();
            die;
            return;
        }
    }

    function get_obj($stm) {
        $obj = null;
        while ($row = $stm->fetch()) {
            $obj[] = $row;
        }
        return (array)$obj;
    }

}
