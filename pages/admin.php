<?php
session_start();

if (!isset($_SESSION['user']) || (int)$_SESSION['user']['role_id'] !== 2) die ('403 Нет права доступа!');

require_once 'database/database.php';
global $connection;

$sql = "SELECT * FROM `user`";
$query = $connection->query($sql);
$users = $query->fetchall(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM `stikers`";
$query = $connection->query($sql);
$products = $query->fetchall(PDO::FETCH_ASSOC);
?>
    <div class="admin">
        <div class="admin__content section">
            <div class="info__admin">
                <img src="<?php if(!is_null($_SESSION['user']['avatar'])) {echo $_SESSION['user']['avatar'];
                }else {?>assets/img/profile/photo_p.png<?php }?>" alt="">


                <div class="txt__admin">
                    <h3>Панель администратора</h3>
                    <p><?php echo $_SESSION['user']['email'];?></p>

                </div>
                <div class="logout__admin">
                    <a href="?page=dobav">добавить стикер →</a>
                    <a href="?page=logout">выйти</a>
                </div>

            </div>
        </div>
    </div>



    <div class="users mt150px section">
        <div class="users-title ">

        </div>
        <div class="users-cards mt50px">
            <div class="users-flex pc">

                <table>
                    <tr>
                        <td>ID-пользователя</td>
                        <td>Имя пользователя</td>
                        <td>Электронная почта пользователя</td>
                        <td>Статус</td>
                    </tr>
                    <?php
                    foreach ($users as $user) { ?>
                        <tr>

                            <td><?= $user['id'] ?></td>
                            <td>
                                <p><?= $user['name'] ?></p>
                            </td>
                            <td>
                                <p><?= $user['email'] ?></p>
                            </td>
                            <td> <?php
                                if ($user['role_id'] == 1) { ?>
                                    <a href="?page=ban&id=<?= $user['id'] ?>">Заблокировать</a>
                                    <?php
                                } elseif ($user['role_id'] == 3) {
                                    ?>
                                    <a href="?page=razban&id=<?= $user['id'] ?>">Разблокировать</a>
                                    <?php
                                }
                                ?>
                            </td>

                        </tr>
                        <?php
                    }
                    ?>

                </table>


            </div>
        </div>
    </div>
    </div>
    <!--users-->

    <div class="stiker">
        <div class="stiker__content section">
            <div class="cards">
                <?php
                if (count($products) > 0) {
                    foreach ($products as $product) {
                        ?>
                        <div class="card">
                            <img src="<?php if(!is_null($product['way'])) {echo $product['way'];
                            }else {?>assets/img/profile/st3.png<?php }?>" alt="" class="stik">
                            <h4><?=$product['name']?></h4>
                            <p><?=$product['description']?></p>
                            <div class="btn__card">
                                <a href="?page=delete&id=<?=$product['id']?>">удалить</a>
                                <a href="?page=f-admin&id=<?=$product['id']?>" class="crud"> <img src="assets/img/profile/solar_pen-bold.png" alt="" class="pen"></a>
                            </div>
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
