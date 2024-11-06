<?php
$sticker_id = $_GET["id"];

require_once 'database/database.php';
global $connection;

$sql = "SELECT * FROM `stikers` WHERE `id` = '$sticker_id'";
$query = $connection->query($sql);
$product = $query->fetch(pdo::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bushido</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container section">
        <div class="form">

            <div class="form__body">
                <div class="form__title">
                    РЕДАКТИРОВАТЬ СТИКЕР
                </div>

                <form action="action/edit.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$sticker_id?>">
                    <input class="reggg" id="email" type="text" name="name" placeholder="изменить название" value="<?=$product['name']?>">
                    <input class="reggg" type="text" name="description" placeholder="изменить описание" value="<?=$product['description']?>">
                    <?php
                    if (isset($_SESSION['errors']['photo'])) {
                        ?>
                        <p style="color: red"><?= $_SESSION['errors']['photo'] ?></p>
                        <?php
                        unset($_SESSION['errors']['photo']);
                    }
                    ?>
                    <input type="file" name="sticker" id="">
                    <button type="submit" class="vxod">ИЗМЕНИТЬ</button>
                </form>

            </div>

        </div>
    </div>
</body>

</html>