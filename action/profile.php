<?php

session_start();

require_once '../database/database.php';
global $connection;


if (!isset($_POST)) die('Поддерживается только post запросы');

$user_id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$file = $_FILES['avatar'];

$_SESSION['name'] = $name;
$_SESSION['email'] = $email;

if ($file['error'] !== 0) {
    $_SESSION['errors']['photo'] = 'Возникли ошибки при загрузке файла';
    header('Location: ../index.php?page=f-profile');

    die();
}

$types = [
    'image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/bmp', 'image/svg+xml'
];

if (!in_array($file['type'], $types)) {

    $_SESSION['errors']['photo'] = 'Неверный тип файла';

    header('Location: ../index.php?page=f-profile');

    die();

}

if ($file['size'] > 1024 * 1024 * 10) {

    $_SESSION['errors']['photo'] = 'Максимальный размер загружаемого файла 10 мб.';

    header('Location: ../index.php?page=f-profile');

    die();

}
$extension = pathinfo($file['name'], PATHINFO_EXTENSION);
$path = 'assets/img/avatar/' . uniqid() . '.' . $extension;
if (!move_uploaded_file($file['tmp_name'], '../' . $path)) {

    $_SESSION['errors']['photo'] = 'Не удалось загрузить файл';

    header('location: ../index.php?page=f-profile');

    die();

}

$sql = "SELECT * FROM `user` WHERE `email` = '$email'";
$query = $connection->query($sql);
$isReg = $query->fetch(PDO::FETCH_ASSOC);

// if(!empty($isReg)){
//     $_SESSION['errors']['email'] = "Данный email уже зарегистрирован!";
// }

if (!empty($_SESSION['errors'])) {

    header("location: ../?page=f-profile");
    die();
}

$sql = "UPDATE `user` SET `name`='$name', `email`='$email', `avatar`='$path' WHERE `id`='$user_id'";
$query = $connection->query($sql);

$_SESSION['user']['name'] = $name;
$_SESSION['user']['avatar'] = $path;
$_SESSION['user']['email'] = $email ;

header('Location: ../index.php?page=profile');
