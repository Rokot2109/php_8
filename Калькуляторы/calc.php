<?php
if (isset($_GET['x'])) {
    $x = (int) ($_GET['x']);
} else $x = 0;
if (isset($_GET['y'])) {
    $y = (int) ($_GET['y']);
} else $y = 0;
if (isset($_GET['action'])) {
    $action = ($_GET['action']);
} else $action = 'plus';
if (isset($_GET['z'])) {
    $z = (int) ($_GET['z']);
} 
if (isset($x) && isset($y)) {
    switch($action) {
        case 'plus':
            $z = $x + $y;
            break;
        case 'minus':
            $z = $x - $y;
            break;
        case 'umnozh':
            $z = $x * $y;
            break;
        case 'delenie':
            if($y == 0) {
                $z = "На ноль делить нельзя!";} 
            else
            $z = $x / $y;
            break;                     
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Калькулятор</title>
</head>
<body>
<form method = "GET">
    <input type="number" name = "x" style = "width: 50px" value = "<?php echo $x ?>">
    <select name = "action" style = "width: 50px">
        <option <?php if ($action == 'plus') echo "selected"?> value = "plus">+</option>
        <option <?php if ($action == 'minus') echo "selected"?> value = "minus">-</option>
        <option <?php if ($action == 'umnozh') echo "selected"?> value = "umnozh">*</option>
        <option <?php if ($action == 'delenie') echo "selected"?> value = "delenie">/</option>
    <input type="number" name = "y" style = "width: 50px" value = "<?php echo $y ?>">
    <input type="submit" value = "=" style = "width: 25px">
    <b><?php if (isset($z)) echo("Будет равно:  {$z}") ?></b>


</form>


</body>
</html>