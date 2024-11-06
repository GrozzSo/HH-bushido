<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page === 'logout') include 'action/logout.php';
    elseif ($page === 'ban') include 'action/ban.php';
    elseif ($page === 'razban') include 'action/razban.php';
    elseif ($page === 'delete') include 'action/delete.php';
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bushido</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/card/Logi.svg" type="image/x-icon">
    
</head>

<body>
<?php
if ($_GET['page'] != 'admin') {
    include "components/header.php";
}
?>

<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page === 'login') include 'pages/login.php';
    elseif ($page === 'register') include 'pages/register.php';
    elseif ($page === 'logout') include 'action/logout.php';
    elseif ($page === 'admin') include 'pages/admin.php';
    elseif ($page === 'dobav') include 'pages/dobav.php';
    elseif ($page === 'f-admin') include 'pages/form-admin.php';
    elseif ($page === 'f-profile') include 'pages/forms-profile.php';
    elseif ($page === 'profile') include 'pages/profile.php';
} else include 'pages/start.php';
?>

<?php
if ($_GET['page'] != 'admin') {
    include "components/footer.php";
}
?>
</body>
</html>