<?php
define("GOODS_IMG" , "/gallery_img/catalog/");
include "db.php";
$id = (int)$_GET['id'];
$message ="";
$result = mysqli_query($db, "SELECT * FROM goods WHERE id = {$id}");
if($result->num_rows != 0) $good = mysqli_fetch_assoc($result);
elseif($result != int) $message = "Такого изображения нет в бд";
else $message = "Такого товара нет в бд";

?>
<div id="main">
<div class = "main_menu"><?php include "menu.php" ?></div>
	<div class="gallery">
	<?php if(empty($message)):?>	
<h2><?= $good['name'] ?></h2>  	
<img src="<?= GOODS_IMG . $good['image'] ?>" width  = "250"><br>
<p><?= $good['description'] ?></p>
    
Стоимость: <?= $good['price'] ?>
<br>
<input type="submit" value = "Купить">
<br>
    <?php else: ?> 
        <div style="color: red"><?= $message ?></div>    
    <?php endif; ?>
</div>
</div>