<?php

class Database
{
    static function connect()
    {
        $serverName = "serverName";
        $userName = "userName";
        $password = "password";
        $dbname = "dbname";

        try {
            $connection = new PDO("mysql:host=$serverName;dbname=$dbname", $userName, $password);

            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $connection;
        } catch (PDOException $error) {
            echo "Error in connection: " . $error->getMessage();
        }
    }
}
