<?php
try {
    $host = "localhost";
    $dbname = "praktikayp";
    $user = "root";
    $password = "";
    $connection = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
} catch (exception $e) {
    echo $e->getMessage() . 'Errors dont connection bd';
}
