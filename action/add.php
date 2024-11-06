<?php

session_start();

require_once '../database/database.php';
global $connection;


if (!isset($_POST)) die('Поддерживается только post запросы');

$name = $_POST['name'];
$description = $_POST['description'];
$file = $_FILES['sticker'];

$_SESSION['name'] = $name;
$_SESSION['description'] = $description;

if ($file['error'] !== 0) {
    $_SESSION['errors']['photo'] = 'Возникли ошибки при загрузке файла';
    header('Location: ../index.php?page=dobav');
    die();
}

$types = [
    'image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/bmp', 'image/svg+xml'
];

if (!in_array($file['type'], $types)) {

    $_SESSION['errors']['photo'] = 'Неверный тип файла';

    header('Location: ../index.php?page=dobav');

    die();

}

if ($file['size'] > 1024 * 1024 * 10) {

    $_SESSION['errors']['photo'] = 'Максимальный размер загружаемого файла 10 мб.';

    header('Location: ../index.php?page=dobav');

    die();

}
$extension = pathinfo($file['name'], PATHINFO_EXTENSION);
$path = 'assets/img/stickers/' . uniqid() . '.' . $extension;
if (!move_uploaded_file($file['tmp_name'], '../' . $path)) {

    $_SESSION['errors']['photo'] = 'Не удалось загрузить файл';

    header('location: ../index.php?page=dobav');

    die();

}

$sql = "INSERT INTO `stikers` (`id`, `way`, `name`, `description`) VALUES (null, '$path', '$name','$description')";
$query = $connection->query($sql);
header('Location: ../index.php?page=admin');
