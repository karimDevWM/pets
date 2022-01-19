<?php
    $dsn = 'mysql:host=localhost;dbname=pets';
    $username = 'root';
    $password = '';
    $options = [];
    try 
    {
        $connection = new PDO($dsn, $username, $password, $options);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch(PDOException $e) 
    {
        $e->getMessage();
    }
?>