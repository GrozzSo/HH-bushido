<?php
session_start();
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
    <div class="profile">
        <div class="profile__content section">
            <div class="info__profile">
                <div class="photo__profile">
                    <img src="<?php if(!is_null($_SESSION['user']['avatar'])) {echo $_SESSION['user']['avatar'];
                    }else {?>assets/img/profile/photo_p.png<?php }?>" alt="">

                </div>

                <div class="txt__profile">
                    <div class="txt__pr">
                        <h3><?php echo $_SESSION['user']['name'];?></h3>
                        <p><?php echo $_SESSION['user']['email'];?></p>
                    </div>

                    <div class="btn__profile">
                        <a href="?page=f-profile&id=<?php echo $_SESSION['user']['id'] ?>">редактировать</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>