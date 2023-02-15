<?php
    $connect = new PDO("mysql:host=localhost;dbname=databaseName;charset=utf8", "user", "password");

    $query = "SELECT * FROM employees ORDER BY name ASC";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
?>