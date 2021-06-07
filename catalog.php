<?php
define("ROOT" , $_SERVER['DOCUMENT_ROOT']);
define("GOODS_IMG" , "/gallery_img/catalog/");

include "db.php";

if ($_GET['action'] == 'add') {
    $id = (int)$_GET['id'];
    $session = session_id();
    mysqli_query($db, "INSERT INTO `basket`(`good_id`, `session_id`) VALUES ({$id},'{$session}')");
    header("Location: /catalog.php");
}

$result = mysqli_query($db, "SELECT id, name, image, price FROM goods");
// var_dump($result);
// die();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог</title>
</head>
<div id="main">
<div class = "main_menu"><?php include "menu.php" ?></div>
	<div class="gallery">
	<?php if($result):?>	
	<?php foreach($result as $item): ?>
<a href="/item.php?id=<?= $item['id'] ?>">
<h2><?= $item['name'] ?></h2>
<img src="<?= GOODS_IMG . $item['image'] ?>" width = "150"</a><br>
Стоимость: <?= $item['price'] ?>
<br>
<a href="?action=add&id=<?= $item['id'] ?>">

            <button>Купить</button>
        </a>
<br>

<?php endforeach; ?>
<?php else: ?>
	Каталог Пуст
<?php endif; ?>	
</div>
<h3>Загрузить изображение:</h3>
<form method="post" enctype="multipart/form-data">
		<input type="file" name="image">
		<input type="submit" value="Загрузить" name="Load" >

</form>
</div>
</body>
</html>