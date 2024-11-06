<?php

session_start();

require_once "../database/database.php";
global $connection;

if(!isset($_POST))die('Поддерживается только post запросы');


$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$r_password = $_POST['password_r'];

$_SESSION['name'] = $name;
$_SESSION['email'] = $email;

if(empty($name)) $_SESSION['errors']['name'] = "Поле Имя является обязательным";

if(empty($email)) $_SESSION['errors']['email'] = "Поле email является обязательным";
else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) $_SESSION['errors']['email'] = "Неверный email";
else{
    $sql = "SELECT * FROM `user` WHERE `email` = '$email'";
    $query = $connection->query($sql);
    $isReg = $query->fetch(PDO::FETCH_ASSOC);

    if(!empty($isReg)){
        $_SESSION['errors']['email'] = "Данный email уже зарегистрирован!";
    }
}

if(empty($password)) $_SESSION['errors']['password'] = "Поле Пароль является обязательным";
else if(strlen($password) < 6) $_SESSION['errors']['password'] = "Пароль должен содержать не меньше 6 символов";

if(empty($r_password)) $_SESSION['errors']['password_r'] = "Повторите пароль";
else if($password != $r_password) $_SESSION['errors']['password_r'] = "Пароли должны совпадать";

if (!empty($_SESSION['errors'])) {
    header("location: ../?page=register");
    die();
}


$password = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES (null, '$name','$email','$password')";
$query = $connection->query($sql);

$sql = "SELECT * FROM `user` WHERE `email` = '$email'";
$query = $connection->query($sql);
$sess = $query->fetch(PDO::FETCH_ASSOC);

$_SESSION['user'] = $sess;


header('location: ../?page=profile');