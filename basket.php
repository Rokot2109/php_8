<?php
define("GOODS_IMG" , "/gallery_img/catalog/");
include "db.php";

// $session = session_id();

if ($_GET['action'] == 'delete') {
    $id = (int)$_GET['id'];
    $result = mysqli_query($db,"SELECT `session_id` FROM `basket` WHERE `id`={$id}");
    $row = mysqli_fetch_assoc($result);
    if ($session == $row['session_id'])
        mysqli_query($db, "DELETE FROM `basket` WHERE `basket`.`id` = {$id}");
    $_SESSION['message'] = "товар удален";
    header("Location: /basket.php");
    die();
}
if (isset($_POST['order'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $session = session_id();
    mysqli_query($db, "INSERT INTO `orders`(`name`, `phone`, `session_id`) VALUES ('{$name}', '{$phone}', '{$session}')");
    $_SESSION['message'] = "Заказ оформлен";
    header("Location: /basket.php");
    die();
 }
$basket = mysqli_query($db, "SELECT basket.id basket_id, goods.image, goods.id good_id, goods.name, goods.description, goods.price FROM basket,goods WHERE basket.good_id=goods.id AND session_id = '{$session}'");

$result = mysqli_query($db, "SELECT SUM(goods.price) as summ  FROM basket,goods WHERE basket.good_id=goods.id AND  session_id = '{$session}'");
$row = mysqli_fetch_assoc($result);
$summ = $row['summ'];


$message = $_SESSION['message'] ?? "";

unset($_SESSION['message']);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<? include "menu.php" ?>

<p><?=$message?></p>

<? foreach ($basket as $item): ?>
    <div>

            <h3><?= $item['name'] ?></h3>
            <img src="<?= GOODS_IMG . $item['image'] ?>" width="50" alt=""><br>
            Цена: <?= $item['price'] ?><br><br>

        <a href="?action=delete&id=<?= $item['basket_id'] ?>">
            <button>Удалить</button></a>


    </div><hr>

<? endforeach; ?>
<br>
<strong>Итого: <?=$summ?></strong><br>
Оформить заказ <br>
<form action="" method="post">
    <input type="text" name="name" placeholder="Ваше имя">
    <input type="text" name="phone" placeholder="Телефон">
    <input type="submit" name="order">
</form>
</body>
</html>