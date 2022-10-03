<?php

function connectez()
{
    try {
        $servername = 'localhost';
        $dbname = 'Bookshop';
        $username = 'root';
        $password = '';
        global $connect;
        $connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        return $connect;
    } catch (PDOException $e) {
        $e->getMessage();
    }
}