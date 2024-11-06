<?php
session_start();
?>
<!--register-->
<div class="container section">
    <div class="form">

        <div class="form__body">
            <div class="form__title">
                ВХОД В АККАУНТ
            </div>

            <form action="action/login.php" method="post">

                <?php
                if (isset($_SESSION['errors']['email'])) {
                    ?>
                    <p style="color: red"><?= $_SESSION['errors']['email'] ?></p>
                    <?php
                    unset($_SESSION['errors']['email']);
                }
                ?>
                <input class="reggg" id="email" type="text" name="email" placeholder="Введите почту" value="<?php
                if (isset($_SESSION['email'])) {
                    echo $_SESSION['email'];
                    unset($_SESSION['email']);
                }
                ?>">


                <?php
                if (isset($_SESSION['errors']['password'])) {
                    ?>
                    <p style="color: red"><?= $_SESSION['errors']['password'] ?></p>
                    <?php
                    unset($_SESSION['errors']['password']);
                }
                ?>
                <input class="reggg" type="password" name="password" placeholder="Введите пароль">
                <button type="submit" class="vxod">ВОЙТИ</button>
            </form>

            <div class="log">
                <p>У вас ещё нет аккаунта? не беда! <a href="?page=register">Зарегистрироваться</a></p>
            </div>
        </div>

    </div>
</div>
<!--register-->