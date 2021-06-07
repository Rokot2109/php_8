<?php
define("ROOT" , $_SERVER['DOCUMENT_ROOT']);
define("IMG_SMALL" , ROOT . "/gallery_img/small/");
define("IMG_BIG" , ROOT . "/gallery_img/big/");

include('classSimpleImage.php');
include('db.php');
// function get_gallery($path) {
// 	return array_splice(scandir($path), 2);
// }
// $images = get_gallery(BIG_IMG);

if (isset($_POST['load'])) {
   include "upload.php";
}


$result = mysqli_query($db, "SELECT * FROM images");
?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>Моя галерея</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body>
<div id="main">
<div class="main_menu"><?php include "menu.php" ?></div>
	<div class="gallery">
	<?php if($result->num_rows != 0):?>	
	<?php foreach($result as $filename): ?>
<a class="photo" href="image.php?id=<?= $filename['id'] ?>"><img src="gallery_img/small/<?= $filename['filename'] ?>" width="150" height="100" /></a>
<?php endforeach;?>
<?php else: ?>
	Галерея Пуста
<?php endif; ?>	
</div>
<h3>Загрузить изображение:</h3>
<form method="post" enctype="multipart/form-data">
        <input type="file" name="image">
        <input type="submit" value="Загрузить" name="load">
    </form>
</div>

</body>
</html>
