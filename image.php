<?php
include "db.php";
$id = (int)$_GET['id'];
$message ="";
$result = mysqli_query($db, "SELECT * FROM images WHERE id = {$id}");
if($result->num_rows != 0) $filename = mysqli_fetch_assoc($result);
elseif($result != int) $message = "Такого изображения нет в бд";
else $message = "Такого изображения нет в бд";

?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">

<title>Моя галерея</title>
<link rel="stylesheet" type="text/css" href="style.css"/>

</head>

<body>
<div id="main">
<div class = "main_menu"><?php include "menu.php" ?></div>
<div class="post_title"><h2>Моя галерея</h2></div>
	<div class="gallery">
    <?php if(empty($message)):?>		
<img src="gallery_img/big/<?= $filename['filename'] ?>">
    <?php else: ?> 
        <div style="color: red"><?= $message ?></div>    
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