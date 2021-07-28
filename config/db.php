<?php

class Database
{

    public static function connect()
    {
        $user = "administrador";
        $password = "administrador";
        $database = "dbregasi";

        $db = new mysqli('localhost', $user, $password, $database);
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}
