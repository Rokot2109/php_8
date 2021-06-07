<?php
include "db.php";

$message = '';
$row = [];
$buttonText = "Добавить";
$action = "add";

$messages = [
    'OK' => 'Сообщение добавлено',
    'DELETE' => 'Сообщение удалено',
    'EDIT' => 'Сообщение изменено',
    'ERROR' => 'Ошибка'
];

if ($_GET['action'] == 'edit') {
    $id = (int)$_GET['id'];
    $result = mysqli_query($db, "SELECT * FROM feedback WHERE id = {$id}");
    if ($result) $row = mysqli_fetch_assoc($result);
    $buttonText = "Править";
    $action = "save";
}
if ($_GET['action'] == 'delete') {
    $id = (int)$_GET['id'];
    mysqli_query($db, "DELETE FROM feedback WHERE id = {$id}");
    $message = 'DELETE';
    header("Location: ?message={$message}");
  
}

if ($_GET['action'] == 'save') {
    $id = (int)$_POST['id'];
    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['name'])));
    $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['feedback'])));

    $sql = "UPDATE feedback SET name='{$name}', feedback='{$feedback}' WHERE id = {$id}";
    mysqli_query($db, $sql);
    $message = 'EDIT';
    header("Location: ?message={$message}");
}

if ($_GET['action'] == 'add') {

    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['name'])));
    $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['feedback'])));

    $sql = "INSERT INTO feedback(name, feedback) VALUES ('{$name}','{$feedback}')";
;
    mysqli_query($db, $sql);
    $message = 'OK';

    header("Location: ?message={$message}");
}

$feedbacks = mysqli_query($db, "SELECT * FROM `feedback` WHERE 1 ORDER BY id DESC");

if (isset($_GET['message'])) {
    $message = $messages[$_GET['message']];
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<div class = "main_menu"><?php include "menu.php" ?></div>
<h2>Отзывы</h2>
<?=$message?><br>
<form method="post" action="?action=<?=$action?>">
    <input type="text" name="id" value="<?=$row['id']?>" hidden>
    <input type="text" name="name" value="<?=$row['name']?>"><br>
    <input type="text" name="feedback" value="<?=$row['feedback']?>"><br>
    <input type="submit" value="<?=$buttonText?>">

</form>
<br>
<?php foreach ($feedbacks as $feedback): ?>
<div>
    <b><?=$feedback['name']?></b>: <?=$feedback['feedback']?>
    <a href="?action=edit&id=<?=$feedback['id']?>">[edit]</a>
    <a href="?action=delete&id=<?=$feedback['id']?>">[x]</a>
</div>
<?php endforeach;?>
</body>
</html>
