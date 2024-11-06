<?php

session_start();

require_once '../database/database.php';
global $connection;


if (!isset($_POST)) die('Поддерживается только post запросы');

$sticker_id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$file = $_FILES['sticker'];

$_SESSION['name'] = $name;
$_SESSION['description'] = $description;

if ($file['error'] !== 0) {
    $_SESSION['errors']['photo'] = 'Возникли ошибки при загрузке файла';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die();
}

$types = [
    'image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/bmp', 'image/svg+xml'
];

if (!in_array($file['type'], $types)) {

    $_SESSION['errors']['photo'] = 'Неверный тип файла';

    header('Location: ../index.php?page=f-admin');

    die();

}

if ($file['size'] > 1024 * 1024 * 10) {

    $_SESSION['errors']['photo'] = 'Максимальный размер загружаемого файла 10 мб.';

    header('Location: ../index.php?page=f-admin');

    die();

}
$extension = pathinfo($file['name'], PATHINFO_EXTENSION);
$path = 'assets/img/stickers/' . uniqid() . '.' . $extension;
if (!move_uploaded_file($file['tmp_name'], '../' . $path)) {

    $_SESSION['errors']['photo'] = 'Не удалось загрузить файл';

    header('location: ../index.php?page=f-admin');

    die();

}

$sql = "UPDATE `stikers` SET `name`='$name', `way`='$path', `name`='$name',`description`='$description' WHERE `id`='$sticker_id'";

$query = $connection->query($sql);
header('Location: ../index.php?page=admin');
