<?php

require_once "class/Database.php";

class ActivityRepository extends RecursiveIteratorIterator
{

    static function getAllActivities()
    {
        $connection = Database::connect();
        $sql = "SELECT id, title, value_hour, date_time FROM activity";
        $stmt = $connection->prepare($sql);
        $stmt->execute();

        // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $connection = null;
        return $stmt->fetchAll();
    }

    static function insertActivity($title, $value_hour)
    {
        try {
            $connection = Database::connect();
            $current_date_time = date("Y-m-d h:i:sa");

            $query = "INSERT INTO activity (title,value_hour, date_time) VALUES (:title, :value_hour, :date_time)";

            $query_prepare = $connection->prepare($query);

            $value_per_hour = (float) $value_hour;

            $query_prepare->bindParam(':title', $title);
            var_dump($value_per_hour);
            $query_prepare->bindParam(':value_hour', $value_per_hour);
            $query_prepare->bindParam(':date_time', $current_date_time);

            $query_prepare->execute();
        } catch (PDOException $e) {
            echo "<br>" . $query . "<br>" . $e->getMessage();
        }
        $connection = null;
    }
}
