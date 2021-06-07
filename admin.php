<?php
include "db.php";
$session = session_id();
// if (!is_admin()) die();
// var_dump($_SESSION)['login'];
 

//функционал админа

$delete = mysqli_query($db, "DELETE FROM `orders` WHERE `id` = {$id}");
if ($_GET['action'] == 'delete') {
    $id = (int)$_GET['id'];
    // Убираем проверку на сессию, удаляем все заказы!
    // $result = mysqli_query($db,"SELECT `session_id` FROM `orders` WHERE `id`={$id}");
    // $row = mysqli_fetch_assoc($result);
    // if ($session == $row['session_id'])
    mysqli_query($db, "DELETE FROM `orders` WHERE `id` = {$id}");
    $_SESSION['message'] = "товар удален";
    header("Location: /admin.php");
    die();
}

$result = mysqli_query($db, "SELECT id, name, phone FROM orders");
$message = $_SESSION['message'] ?? "";
unset($_SESSION['message']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админка</title>
</head>
<div id="main">
<div class = "main_menu"><?php include "menu.php" ?></div>
	<div class="gallery">
    <h2>Заказы:</h2>
    <p><?=$message?></p>
	<?php if($result):?>	
	<?php foreach($result as $item): ?>
<a href="/details.php?id=<?= $item['id'] ?>">
<h2><?= $item['name'] ?></h2>
Телефон: <?= $item['phone'] ?></a>
<br>
<a href="?action=delete&id=<?= $item['id'] ?>">
            <button>Удалить</button>
        </a>      
<br>
-------------------------------------------------------------
<?php endforeach; ?>
<?php endif; ?>	