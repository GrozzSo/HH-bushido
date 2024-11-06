<?php
session_start()
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
                    ДОБАВИТЬ СТИКЕР
                </div>

                <form action="action/add.php" method="post" enctype="multipart/form-data">

                    <input class="reggg" id="email" type="text" name="name" placeholder="название" value="<?php
                    if (isset($_SESSION['name'])) {
                        echo $_SESSION['name'];
                        unset($_SESSION['name']);
                    }
                    ?>">
                    <input class="reggg" type="text" name="description" placeholder="описание">
                    <?php
                    if (isset($_SESSION['errors']['photo'])) {
                        ?>
                        <p style="color: red"><?= $_SESSION['errors']['photo'] ?></p>
                        <?php
                        unset($_SESSION['errors']['photo']);
                    }
                    ?>
                    <input type="file" name="sticker" id="">
                    <button type="submit" class="vxod">ДОБАВИТЬ</button>
                </form>

            </div>

        </div>
    </div>
    
</body>
</html>