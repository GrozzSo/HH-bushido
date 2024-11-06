<?php
session_start();
?>
<header>
    <div class="header__content section mt50">

        <section class="top-nav mobile">

            <input id="menu-toggle" type="checkbox" />
            <label class='menu-button-container' for="menu-toggle">
                <div class='menu-button'></div>
            </label>
            <ul class="menu">
                <li>Сюжет</li>
                <li>Этапы</li>
                <li>Войти</li>
                <li>Зарегистрироваться</li>

            </ul>
        </section>

        <nav class="pc">
            <a href=index.php class="pc">Сюжет</a>
            <a href="" class="pc">Этапы</a>
            <a href="index.php#sticker" class="pc">Подарок</a>
        </nav>


        <div class="logo pc">
            <img src="assets/img/card/Logi.svg" alt="">
        </div>

        <div class="btn__header pc">
            <?php
            if (!empty($_SESSION['user'])) {
            ?>
                <a href="?page=logout" class="pc">выход</a>
                <?php
                if ($_SESSION['user']['role_id'] == '2') {
                    if ($_GET['page'] != 'admin') {
                ?>
                        <a href="?page=admin">Админ</a>
                    <?php
                    }
                } elseif ($_GET['page'] != 'profile') {
                    ?>
                    <a href="?page=profile">профиль</a>
                <?php
                }
            } else {
                ?>
                <?php
                $page = $_GET['page'];
                if ($page === 'login') {
                ?>
                    <a href="index.php">На главную</a>
                <?php
                } else {
                ?>
                    <a href="?page=login" class="pc">вход</a>
                <?php
                }
                ?>


                <?php
                $page = $_GET['page'];
                if ($page === 'register') {
                ?>
                    <a href="index.php">На главную</a>
                <?php
                } else {
                ?>
                    <a href="?page=register">регистрация</a>
                <?php
                }
                ?>
            <?php
            }
            ?>
        </div>
    </div>
</header>