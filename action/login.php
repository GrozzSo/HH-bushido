<?php

session_start();

require_once "../database/database.php";
global $connection;

if(!isset($_POST))die('Поддерживается только post запросы');



$email = $_POST['email'];
$password = $_POST['password'];

$_SESSION['email'] = $email;

$sql = "SELECT * FROM `user` WHERE `email` = '$email'";
$query = $connection->query($sql);
$user = $query->fetch(PDO::FETCH_ASSOC);

if(empty($email)) $_SESSION['errors']['email'] = "Поле email является обязательным";
else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) $_SESSION['error']['email'] = "Неверный email";
elseif(empty($user)) $_SESSION['errors']['email'] = "Данный email не зарегистрирован!";
if($user['role_id'] == 3) $_SESSION['errors']['email'] = "Ваш аккаунт заблокирован!";

if (empty($password)) $_SESSION['errors']['password'] = "Введите пароль";
if(!empty($password) && empty($_SESSION['errors']['email']) && !password_verify($password, $user['password'])) $_SESSION['error']['password'] = "Не верный пароль!";

if (!empty($_SESSION['errors'])) {
    header("location: ../?page=login");
    die();
}

if(password_verify($password, $user['password'])) {
    $_SESSION['user'] = $user;
    unset($_SESSION['email']);
    if($_SESSION['user']['role_id'] == 2) header('location: ../?page=admin');
    else header(    'location: ../?page=profile');
    die();
}