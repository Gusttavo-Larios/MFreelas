<?php

class Database
{
    static function connect()
    {
        $serverName = "";
        $userName = "";
        $password = "";

        try {
            $connection = new PDO("mysql:host=$serverName;dbname=", $userName, $password);

            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $connection;
        } catch (PDOException $error) {
            echo "Error in connection: " . $error->getMessage();
        }
    }
}
