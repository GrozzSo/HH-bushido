<?php
session_start();
require_once "database/database.php";
global $connection;

if(!isset($_POST))die('Поддерживается только post запрос вы пытаетесь передать get запрос');

session_destroy();

header('Location: ../index.php');

die();
