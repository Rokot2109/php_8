<?php
define("GOODS_IMG" , "/gallery_img/catalog/");
include "db.php";

// $session = session_id();

// if ($_GET['action'] == 'delete') {
//     $id = (int)$_GET['id'];
//     $result = mysqli_query($db,"SELECT `session_id` FROM `basket` WHERE `id`={$id}");
//     $row = mysqli_fetch_assoc($result);
//     if ($session == $row['session_id'])
//         mysqli_query($db, "DELETE FROM `basket` WHERE `basket`.`id` = {$id}");
//     $_SESSION['message'] = "товар удален";
//     header("Location: /basket.php");
//     die();
// }
// if (isset($_POST['order'])) {
//     $name = $_POST['name'];
//     $phone = $_POST['phone'];
//     $session = session_id();
//     mysqli_query($db, "INSERT INTO `orders`(`name`, `phone`, `session_id`) VALUES ('{$name}', '{$phone}', '{$session}')");
//     $_SESSION['message'] = "Заказ оформлен";
//     header("Location: /basket.php");
//     die();
//  }
$result = mysqli_query($db, "SELECT basket.id basket_id, goods.image, goods.id good_id, goods.name, goods.description, goods.price FROM basket,goods WHERE basket.good_id=goods.id AND session_id = '{$session}'");
$id = (int)$_GET['id'];
$message ="";
// $result = mysqli_query($db, "SELECT * FROM  WHERE id = {$id}");
if($result->num_rows != 0) $filename = mysqli_fetch_assoc($result);
// elseif($result != int) $message = "Такого изображения нет в бд";
// else $message = "Такого изображения нет в бд";

// $row = mysqli_fetch_assoc($result);
// $summ = $row['summ'];


// $message = $_SESSION['message'] ?? "";

// unset($_SESSION['message']);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Детали заказа</title>
</head>
<body>
<? include "menu.php" ?>
<h2>Детали заказа:</h2>

    <div>

            <h3><?= $filename['id'] ?></h3>
            <br>
            
    </div><hr>

<br>
</body>
</html>