<?php
session_start();
?>

<!--register-->
<div class="container section">
    <div class="form">


        <div class="form__body">

            <div class="form__title">
                РЕГИСТРАЦИЯ
            </div>
            <form action="action/register.php" method="post">


                <?php
                if (isset($_SESSION['errors']['name'])) {
                    ?>
                    <p style="color: white"><?= $_SESSION['errors']['name'] ?></p>
                    <?php
                    unset($_SESSION['errors']['name']);
                }
                ?>
                <input class="reggg" type="text" name="name" placeholder="Введите имя фамилию" value="<?php
                if (isset($_SESSION['name'])) {
                    echo $_SESSION['name'];
                    unset($_SESSION['name']);
                }
                ?>">


                <?php
                if (isset($_SESSION['errors']['email'])) {
                    ?>
                    <p style="color: red"><?= $_SESSION['errors']['email'] ?></p>
                    <?php
                    unset($_SESSION['errors']['email']);
                }
                ?>
                <input class="reggg" type="text" name="email" placeholder="Введите почту" value="<?php
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
                <input class="reggg" type="password" name="password" placeholder="Придумайте пароль">

                <?php
                if (isset($_SESSION['errors']['password_r'])) {
                    ?>
                    <p style="color: red"><?= $_SESSION['errors']['password_r'] ?></p>
                    <?php
                    unset($_SESSION['errors']['password_r']);
                }
                ?>
                <input class="reggg" type="password" name="password_r" placeholder="Подтвердить пароль">

                <div class=" chek d-flex">
                    <label for=""></label><input type="checkbox" name="" id="" required>
                    <p>
                        я соглашаюсь с политикой конфиденциальности
                    </p>
                </div>
                <div class="pol-sogl">
                    Нажав «Зарегистрироваться», вы подтверждаете, что ознакомились и согласны с условиями соглашения
                    на
                    обработку персональных данных и <a href="#">пользовательского соглашения</a>
                </div>
                <button type="submit" class="vxod">ЗАРЕГИСТРИРОВАТЬСЯ</button>
            </form>

            <div class="log">
                <p>Уже есть акаунт?<a href="?page=login">Войти</a></p>
            </div>
        </div>

    </div>
</div>
<!--register-->