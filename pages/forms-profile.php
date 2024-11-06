<?php
session_start();
$user_id = $_GET['id'];
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
<!--register-->
<div class="container section">
    <div class="form">

        <div class="form__body">
            <div class="form__title">
                РЕДАКТИРОВАТЬ АККАУНТ
            </div>

            <form action="action/profile.php" method="post" enctype="multipart/form-data">
                <input class="reggg" id="email" type="text" name="name" placeholder="изменить имя, фамилию" value="<?php echo $_SESSION['user']['name']?>">

                <?php
                if (isset($_SESSION['errors']['email'])) {
                    ?>
                    <p style="color: red"><?= $_SESSION['errors']['email'] ?></p>
                    <?php
                    unset($_SESSION['errors']['email']);
                }
                ?>
                <input class="reggg" type="text" name="email" placeholder="изменить почту" value="<?php echo $_SESSION['user']['email']?>">
                <input type="hidden" name="id" value="<?= $user_id ?>">
                <?php
                if (isset($_SESSION['errors']['photo'])) {
                    ?>
                    <p style="color: red"><?= $_SESSION['errors']['photo'] ?></p>
                    <?php
                    unset($_SESSION['errors']['photo']);
                }
                ?>
                <input type="file" name="avatar" id="">
                <button type="submit" class="vxod">ИЗМЕНИТЬ</button>
            </form>

        </div>

    </div>
</div>
<!--register-->
</body>

</html>