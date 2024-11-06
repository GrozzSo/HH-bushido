<?php
require_once 'database/database.php';
global $connection;
$product_id = $_GET['id'];

$sql = "DELETE FROM `stikers` WHERE id = '$product_id'";
$query = $connection->query($sql);
header('Location:   ../?page=admin');
