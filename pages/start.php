<?php
session_start();

require_once 'database/database.php';
global $connection;

$sql = "SELECT * FROM `stikers`";
$query = $connection->query($sql);
$products = $query->fetchall(PDO::FETCH_ASSOC);
?>
<!-- banner -->

<div class="banner">
    <div class="banner__content section pc">
        <div class="zag">
            <h1>Bushido Road
                Samurai Heritage</h1>
        </div>

        <div class="niz__ban">
            <p>Получи свой подарок</p>
            <a href="<?php
                        if (empty($_SESSION['user'])) {
                            echo '?page=register';
                        } else {
                            echo '#sticker';
                        }
                        ?>">забрать</a>
        </div>

        <!-- <img src="assets/img/banner/ban.png" alt=""> -->


    </div>

    <div class="banner__content__mobilca mobile">
        <div class="zag mobile">
            <h1>Bushido Road
                Samurai Heritage</h1>

            <p>Получи свой подарок</p>

            <a href="<?php
                        if (empty($_SESSION['user'])) {
                            echo '?page=register';
                        } else {
                            echo '#sticker';
                        }
                        ?>">забрать</a>
        </div>


    </div>

</div>

<!-- banner -->


<!-- block1 -->
<div class="block__one">
    <div class="block__one__content  py-100">
        <h2 class="section">СЮЖЕТ</h2>
        <div class="content__bt">
            <!-- <img src="assets/img/banner/lenta.png" alt=""> -->

            <div class="txt__bt section">
                <p>В туманном мире феодальной Японии, в эпоху бесконечных сражений и великой чести, вы вступаете на
                    путь
                    самурая. Ваше имя обрастает славой, ваш меч олицетворяет вашу силу, а ваш дух стремится к
                    совершенству.
                    <br>
                    <br>

                    В этой игре вы отправитесь в эпическое путешествие, полное испытаний, битв и самопознания, чтобы
                    обрести мудрость и стать истинным воином духа.
                </p>
                <img src="../assets/img/banner/sam.png" alt="" class="pc">
            </div>
        </div>

    </div>
</div>
<!-- block1 -->

<!-- block2 -->

<div class="card__glav__block">
    <div class="card__glblock__content section py-100">
        <h2>ЭТАПЫ</h2>
        <div class="cards__galv pc">
            <div class="card__glav">
                <img src="assets/img/card/card1.png" alt="">

            </div>

            <div class="card__glav">
                <img src="assets/img/card/card2.png" alt="">

            </div>

            <div class="card__glav">
                <img src="assets/img/card/card3.png" alt="">

            </div>

            <div class="card__glav">
                <img src="assets/img/card/card4.png" alt="">

            </div>

            <div class="card__glav">
                <img src="assets/img/card/card5.png" alt="">

            </div>

            <div class="card__glav">
                <img src="assets/img/card/card6.png" alt="">

            </div>
        </div>


        <div class="cards__glav__mob mobile">
            <div class="card__glav__mob">
                <img src="assets/img/mob/card1.png" alt="">
            </div>

            <div class="card__glav__mob">
                <img src="assets/img/mob/card2.png" alt="">
            </div>

            <div class="card__glav__mob">
                <img src="assets/img/mob/card3.png" alt="">
            </div>

            <div class="card__glav__mob">
                <img src="assets/img/mob/card4.png" alt="">
            </div>

            <div class="card__glav__mob">
                <img src="assets/img/mob/card5.png" alt="">
            </div>

            <div class="card__glav__mob">
                <img src="assets/img/mob/card6.png" alt="">
            </div>
        </div>
    </div>
</div>

<!-- block2 -->

<!-- block3 -->
<?php
if (empty($_SESSION['user'])) {
?>
    <div class="block_tri">
        <div class="block__tri__content section py-100">
            <div class="img__blockk">
                <img src="../assets/img/card/sam2.png" alt="" class="pc">
            </div>

            <div class="txt__blocktri">
                <h3>подарок за регистрацию!</h3>
                <p>
                    Зарегистрируйся и получи бесплатно стикерпак персонажей игры.

                </p>

                <a href="?page=register">ПЕРЕЙТИ К РЕГИСТРАЦИИ</a>
            </div>
        </div>
    </div>
<?php
} else {
?>
    <!-- block3 -->


    <!-- stiker -->

    <div class="stiker" id="sticker">
        <div class="stiker__content section">
            <div class="cards">
                <?php
                if (count($products) > 0) {
                    foreach ($products as $product) {
                ?>
                        <div class="card">
                            <img src="<?php if (!is_null($product['way'])) {
                                            echo $product['way'];
                                        } else { ?>assets/img/profile/st3.png<?php } ?>" alt="">
                            <h4><?= $product['name'] ?></h4>
                            <p><?= $product['description'] ?></p>
                            <a href="<?= $product['way'] ?>" download>скачать</a>
                        </div>

                <?php
                    }
                } else {
                    echo 'Нет стикеров';
                }
                ?>
            </div>
        </div>
    </div>
    <!-- stiker -->
<?php
}
?>