<?php 
define("ROOT" , $_SERVER['DOCUMENT_ROOT']);
define("SMALL_IMG" , ROOT . "/gallery_img/small/");
define("BIG_IMG" , ROOT . "/gallery_img/big/");
function get_gallery($path) {
	return array_splice(scandir($path), 2);
}

include "db.php";

$result = mysqli_query($db, "SELECT id FROM images");

if ($result->num_rows == 0) {
    echo "Таблица пустая, заполните данные";
    $images = get_gallery(BIG_IMG);
    mysqli_query($db, "INSERT INTO images(`filename`) VALUES ('" . implode("'),('", $images) . "')");
} else {
    echo "Таблица заполнена";
}