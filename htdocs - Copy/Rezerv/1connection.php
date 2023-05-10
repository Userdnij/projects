<?php

const DB_HOST= "localhost";
const DB_USER = "root";
const DB_PASSWORD = "";
const DB_NAME = "user_db";


$dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=UTF8';

try {
    /** @var PDO $conn */
    $conn = new PDO($dsn, DB_USER, DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

} catch (PDOException $e) {
    echo $e->getMessage();
}