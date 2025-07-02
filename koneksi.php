<?php

function getConnection() : PDO {
    $host = "localhost";
    $port = 3306;
    $username = "root";
    $password = "";
    $database = "pbl";

    return new PDO("mysql:host=$host:$port;dbname=$database", $username, $password);
}